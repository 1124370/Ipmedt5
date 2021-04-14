<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            tijdlooptSeeder::class,
            vakkenSeeder::class,
            inputtimeSeeder::class,
            checkAanwezigTableSeeder::class,
            noodgevalTableSeeder::class,
            
        ]);

    }
}
