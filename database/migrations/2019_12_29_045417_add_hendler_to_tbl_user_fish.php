<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHendlerToTblUserFish extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_user_fishs', function (Blueprint $table) {
            $table->text('handler_address')->nullable()->after('user_id');
            $table->string('handler_name')->nullable()->after('user_id');
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
            $table->dropColumn('handler_name');
            $table->dropColumn('handler_address');
        });
    }
}
