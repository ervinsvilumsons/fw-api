# fw-api

A Laravel API for importing and storing orders with nested product items.

## Jira tickets

| Ticket | Status |
|---------|--------|
| [FW-API-1] Project setup | ✅ |
| [FW-API-2] Create orders endpoint | ✅ |
| [FW-API-3] Create OrdersImportService | ✅ |
| [FW-API-4] Create test coverage | ✅ |
| [FW-API-5] Update readme.md | ✅ |
| [FW-API-6] Add queue for larger imports | ❌ |

## Overview

This repository provides:
- A `POST http://localhost:9006/api/v1/orders` endpoint for creating orders with product items.
- A console command `php artisan orders:import` for importing orders from a CSV file.
- An import service that maps CSV columns into API payloads and sends them to the configured import URL.

## Requirements

- PHP 8.3
- Composer
- Docker

## Setup

```bash
git clone https://github.com/ervinsvilumsons/fw-api.git
cd fw-api
composer install
cp .env.dev .env
cp orders-sample.csv storage/app/private/orders-sample.csv
```

## Run the application

```bash
docker-compose up -d --build
```

The API is available at `http://localhost:9006/docs` by default.

## API Endpoint

### Create an order

`POST http://localhost:9006/api/v1/orders`

Example payload:

```json
{
  "id": "order-100",
  "created_at": "2026-06-30T10:30:00Z",
  "phone_number": "+37122334455",
  "country_iso_code": "LV",
  "email": "buyer@example.com",
  "name": "Jane Doe",
  "first_line": "Main Street 1",
  "city": "Riga",
  "state": "Riga",
  "zip": "LV-1010",
  "message": "Handle with care",
  "currency_code": "EUR",
  "items": [
    {
      "id": "item-100",
      "sku": "SKU-001",
      "title": "Canvas Print",
      "image": "https://example.com/image.jpg",
      "quantity": 2,
      "price": 19.95,
      "variations": [
        { "name": "Size", "value": "Large" }
      ]
    }
  ]
}
```

## Importing orders from CSV

The project includes a console command that reads `storage/app/private/orders-sample.csv` and sends mapped payloads to the configured import endpoint.

```bash
php artisan orders:import
```

The external API URL is configured in `config/services.php` and can be overridden with `.env`:

```env
IMPORT_API_URL=http://localhost:9006/api/v1/orders
```

For failed attempts you can read `storage/logs/orders-import.log`.

## Testing

Run the test suite with:

```bash
docker exec -it workspace /bin/bash
vendor/bin/phpunit --coverage-html coverage
```

## Assumptions and decisions

- The importer sends each CSV row to the local API over HTTP, matching the required flow `CSV row → transform → POST → validate → store`.
- The API is intentionally open and auth-free for local use, following the task guidance to keep the endpoint simple.
- The CSV mapping is designed for one product per order row, since the sample data shape and current service code treat each row as a single order item.
- Validation is handled by Laravel request validation to enforce required order fields, email/currency/country formats, and nested `items` payloads.
- The importer logs rejected requests and summarizes accepted/rejected counts rather than silently ignoring invalid rows.

## Notes

- The import service maps CSV headers using `App\Models\Order::$headerMap` and `App\Models\Product::$headerMap` because the source CSV headers differ from the API payload.
- The `IMPORT_API_URL` default is `http://localhost:9006/api/v1/orders`, and can be overridden with `.env`.
- Using `https://github.com/symfony/intl` package for country code and currency code validation.
- The current implementation imports one product item per order row; additional row-level item merging would be a natural next improvement.

## License

This project is open source and licensed under the MIT License.
