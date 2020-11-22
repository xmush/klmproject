<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPricelists extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_pricelists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('size_min')->nullable();
            $table->integer('size_max')->nullable();
            $table->integer('price')->nullable();
            $table->string('kelas')->nullable();
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
        Schema::dropIfExists('tbl_pricelists');
    }
}
