<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Generate 10 dummy products
        $names = ['Nike', 'Adidas', 'Balenciaga'];
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 30; $i++) {
            DB::table('products')->insert([
                'name' => $names[array_rand($names)], // memilih nama secara acak
                'price' => 15000000, // harga antara 10.000 - 100.000
                'description' => $faker->sentence(10), // deskripsi dengan 10 kata
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
