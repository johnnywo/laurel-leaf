<?php namespace Milo\Food\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateFoodCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('milo_food_food_categories', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('milo_food_food_categories');
    }
}
