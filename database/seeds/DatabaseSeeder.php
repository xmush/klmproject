<?php

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
        $this->call(role_tbl_seeder::class);
        $this->call(UserTblSeeder::class);
        $this->call(PricelistTableSeeder::class);
        $this->call(FishTableSeeder::class);
        $this->call(CatTableSeeder::class);
    }
}
