<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOwnerToPresentation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('presentations', function (Blueprint $table) {
            $table->integer('owner')->unsigned();
            $table->foreign('owner')->references('id')->on('users')
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
        Schema::table('presentations', function (Blueprint $table) {
            $table->dropForeign('presentations_owner_foreign');
            $table->dropColumn('owner');
        });
    }
}
