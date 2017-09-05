<?php namespace Milo\Drinks\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateDrinksTable extends Migration
{
    public function up()
    {
        Schema::create('milo_drinks_drinks', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->string('allergene');
            $table->string('size');
            $table->double('amount', 10, 2);
            $table->integer('drink_category_id')->unsigned();
            $table->integer('sort_order')->default(1);
            $table->timestamps();
	        $table->foreign('drink_category_id')->references('id')->on('milo_drinks_drink_categories');
        });
    }

    public function down()
    {
        Schema::dropIfExists('milo_drinks_drinks');
    }
}
