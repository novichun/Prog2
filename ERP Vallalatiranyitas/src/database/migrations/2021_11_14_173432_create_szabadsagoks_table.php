<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSzabadsagoksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('szabadsagoks', function (Blueprint $table) {
            $table->id();
            $table->string('targy');
            $table->string('leiras');
            $table->date('kezdet');
            $table->date('veg');
            $table->boolean('biralat')->default(0);
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
        Schema::dropIfExists('szabadsagoks');
    }
}