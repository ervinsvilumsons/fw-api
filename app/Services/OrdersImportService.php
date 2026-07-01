<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Product;
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
        $rawHeaders = fgetcsv($file);
        $headers = $this->mapHeaders($rawHeaders);

        while (($row = fgetcsv($file)) !== false) {
            $row = is_array($row) ? $row : [];
            $row = array_pad($row, count($headers), null);

            if (count($row) > count($headers)) {
                $row = array_slice($row, 0, count($headers));
            }

            $data = array_combine($headers, $row);

            $this->mapAddress($data);
            $this->mapProducts($data);
            $this->sendToApi($data);
        }

        echo "Successful: {$this->successCount}, Failed: {$this->failedCount} \n";
        fclose($file);
    }

    /**
     * Map the CSV headers to the order model attributes.
     */
    public function mapHeaders(array $rawHeaders): array
    {
        return array_map(
            fn ($h) => array_merge(Order::$headerMap, Product::$headerMap)[$h] ?? $h,
            $rawHeaders,
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
     * Map the items field to the order model attributes.
     */
    public function mapProducts(array &$data): void
    {
        $names = array_filter(array_map('trim', explode(',', $data['variation_names'] ?? '')));
        $values = array_filter(array_map('trim', explode(',', $data['variation_values'] ?? '')));
        $variations = [];

        foreach ($names as $i => $name) {
            if (! isset($values[$i])) {
                continue;
            }

            $variations[] = [
                'name' => $name,
                'value' => $values[$i],
            ];
        }

        // @TODO Handle multiple items in a single order if the CSV format allows for it.
        $data['items'] = [
            [
                'id' => $data['product_id'] ?? null,
                'sku' => $data['sku'] ?? null,
                'title' => $data['title'] ?? null,
                'image' => $data['image'] ?? null,
                'quantity' => isset($data['quantity']) ? (int) $data['quantity'] : null,
                'price' => isset($data['price']) ? (float) $data['price'] : null,
                'variations' => $variations ?? null,
            ],
        ];

        unset(
            $data['product_id'],
            $data['sku'],
            $data['title'],
            $data['image'],
            $data['quantity'],
            $data['price'],
            $data['variations'],
            $data['variation_names'],
            $data['variation_values'],
        );
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
