<?php namespace Milo\Sportstv\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateLeaguesTable extends Migration
{
    public function up()
    {
        Schema::create('milo_sportstv_leagues', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('milo_sportstv_leagues');
    }
}
