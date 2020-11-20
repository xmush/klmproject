<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_cats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('min_size')->nullable();
            $table->integer('max_size')->nullable();
            $table->string('class')->nullable();
            $table->string('grade')->nullable();
            $table->integer('reg_price')->nullable();
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
        Schema::dropIfExists('tbl_cats');
    }
}
