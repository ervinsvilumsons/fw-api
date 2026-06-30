<?php

namespace App\Console\Commands;

use App\Services\OrdersImportService;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('orders:import')]
#[Description('Import orders from a CSV file')]
class OrdersImport extends Command
{
    private const CSV_FILE_PATH = 'app/private/orders-sample.csv';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $service = app(OrdersImportService::class);

        $this->info('Import started');
        $service->import(storage_path(self::CSV_FILE_PATH));
        $this->info('Import completed');
    }
}
