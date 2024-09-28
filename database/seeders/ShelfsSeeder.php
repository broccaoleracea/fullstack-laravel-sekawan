<?php

namespace Database\Seeders;

use App\Models\ShelfsModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShelfsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ShelfsModel::factory()->count(5)->create();
    }
}
