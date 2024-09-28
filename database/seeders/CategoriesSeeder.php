<?php

namespace Database\Seeders;

use App\Models\CategoriesModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CategoriesModel::factory()->count(5)->create();
    }
}
