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
        Schema::create('presentations', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('professor_name', 150);
            $table->integer('course_id')->unsigned();
            $table->string('title', 200);
            $table->integer('type')->unsigned();
            $table->text('abstract');
            $table->text('special_notes');
            $table->boolean('submitted')->default(false);
            $table->boolean('approved')->default(false);
            $table->boolean('our_nominee')->default(false);
            $table->integer('owner')->unsigned();

            $table->foreign('course_id')->
                references('id')->on('courses')->
                onUpdate('cascade')->
                onDelete('cascade');
            $table->foreign('type')->
                references('id')->on('presentation_types')->
                onUpdate('cascade')->
                onDelete('cascade');
            $table->foreign('owner')->
                references('id')->on('users')->
                onUpdate('cascade')->
                onDelete('cascade');

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
