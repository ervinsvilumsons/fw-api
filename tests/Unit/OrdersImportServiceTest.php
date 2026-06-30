<?php

namespace Tests\Unit;

use App\Services\OrdersImportService;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class OrdersImportServiceTest extends TestCase
{
    public function test_import_maps_csv_row_and_posts_to_api(): void
    {
        $service = new OrdersImportService();
        $file = tempnam(sys_get_temp_dir(), 'orders');

        $csv = implode(PHP_EOL, [
            'ID,Created (ext),Phone,Country code,Buyer email,Name,Message,Currency code,Full Address,Products,SKU,Sheet(s),Grand total,Material,Size',
            'order-200,2026-06-30T11:00:00Z,+37122334455,LV,buyer@example.com,Jane Doe,Handle with care,EUR,"Main Street 1, Riga, LV-1010",Canvas Print,SKU-002,2,19.95,Material,Size',
        ]) . PHP_EOL;

        file_put_contents($file, $csv);

        Http::fake([
            '*' => Http::response(['ok' => true], 200),
        ]);

        $service->import($file);

        Http::assertSentCount(1);
        Http::assertSent(function ($request) {
            return $request->url() === config('services.import.url')
                && $request['id'] === 'order-200'
                && $request['items'][0]['title'] === 'Canvas Print'
                && $request['items'][0]['quantity'] === 2
                && $request['items'][0]['price'] === 19.95;
        });

        unlink($file);
    }

    public function test_import_maps_address_parts_for_non_us_country(): void
    {
        $service = new OrdersImportService();
        $data = [
            'address' => 'Main Street 1, Riga, LV-1010',
            'country_iso_code' => 'LV',
        ];

        $service->mapAddress($data);

        $this->assertSame('Main Street 1', $data['first_line']);
        $this->assertSame('Riga', $data['city']);
        $this->assertSame('1010', $data['zip']);
    }
}
