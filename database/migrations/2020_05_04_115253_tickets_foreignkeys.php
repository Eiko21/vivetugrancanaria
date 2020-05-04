<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TicketsForeignkeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->unsignedBigInteger('clientid');
            $table->foreign('clientid')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('activityid');
            $table->foreign('activityid')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->dropForeign(['clientid']);
            $table->dropColumn('clientid');
            $table->dropForeign(['activityid']);
            $table->dropColumn('activityid');
        });
    }
}
