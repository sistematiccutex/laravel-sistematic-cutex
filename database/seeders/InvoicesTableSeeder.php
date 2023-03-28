<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Invoice;

class InvoicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $invoices = [
            [
                'date_hour' => now(),
                'total' => '325000',
                'user_id' => '1',
                'client_id' => '1'

            ],
            [
                'date_hour' => now(),
                'total' => '600000',
                'user_id' => '2',
                'client_id' => '2'

            ],
            [
                'date_hour' => now(),
                'total' => '85000',
                'user_id' => '3',
                'client_id' => '3'

            ],

        ];
        foreach ($invoices as $invoice) {
            Invoice::create([
                'date_hour' => $invoice['date_hour'],
                'total' => $invoice['total'],
                'user_id' => $invoice['user_id'],
                'client_id' => $invoice['client_id'],
            ]);
        }
    }
}
