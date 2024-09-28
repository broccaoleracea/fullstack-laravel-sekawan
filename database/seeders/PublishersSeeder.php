<?php

namespace Database\Seeders;

use App\Models\PublishersModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PublishersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PublishersModel::factory()->count(5)->create();
    }
}
