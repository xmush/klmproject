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
            'name' => env('SEED_NAME_ADMIN'),
            'role_id' => 1,
            'email' => env('SEED_EMAIL_ADMIN'),
            'password' => bcrypt(env('SEED_PASS_ADMIN')),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'name' => env('SEED_NAME_USER'),
            'role_id' => 2,
            'email' => env('SEED_EMAIL_USER'),
            'password' => bcrypt(env('SEED_PASS_USER')),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
