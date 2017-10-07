<?php namespace Milo\Event\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateEventImagesTable extends Migration
{
    public function up()
    {
        Schema::create('milo_event_event_images', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->boolean('is_active')->default(false);
            $table->integer('sort_order')->default(0);
            $table->datetime('event_end_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('milo_event_event_images');
    }
}
