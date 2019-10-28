<?php namespace Milo\Reservation\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateReservationsTable extends Migration
{
    public function up()
    {
        Schema::create('milo_reservation_reservations', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->dateTime('datetime');
            $table->string('name');
            $table->string('email');
            $table->integer('people');
            $table->string('area');
            $table->text('message');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('milo_reservation_reservations');
    }
}
