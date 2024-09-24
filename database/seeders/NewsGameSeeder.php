<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class NewsGameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $imagePath = base64_encode(file_get_contents('public\img\mar.jpg'));

        for ($i = 1; $i <= 10; $i++) {
            DB::table('newsgame')->insert([
                'photoUrl' => $imagePath,
                'title' => $faker->sentence(6),
                'description' => $faker->paragraph(3),
                'name' => 'Game Reporter',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
