<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon as Carbon;

class ChampionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_cat_champions')->insert([
            'grade' => 'Mini Champion',
            'cat_name' => 'Mini Champion A',
            'cat_desk' => 'Fish In Best In Size A',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_cat_champions')->insert([
            'grade' => 'Mini Champion',
            'cat_name' => 'Mini Champion B',
            'cat_desk' => 'Fish In Best In Size B',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_cat_champions')->insert([
            'grade' => 'Mini Champion',
            'cat_name' => 'Mini Champion C',
            'cat_desk' => 'Fish In Best In Size C',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_cat_champions')->insert([
            'grade' => 'Mini Champion',
            'cat_name' => 'Mini Champion D',
            'cat_desk' => 'Fish In Best In Size D',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_cat_champions')->insert([
            'grade' => 'Baby Champion',
            'cat_name' => 'Baby Champion A',
            'cat_desk' => 'Fish In Best In Size A',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_cat_champions')->insert([
            'grade' => 'Baby Champion',
            'cat_name' => 'Baby Champion B',
            'cat_desk' => 'Fish In Best In Size B',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_cat_champions')->insert([
            'grade' => 'Baby Champion',
            'cat_name' => 'Baby Champion C',
            'cat_desk' => 'Fish In Best In Size C',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_cat_champions')->insert([
            'grade' => 'Baby Champion',
            'cat_name' => 'Baby Champion D',
            'cat_desk' => 'Fish In Best In Size D',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_cat_champions')->insert([
            'grade' => 'Junior Champion',
            'cat_name' => 'Junior Champion A',
            'cat_desk' => 'Fish In Best In Size A',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_cat_champions')->insert([
            'grade' => 'Junior Champion',
            'cat_name' => 'Junior Champion B',
            'cat_desk' => 'Fish In Best In Size B',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_cat_champions')->insert([
            'grade' => 'Junior Champion',
            'cat_name' => 'Junior Champion C',
            'cat_desk' => 'Fish In Best In Size C',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_cat_champions')->insert([
            'grade' => 'Junior Champion',
            'cat_name' => 'Junior Champion D',
            'cat_desk' => 'Fish In Best In Size D',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);                
    }
}
