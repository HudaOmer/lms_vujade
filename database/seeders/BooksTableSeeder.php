<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use Carbon\Carbon;

class BooksTableSeeder extends Seeder
{ 
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define the data to be seeded
        $books = [
            [
                'name' => 'الدم الأزرق',
                'author' => 'أحمد خالد توفيق (Ahmed Khaled Tawfik)',
                'publisher' => 'دار نهضة مصر (Dar Nahdat Misr)',
                'language' => 'Arabic',
                'edition' => '2nd Edition',
                'category' => 'Fiction (Supernatural Thriller)',
                'shelf_number' => 'ARB-FIC-SUP-005',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'الجندي المجهول',
                'author' => 'أحمد خالد توفيق (Ahmed Khaled Tawfik)',
                'publisher' => 'دار الشروق (Dar El-Shorouk)',
                'language' => 'Arabic',
                'edition' => '3rd Edition',
                'category' => 'Fiction (Historical Horror)',
                'shelf_number' => 'ARB-FIC-HOR-006',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'أولاد القمر',
                'author' => 'أحمد خالد توفيق (Ahmed Khaled Tawfik)',
                'publisher' => 'دار الشروق (Dar El-Shorouk)',
                'language' => 'Arabic',
                'edition' => '1st Edition',
                'category' => 'Fiction (Horror)',
                'shelf_number' => 'ARB-FIC-HOR-004',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'لغز الكوخ المحترق',
                'author' => 'المغامرون الخمسة',
                'publisher' => 'دار الشروق',
                'language' => 'العربية',
                'edition' => 'الاولى',
                'category' => 'Fiction (Adventure)',
                'shelf_number' => 'ARB-FIC-FAN-001',
                'created_at' => '2024-06-27 18:07:05',
                'updated_at' => '2024-06-27 18:07:05',
            ],
        ];

        // Insert the data into the database
        foreach ($books as $bookData) {
            Book::create($bookData);
        }
    }
    
}
