<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $chunkSize = 1000;
        $totalRecords = 100000;  

        for ($i = 0; $i < $totalRecords; $i += $chunkSize) {
            Book::factory($chunkSize)->create();
        }
    }
}
