<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPointColomToTblUserFishs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_user_fishs', function (Blueprint $table) {
            $table->unsignedBigInteger('point_id')->nullable()->after('cat_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_user_fishs', function (Blueprint $table) {
            $table->dropColumn('point_id');
        });
    }
}
