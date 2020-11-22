<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeginToTblUserFishs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_user_fishs', function (Blueprint $table) {
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreign('bio_id')
                  ->references('id')
                  ->on('tbl_bios')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreign('fish_id')
                  ->references('id')
                  ->on('tbl_fishs')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreign('cat_id')
                  ->references('id')
                  ->on('tbl_cats')
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
        Schema::table('tbl_user_fishs', function (Blueprint $table) {
            $table->dropForeign('tbl_user_fishs_user_id_foreign');
            $table->dropForeign('tbl_user_fishs_bio_id_foreign');
            $table->dropForeign('tbl_user_fishs_fish_id_foreign');
            $table->dropForeign('tbl_user_fishs_cat_id_foreign');
        });
    }
}
