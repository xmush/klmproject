<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon as Carbon;

class FishTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_fishs')->insert([
            'name'      => 'KOHAKU',
            'desk'      => 'KOI VARIETAS KOHAKU',
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_fishs')->insert([
            'name'      => 'TAISHO SANSHOKU',
            'desk'      => 'KOI VARIETAS TAISHO SANSHOKU',
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_fishs')->insert([
            'name'      => 'SHOWA SANSHOKU',
            'desk'      => 'KOI VARIETAS SHOWA SANSHOKU',
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_fishs')->insert([
            'name'      => 'SHIRO UTSURI',
            'desk'      => 'KOI VARIETAS SHIRO UTSURI',
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_fishs')->insert([
            'name'      => 'KOROMO',
            'desk'      => 'KOI VARIETAS KOROMO',
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_fishs')->insert([
            'name'      => 'GOSHIKI',
            'desk'      => 'KOI VARIETAS GOSHIKI',
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_fishs')->insert([
            'name'      => 'HIKARIMOYOMONO',
            'desk'      => 'KOI VARIETAS HIKARIMOYOMONO',
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_fishs')->insert([
            'name'      => 'GINRIN A',
            'desk'      => 'KOI VARIETAS GINRIN A',
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_fishs')->insert([
            'name'      => 'DOITSU',
            'desk'      => 'KOI VARIETAS DOITSU',
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_fishs')->insert([
            'name'      => 'KAWARIMONO',
            'desk'      => 'KOI VARIETAS KAWARIMONO',
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_fishs')->insert([
            'name'      => 'HI KI UTSURI',
            'desk'      => 'KOI VARIETAS HI KI UTSURI',
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_fishs')->insert([
            'name'      => 'BEKKO',
            'desk'      => 'KOI VARIETAS BEKKO',
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_fishs')->insert([
            'name'      => 'SHUSUI',
            'desk'      => 'KOI VARIETAS SHUSUI',
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_fishs')->insert([
            'name'      => 'ASAGI',
            'desk'      => 'KOI VARIETAS ASAGI',
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_fishs')->insert([
            'name'      => 'HIKARIMUJIMONO',
            'desk'      => 'KOI VARIETAS HIKARIMUJIMONO',
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_fishs')->insert([
            'name'      => 'GINRIN B',
            'desk'      => 'KOI VARIETAS GINRIN B',
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('tbl_fishs')->insert([
            'name'      => 'TANCHO',
            'desk'      => 'KOI VARIETAS TANCHO',
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=> Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
