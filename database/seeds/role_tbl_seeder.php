<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon as Carbon;

class role_tbl_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_roles')->insert([
            'name' => 'admin',
            'link' => '/admin',
            'route'	=> 'admin.dashboard',
            'desc' => 'administrator system',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_roles')->insert([
            'name' => 'user',
            'link' => '/user',
            'route'	=> 'user.dashboard',
            'desc' => 'user',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);                
    }
}
