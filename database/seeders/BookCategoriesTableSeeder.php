<?php

namespace Database\Seeders;

use App\Models\BookCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $chunkSize = 1000;
        $totalRecords = 3000;  

        for ($i = 0; $i < $totalRecords; $i += $chunkSize) {
            BookCategory::factory($chunkSize)->create();
        }
    }
}
