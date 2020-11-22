<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon as Carbon;

class CatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_cats')->insert([
            'min_size'  => 1,
            'max_size'  => 15,
            'class'     => 'A',
            'grade'     => 'MINI CHAMPION',
            'reg_price' => 90000,
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_cats')->insert([
            'min_size'  => 16,
            'max_size'  => 20,
            'class'     => 'A',
            'grade'     => 'BABY CHAMPION',
            'reg_price' => 120000,
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_cats')->insert([
            'min_size'  => 21,
            'max_size'  => 25,
            'class'     => 'B',
            'grade'     => 'BABY CHAMPION',
            'reg_price' => 150000,
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
        ]);        
        DB::table('tbl_cats')->insert([
            'min_size'  => 26,
            'max_size'  => 30,
            'class'     => 'A',
            'grade'     => 'JUNIOR CHAMPION',
            'reg_price' => 200000,
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_cats')->insert([
            'min_size'  => 31,
            'max_size'  => 35,
            'class'     => 'B',
            'grade'     => 'JUNIOR CHAMPION',
            'reg_price' => 250000,
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_cats')->insert([
            'min_size'  => 36,
            'max_size'  => 40,
            'class'     => 'A',
            'grade'     => 'YOUNG CHAMPION',
            'reg_price' => 300000,
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_cats')->insert([
            'min_size'  => 41,
            'max_size'  => 45,
            'class'     => 'B',
            'grade'     => 'YOUNG CHAMPION',
            'reg_price' => 350000,
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_cats')->insert([
            'min_size'  => 46,
            'max_size'  => 50,
            'class'     => 'A',
            'grade'     => 'ADULT CHAMPION',
            'reg_price' => 400000,
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_cats')->insert([
            'min_size'  => 51,
            'max_size'  => 55,
            'class'     => 'B',
            'grade'     => 'ADULT CHAMPION',
            'reg_price' => 450000,
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_cats')->insert([
            'min_size'  => 56,
            'max_size'  => 60,
            'class'     => 'B',
            'grade'     => 'GRAND CHAMPION',
            'reg_price' => 550000,
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_cats')->insert([
            'min_size'  => 61,
            'max_size'  => 65,
            'class'     => 'B',
            'grade'     => 'GRAND CHAMPION',
            'reg_price' => 650000,
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
