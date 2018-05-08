<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('event_id');
            $table->integer('user_id', false, TRUE);
            $table->addColumn('text','event_title');
            $table->addColumn('text','event_description');
            $table->addColumn('text','event_location');
            $table->addColumn('text','event_address');
            $table->addColumn('text','event_city');
            $table->addColumn('text','event_state');
            $table->addColumn('text','event_country');
            $table->addColumn('text','event_banner');
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
        Schema::dropIfExists('events');
    }
}
