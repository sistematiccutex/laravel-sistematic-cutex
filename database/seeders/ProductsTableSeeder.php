<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products_tale = [
            [
                'name' => ' Correa doble faz',
                'reference' => '001',
                'description' => 'Correea doble faz',
                'stock' => '10',
                'price' => '25000',
                'measure' => '2',
                'company_id' => '1',
                'provider_id' => '1',
                'color_id' => '1',
                'subcategory_id' => '1',
                'user_id' => '1'
            ],

            [
                'name' => 'Billetera con cierre',
                'reference' => '002',
                'description' => 'Billetera con cierre',
                'stock' => '12',
                'price' => '35000',
                'measure' => '2',
                'company_id' => '1',
                'provider_id' => '2',
                'color_id' => '2',
                'subcategory_id' => '2',
                'user_id' => '2'
            ],
            [
                'name' => 'Correa lisa',
                'reference' => '003',
                'description' => 'Correa lisa',
                'stock' => '12',
                'price' => '35000',
                'measure' => '2',
                'company_id' => '1',
                'provider_id' => '2',
                'color_id' => '3',
                'subcategory_id' => '3',
                'user_id' => '3'
            ],
            [
                'name' => 'Billetera broche',
                'reference' => '004',
                'description' => 'Billetera broche',
                'stock' => '11',
                'price' => '34000',
                'measure' => '2',
                'company_id' => '1',
                'provider_id' => '2',
                'color_id' => '4',
                'subcategory_id' => '4',
                'user_id' => '3'

            ]
        ];
        foreach ($products_tale as $product_tale) {
            Product::create([
                'name' => $product_tale['name'],
                'reference' => $product_tale['reference'],
                'description' => $product_tale['description'],
                'stock' => $product_tale['stock'],
                'price' => $product_tale['price'],
                'measure' => $product_tale['measure'],
                'company_id' => $product_tale['company_id'],
                'provider_id' => $product_tale['provider_id'],
                'color_id' => $product_tale['color_id'],
                'subcategory_id' => $product_tale['subcategory_id'],
                'user_id' => $product_tale['user_id'],

            ]);
        }
    }
}
