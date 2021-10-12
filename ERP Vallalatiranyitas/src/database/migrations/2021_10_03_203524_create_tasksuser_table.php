<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksuserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_user', function (Blueprint $table) {

            $table->integer('user_id')->unsigned();
        
            $table->integer('task_id')->unsigned();
        
            $table->foreign('user_id')->references('id')->on('users')
        
                ->onDelete('cascade');
        
            $table->foreign('task_id')->references('id')->on('tasks')
        
                ->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks_user');
    }
}
