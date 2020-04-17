<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThietBiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thiet_bi', function (Blueprint $table) {
            $table->increments('id');
 
            $table->string('name');
 
            $table->integer('isOn');
 
            $table->string('comment')->nullable();

            $table->string('login')->nullable();

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
        Schema::dropIfExists('thiet_bi');
    }
}
