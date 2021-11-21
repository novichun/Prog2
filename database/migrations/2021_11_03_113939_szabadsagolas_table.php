<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SzabadsagolasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('szabadsagolas', function (Blueprint $table) {
            $table->id();
            $table->string('alkalmazott');
            $table->date('start');
            $table->date('end');
            $table->string('indoklas');
            $table->boolean('statusz')->default(False);
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
        Schema::dropIfExists('szabadsagolas');
    }
}
