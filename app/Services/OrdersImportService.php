<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Support\Facades\Http;
use Log;

class OrdersImportService
{
    private int $failedCount = 0;

    private int $successCount = 0;

    /**
     * Import orders from a CSV file.
     */
    public function import(string $filePath): void
    {
        $file = fopen($filePath, 'r');

        $headers = $this->mapHeaders(fgetcsv($file));

        while (($row = fgetcsv($file)) !== false) {
            $data = array_combine($headers, $row);

            $this->mapAddress($data);
            $this->sendToApi($data);
        }

        echo "Successful: {$this->successCount}, Failed: {$this->failedCount} \n";
        fclose($file);
    }

    /**
     * Map the CSV headers to the order model attributes.
     */
    public function mapHeaders(array $headers): array
    {
        return array_map(
            fn ($h) => Order::$headerMap[$h] ?? $h,
            $headers,
        );
    }

    /**
     * Map the address field to the order model attributes.
     */
    public function mapAddress(array &$data): void
    {
        $parts = array_map('trim', explode(',', $data['address'] ?? ''));

        $street = $parts[0] ?? null;
        $city = $parts[1] ?? null;
        $stateZip = isset($parts[2]) ? trim($parts[2]) : null;
        $state = null;
        $zip = null;

        switch ($data['country_iso_code']) {
            case 'US':
                preg_match('/([A-Z]{2})\s+(\d{5}(-\d{4})?)/', $stateZip, $matches);
                $state = $matches[1] ?? null;
                $zip = $matches[2] ?? null;
                break;
            default:
                if ($stateZip) {
                    $zip = trim(preg_replace('/\D+/', '', $stateZip));
                } else {
                    $zip = trim(preg_replace('/\D+/', '', $city));
                    $city = trim(preg_replace('/\d+/', '', $city));
                }
                break;
        }

        $data['first_line'] = $street;
        $data['city'] = $city;
        $data['state'] = $state;
        $data['zip'] = $zip;
    }

    /**
     * Send order data to the API.
     */
    public function sendToApi(array $data): void
    {
        try {
            $response = Http::post(config('services.import.url'), $data);

            if ($response->failed()) {
                $this->failedCount++;
                $this->logError($data['id'], $response->body());

                return;
            }

            $this->successCount++;

        } catch (\Exception $e) {
            $this->failedCount++;
            $this->logError($data['id'], $e->getMessage());
        }
    }

    /**
     * Log an error message for a failed order import.
     */
    private function logError(string $orderId, string $message): void
    {
        Log::channel('orders-import')->warning(
            "Order {$orderId} failed",
            ['response' => $message],
        );
    }
}
