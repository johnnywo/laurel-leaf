<?php namespace Milo\Food\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateFoodsTable extends Migration
{
    public function up()
    {
        Schema::create('milo_food_foods', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('allergene');
            $table->string('description');
            $table->double('amount', 10, 2);
            $table->boolean('vegan')->default(false);
            $table->boolean('vegetarisch')->default(false);
            $table->boolean('spicy')->default(false);
            $table->boolean('new')->default(false);
            $table->integer('heart')->unsigned();
            $table->integer('food_category_id')->unsigned();
            $table->foreign('food_category_id')->references('id')->on('milo_food_food_categories');
            $table->integer('sort_order')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('milo_food_foods');
    }
}
