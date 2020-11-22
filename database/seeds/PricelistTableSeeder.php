<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon as Carbon;

class PricelistTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_pricelists')->insert([
            'size_min'  => 1,
            'size_max'  => 15,
            'price'     => 75000,
            'kelas'     => 'MINI CHAMPION',
            'created_at'=> Carbon::now()->format('Y-m-d'),
            'updated_at'=> Carbon::now()->format('Y-m-d')
        ]);
        DB::table('tbl_pricelists')->insert([
            'size_min'  => 16,
            'size_max'  => 20,
            'price'     => 100000,
            'kelas'     => 'BABY CHAMPION',
            'created_at'=> Carbon::now()->format('Y-m-d'),
            'updated_at'=> Carbon::now()->format('Y-m-d')
        ]);
        DB::table('tbl_pricelists')->insert([
            'size_min'  => 21,
            'size_max'  => 25,
            'price'     => 130000,
            'kelas'     => 'BABY CHAMPION',
            'created_at'=> Carbon::now()->format('Y-m-d'),
            'updated_at'=> Carbon::now()->format('Y-m-d')
        ]);
        DB::table('tbl_pricelists')->insert([
            'size_min'  => 26,
            'size_max'  => 30,
            'price'     => 160000,
            'kelas'     => 'JUNIOR CHAMPION',
            'created_at'=> Carbon::now()->format('Y-m-d'),
            'updated_at'=> Carbon::now()->format('Y-m-d')
        ]);
        DB::table('tbl_pricelists')->insert([
            'size_min'  => 31,
            'size_max'  => 35,
            'price'     => 190000,
            'kelas'     => 'JUNIOR CHAMPION',
            'created_at'=> Carbon::now()->format('Y-m-d'),
            'updated_at'=> Carbon::now()->format('Y-m-d')
        ]);
        DB::table('tbl_pricelists')->insert([
            'size_min'  => 36,
            'size_max'  => 40,
            'price'     => 220000,
            'kelas'     => 'YOUNG CHAMPION',
            'created_at'=> Carbon::now()->format('Y-m-d'),
            'updated_at'=> Carbon::now()->format('Y-m-d')
        ]);
        DB::table('tbl_pricelists')->insert([
            'size_min'  => 41,
            'size_max'  => 45,
            'price'     => 280000,
            'kelas'     => 'YOUNG CHAMPION',
            'created_at'=> Carbon::now()->format('Y-m-d'),
            'updated_at'=> Carbon::now()->format('Y-m-d')
        ]);
        DB::table('tbl_pricelists')->insert([
            'size_min'  => 46,
            'size_max'  => 50,
            'price'     => 350000,
            'kelas'     => 'GRAND CHAMPION',
            'created_at'=> Carbon::now()->format('Y-m-d'),
            'updated_at'=> Carbon::now()->format('Y-m-d')
        ]);
        DB::table('tbl_pricelists')->insert([
            'size_min'  => 51,
            'size_max'  => 55,
            'price'     => 400000,
            'kelas'     => 'GRAND CHAMPION',
            'created_at'=> Carbon::now()->format('Y-m-d'),
            'updated_at'=> Carbon::now()->format('Y-m-d')
        ]);
    }
}
