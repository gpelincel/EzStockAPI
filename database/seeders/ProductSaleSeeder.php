<?php

namespace Database\Seeders;

use App\Models\ProductSale;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductSale::factory(250)->create();
    }
}
