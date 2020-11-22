<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddChampionCatToTblTblFishChampions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_fish_champions', function (Blueprint $table) {
            $table->unsignedBigInteger('champion_cat_id')->nullable()->after('cat_id');
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
            $table->dropColumn('champion_cat_id');
        });
    }
}
