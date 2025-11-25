<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * 
     * Seeds the database with categories, scholars, and books.
     * Note: Seeders are called in order to maintain foreign key relationships.
     */
    public function run(): void
    {
        // Seed categories first (no dependencies)
        $this->call(CategorySeeder::class);
        
        // Seed scholars (no dependencies)
        $this->call(ScholarSeeder::class);
        
        // Seed books last (depends on categories and scholars)
        $this->call(BookSeeder::class);
    }
}
