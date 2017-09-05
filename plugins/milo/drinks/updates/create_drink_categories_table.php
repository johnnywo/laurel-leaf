<?php namespace Milo\Drinks\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateDrinkCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('milo_drinks_drink_categories', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->integer('sort_order')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('milo_drinks_drink_categories');
    }
}
