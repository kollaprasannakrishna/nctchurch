<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeigenContraintSermons extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sermons', function (Blueprint $table) {
            $table->foreign('venue_id')->references('id')->on('venues');
            $table->foreign('series_id')->references('id')->on('series');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sermons', function (Blueprint $table) {
            $table->dropForeign("sermons_venue_id_foreign");
            $table->dropForeign("sermons_series_id_foreign");
        });
    }
}
