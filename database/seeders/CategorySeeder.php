<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Apartments & Hotels'],
            ['name' => 'Bills & Charges'],
            ['name' => 'Cafe & Eating out & Delivery'],
            ['name' => 'Education'],
            ['name' => 'Entertainment'],
            ['name' => 'Gifts'],
            ['name' => 'Groceries'],
            ['name' => 'Health'],
            ['name' => 'Personal care'],
            ['name' => 'Salary'],
            ['name' => 'Shopping'],
            ['name' => 'Transport'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
