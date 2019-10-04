<?php namespace Milo\Alacarte\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateMenusTable extends Migration
{
    public function up()
    {
        Schema::create('milo_alacarte_menus', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title');
            $table->json('food_or_drinks');
            $table->boolean('published')->default(false);
            $table->date('publish_date')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('milo_alacarte_menus');
    }
}
