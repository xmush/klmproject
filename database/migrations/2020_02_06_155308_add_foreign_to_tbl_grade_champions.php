<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToTblGradeChampions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_grade_champions', function (Blueprint $table) {
            $table->foreign('cat_id')
                    ->references('id')
                    ->on('tbl_cats')
                    ->onDelete('cascade')
                    ->onUpdate('cascade'); 
            $table->foreign('user_fish_id')
                    ->references('id')
                    ->on('tbl_user_fishs')
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
        Schema::table('tbl_grade_champions', function (Blueprint $table) {
            $table->dropForeign('tbl_grade_champions_cat_id_foreign');
            $table->dropForeign('tbl_grade_champions_user_fish_id_foreign');
        });
    }
}
