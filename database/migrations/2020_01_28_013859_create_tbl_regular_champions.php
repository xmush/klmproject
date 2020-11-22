<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblRegularChampions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_regular_champions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('fish_id')->nullable();
            $table->unsignedBigInteger('cat_id')->nullable();
            $table->enum('position', ['1','2','3','4'])->nullable();
            $table->unsignedBigInteger('user_fish_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_regular_champions');
    }
}
