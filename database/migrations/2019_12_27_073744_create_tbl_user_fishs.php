<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblUserFishs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_user_fishs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('bio_id')->nullable();
            $table->unsignedBigInteger('fish_id')->nullable();
            $table->unsignedBigInteger('cat_id')->nullable();
            $table->text('fish_picture')->nullable();
            $table->enum('status', ['LUNAS', 'BELUM LUNAS'])->default('BELUM LUNAS')->nullable();
            $table->string('confirm_by')->default('')->nullable();
            $table->date('date_reg')->nullable();
            $table->time('time_reg')->nullable();
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
        Schema::dropIfExists('tbl_user_fishs');
    }
}
