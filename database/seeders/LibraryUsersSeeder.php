<?php

namespace Database\Seeders;

use App\Models\LibraryUsersModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class LibraryUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        LibraryUsersModel::factory()->count(5)->create();
        // DB::table('library-users')->insert([
        //     [
        //         'author_id' => (string) Str::uuid(),
        //         'firstname' => 'Tere Liye',
        //         'author_description' => 'Tere Liye book authors',
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'author_id' => (string) Str::uuid(),
        //         'author_name' => 'Raditya Dika',
        //         'author_description' => 'Raditya Dika book authors',
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        // ]);
    }
}
