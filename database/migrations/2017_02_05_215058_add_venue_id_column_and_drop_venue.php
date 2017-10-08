<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVenueIdColumnAndDropVenue extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->integer('venue_id')->nullable()->after('day')->unsigned();
            $table->dropColumn('venue');
            $table->foreign('venue_id')->references('id')->on('venues');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('venue_id');
            $table->dropForeign('events_venue_id_foreign');
        });
    }
}
