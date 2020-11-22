<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColomThumbnailToTblUserFishs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_user_fishs', function (Blueprint $table) {
            $table->text('fish_picture_thumb')->nullable()->after('fish_picture');
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
            $table->dropColumn('fish_picture_thumb');
        });
    }
}
