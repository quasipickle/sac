<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameColumnId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::table('presentations', function (Blueprint $table) {
            $table->dropForeign('presentations_course_foreign');
        });

        Schema::table('courses', function (Blueprint $table) {
            $table->renameColumn('id', 'code');
        });

        Schema::table('presentations', function (Blueprint $table) {
            $table->foreign('course')->
                  references('code')->on('courses')->
                  onDelete('cascade')->
                  onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('presentations', function (Blueprint $table) {
            $table->dropForeign('presentations_course_foreign');
        });

        Schema::table('courses', function (Blueprint $table) {
            $table->renameColumn('code', 'id');
        });

        Schema::table('presentations', function (Blueprint $table) {
            $table->foreign('course')->
                  references('id')->on('courses')->
                  onDelete('cascade')->
                  onUpdate('cascade');
        });
    }
}
