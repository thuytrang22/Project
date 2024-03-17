<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('seatings', function (Blueprint $table) {
            $table->integer('working');
            $table->integer('empty');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('seatings', function (Blueprint $table) {
            $table->dropColumn('working');
            $table->dropColumn('empty');
        });
    }
};
