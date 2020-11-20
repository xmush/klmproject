<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCatToTblFishChampions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_fish_champions', function (Blueprint $table) {
            $table->foreign('champion_cat_id')
                  ->references('id')
                  ->on('tbl_cat_champions')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_fish_champions', function (Blueprint $table) {
            $table->dropForeign('tbl_fish_champions_champion_cat_id_foreign');
        });
    }
}
