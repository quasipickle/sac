<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_courses', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->integer('user_id')->unsigned();
            $table->integer('course_id')->unsigned();

            $table->unique(['user_id', 'course_id']);
            $table->foreign('user_id')->
                references('id')->on('users')->
                onUpdate('cascade')->
                onDelete('cascade');
            $table->foreign('course_id')->
                references('id')->on('courses')->
                onUpdate('cascade')->
                onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_courses');
    }
}
