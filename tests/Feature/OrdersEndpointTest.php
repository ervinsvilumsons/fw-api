<?php

namespace Tests\Feature;

use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrdersEndpointTest extends TestCase
{
    use RefreshDatabase;

    public function test_order_can_be_created_with_items(): void
    {
        $payload = [
            'id' => 'order-100',
            'created_at' => '2026-06-30T10:30:00Z',
            'phone_number' => '+37122334455',
            'country_iso_code' => 'LV',
            'email' => 'buyer@example.com',
            'name' => 'Jane Doe',
            'first_line' => 'Main Street 1',
            'city' => 'Riga',
            'state' => 'Riga',
            'zip' => 'LV-1010',
            'message' => 'Handle with care',
            'currency_code' => 'EUR',
            'items' => [
                [
                    'id' => 'item-100',
                    'sku' => 'SKU-001',
                    'title' => 'Canvas Print',
                    'image' => 'https://example.com/image.jpg',
                    'quantity' => 2,
                    'price' => 19.95,
                    'variations' => [
                        ['name' => 'Size', 'value' => 'Large'],
                    ],
                ],
            ],
        ];

        $response = $this->postJson('/api/v1/orders', $payload);

        $response->assertStatus(200);
        $this->assertDatabaseHas('orders', [
            'id' => 'order-100',
            'email' => 'buyer@example.com',
            'currency_code' => 'EUR',
        ]);
        $this->assertDatabaseHas('products', [
            'title' => 'Canvas Print',
            'quantity' => 2,
        ]);
    }

    public function test_order_creation_fails_for_invalid_payload(): void
    {
        $response = $this->postJson('/api/v1/orders', [
            'id' => 'order-101',
            'created_at' => 'not-a-date',
            'phone_number' => '+37122334455',
            'country_iso_code' => 'ZZ',
            'email' => 'not-an-email',
            'name' => 'Jane Doe',
            'zip' => 'LV-1010',
            'currency_code' => 'XYZ',
            'items' => [],
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['created_at', 'country_iso_code', 'email', 'currency_code', 'items']);
        $this->assertDatabaseMissing('orders', ['id' => 'order-101']);
    }
}
