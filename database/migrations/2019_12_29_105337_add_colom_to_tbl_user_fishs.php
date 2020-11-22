<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColomToTblUserFishs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_user_fishs', function (Blueprint $table) {
            $table->text('fish_size')->nullable()->after('cat_id');
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
            $table->dropColumn('fish_size');
        });
    }
}
