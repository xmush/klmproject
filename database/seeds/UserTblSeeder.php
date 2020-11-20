<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon as Carbon;

class UserTblSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'mush',
            'role_id' => 1,
            'email' => 'mush@mail.com',
            'password' => bcrypt('admin1234'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'name' => 'user',
            'role_id' => 2,
            'email' => 'user@mail.com',
            'password' => bcrypt('admin1234'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
