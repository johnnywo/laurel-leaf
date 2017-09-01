<?php namespace Milo\Sportstv\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateGamesTable extends Migration
{
    public function up()
    {
        Schema::create('milo_sportstv_games', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->dateTime('datetime');
            $table->integer('league_id')->unsigned();
            $table->integer('home_team_id')->unsigned()->default(1);
            $table->integer('away_team_id')->unsigned()->default(1);
            $table->boolean('comment_check')->default(0);
            $table->string('comment');
            $table->boolean('conference')->default(0);
            $table->timestamps();
            $table->foreign('league_id')->references('id')->on('milo_sportstv_leagues');
            $table->foreign('home_team_id')->references('id')->on('milo_sportstv_teams');
	        $table->foreign('away_team_id')->references('id')->on('milo_sportstv_teams');
        });
    }

    public function down()
    {
        Schema::dropIfExists('milo_sportstv_games');
    }
}
