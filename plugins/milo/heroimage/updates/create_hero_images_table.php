<?php namespace Milo\HeroImage\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateHeroImagesTable extends Migration
{
    public function up()
    {
        Schema::create('milo_heroimage_hero_images', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title');
            $table->string('description');
            $table->string('cost');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('milo_heroimage_hero_images');
    }
}
