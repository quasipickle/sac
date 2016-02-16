<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePresentationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presentations', function (Blueprint $table){
          $table->increments('id');
          $table->string('student_name');
          $table->string('professor_name');
          $table->string('course');
          $table->string('title');
          $table->integer('type')->unsigned();
          $table->text('abstract');
          $table->text('special_notes');
          $table->boolean('submitted');
          $table->boolean('approved');
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
        Schema::drop('presentations');
    }
}
