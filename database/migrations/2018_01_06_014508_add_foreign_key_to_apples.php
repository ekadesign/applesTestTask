<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToApples extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('apples', function (Blueprint $table){
            $table->integer('grabbed_by')->unsigned()->nullable();
            $table->foreign('grabbed_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('apples', function (Blueprint $table){
           $table->dropForeign(['grabbed_by']);
           $table->drop('grabbed_by');
        });
    }
}
