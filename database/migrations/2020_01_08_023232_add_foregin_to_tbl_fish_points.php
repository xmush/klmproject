<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeginToTblFishPoints extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_fish_points', function (Blueprint $table) {
            $table->foreign('user_fish_id')
                  ->references('id')
                  ->on('tbl_user_fishs')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
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
        Schema::table('tbl_fish_points', function (Blueprint $table) {
            $table->dropForeign('tbl_fish_points_user_fish_id_foreign');
            $table->dropForeign('tbl_fish_points_user_id_foreign');
        });
    }
}
