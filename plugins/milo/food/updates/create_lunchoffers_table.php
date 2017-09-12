<?php namespace Milo\Food\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateLunchoffersTable extends Migration
{
    public function up()
    {
        Schema::create('milo_food_lunchoffers', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('food_id')->unsigned();
            $table->datetime('date');
            $table->datetime('date_until')->nullable();
            $table->string('soup_starters');
            $table->double('offer_price', 10, 2);
            $table->boolean('always_hot')->default(false);
            $table->boolean('all_week')->default(false);
            $table->timestamps();
            $table->foreign('food_id')->references('id')->on('milo_food_foods');
        });
    }

    public function down()
    {
        Schema::dropIfExists('milo_food_lunchoffers');
    }
}
