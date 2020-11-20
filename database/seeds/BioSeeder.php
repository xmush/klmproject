<?php

use Illuminate\Database\Seeder;

class BioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_bios')->insert([
            'user_id' => 1
        ]);
        DB::table('tbl_bios')->insert([
            'user_id' => 2
        ]);
    }
}
