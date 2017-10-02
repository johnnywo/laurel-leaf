<?php
namespace Milo\Sportstv\Updates;

use Seeder;
use Milo\Sportstv\Models\Team;
use Milo\Sportstv\Models\League;


class SeedTeamsAndLeaguesTable extends Seeder {

	public function run()
	{
		Team::create([ 'name' => 'CONFERENCE']);

		Team::create([ 'name' => 'Zalgiris']);
		Team::create([ 'name' => 'Dila Gori']);
		Team::create([ 'name' => 'Rapid']);
		Team::create([ 'name' => 'Barcelona']);
		Team::create([ 'name' => 'Real Madrid']);
		Team::create([ 'name' => 'Arsenal']);
		Team::create([ 'name' => 'Mattersburg']);
		Team::create([ 'name' => 'Wacker Innsbruck']);
		Team::create([ 'name' => 'Ireland']);
		Team::create([ 'name' => 'Everton']);

		Team::create([ 'name' => 'Chelsea']);
		Team::create([ 'name' => 'Borussia Dortmund']);
		Team::create([ 'name' => 'Villareal']);
		Team::create([ 'name' => 'Ried']);
		Team::create([ 'name' => 'Salzburg']);
		Team::create([ 'name' => 'South Hampton']);
		Team::create([ 'name' => 'West Ham United']);
		Team::create([ 'name' => 'Swansea City']);
		Team::create([ 'name' => 'Liverpool']);
		Team::create([ 'name' => 'Hamburg']);

		Team::create([ 'name' => 'Austria Wien']);
		Team::create([ 'name' => 'FC Porto']);
		Team::create([ 'name' => 'Elfsborg']);
		Team::create([ 'name' => 'Thun']);
		Team::create([ 'name' => 'Fulham']);
		Team::create([ 'name' => 'Schalke 04']);
		Team::create([ 'name' => 'Bayern Munich']);
		Team::create([ 'name' => 'Stoke City']);
		Team::create([ 'name' => 'Manchester City']);
		Team::create([ 'name' => 'Manchester United']);

		Team::create([ 'name' => 'WAC']);
		Team::create([ 'name' => 'Swindon Town']);
		Team::create([ 'name' => 'Sturm Graz']);
		Team::create([ 'name' => 'Wiener Neustadt']);
		Team::create([ 'name' => 'Hannover 96']);
		Team::create([ 'name' => 'Tottenham Hotspur']);
		Team::create([ 'name' => 'Almeria']);
		Team::create([ 'name' => 'Real Sociedad']);
		Team::create([ 'name' => 'Sevilla']);
		Team::create([ 'name' => 'Atletico Madrid']);

		Team::create([ 'name' => 'Norwich City']);
		Team::create([ 'name' => 'Werder Bremen']);
		Team::create([ 'name' => 'Nürnberg']);
		Team::create([ 'name' => 'Sunderland']);
		Team::create([ 'name' => 'Braunschweig']);
		Team::create([ 'name' => 'Stuttgart']);
		Team::create([ 'name' => 'Espanyol']);
		Team::create([ 'name' => 'Getafe']);
		Team::create([ 'name' => 'Real Betis']);
		Team::create([ 'name' => 'Newcastle United']);

		Team::create([ 'name' => 'Zenit St. Petersburg']);
		Team::create([ 'name' => 'CSKA Moscow']);
		Team::create([ 'name' => 'Viktoria Plzen']);
		Team::create([ 'name' => 'Esbjerg']);
		Team::create([ 'name' => 'Bayer Leverkusen']);
		Team::create([ 'name' => 'Nuremberg']);
		Team::create([ 'name' => 'West Bromwich Albion']);
		Team::create([ 'name' => 'Sweden']);
		Team::create([ 'name' => 'Germany']);
		Team::create([ 'name' => 'Dynamo Kyiv']);

		Team::create([ 'name' => 'Faroe Islands']);
		Team::create([ 'name' => 'Osasuna']);
		Team::create([ 'name' => 'Aston Villa']);
		Team::create([ 'name' => 'Augsburg']);
		Team::create([ 'name' => 'Wolfsburg']);
		Team::create([ 'name' => 'Elche']);
		Team::create([ 'name' => 'Valladolid']);
		Team::create([ 'name' => 'Crystal Palace']);
		Team::create([ 'name' => 'Racing Genk']);
		Team::create([ 'name' => 'Standard Liege']);

		Team::create([ 'name' => 'Crystal Palaca']);
		Team::create([ 'name' => 'Admira Wacker']);
		Team::create([ 'name' => 'Grödig']);
		Team::create([ 'name' => 'FC Pasching']);
		Team::create([ 'name' => 'Austria Lustenau']);
		Team::create([ 'name' => 'Mainz 05']);
		Team::create([ 'name' => 'Cardiff City']);
		Team::create([ 'name' => 'Reading']);
		Team::create([ 'name' => 'Queens Park Rangers']);
		Team::create([ 'name' => 'Mönchengladbach']);

		Team::create([ 'name' => 'Eintracht Frankfurt']);
		Team::create([ 'name' => 'Freiburg']);
		Team::create([ 'name' => 'Admira']);
		Team::create([ 'name' => 'Portugal']);
		Team::create([ 'name' => 'United States']);
		Team::create([ 'name' => 'England']);
		Team::create([ 'name' => 'Valencia']);
		Team::create([ 'name' => 'Hull City']);
		Team::create([ 'name' => 'Union Berlin']);
		Team::create([ 'name' => 'Kaiserslautern']);

		Team::create([ 'name' => 'FC Köln']);
		Team::create([ 'name' => 'Saarbrücken']);
		Team::create([ 'name' => 'Hoffenheim']);
		Team::create([ 'name' => 'Ingolstadt']);
		Team::create([ 'name' => 'Sandhausen']);
		Team::create([ 'name' => 'Athletic Bilbao']);
		Team::create([ 'name' => 'Levante']);
		Team::create([ 'name' => 'Southampton']);
		Team::create([ 'name' => 'Rayo Vallecano']);
		Team::create([ 'name' => 'Paris St. Germain']);

		Team::create([ 'name' => 'Malaga']);
		Team::create([ 'name' => 'Granada']);
		Team::create([ 'name' => 'Celta Vigo']);
		Team::create([ 'name' => 'Hertha Berlin']);
		Team::create([ 'name' => 'Lazio']);
		Team::create([ 'name' => 'Juventus']);
		Team::create([ 'name' => 'Wigan Athletic']);
		Team::create([ 'name' => 'AC Milan']);
		Team::create([ 'name' => 'Trabzonspor']);
		Team::create([ 'name' => 'Ajax']);

		Team::create([ 'name' => 'Olympiacos']);
		Team::create([ 'name' => 'Galatasaray']);
		Team::create([ 'name' => 'Uruguay']);
		Team::create([ 'name' => 'Serbia']);
		Team::create([ 'name' => 'Basel']);
		Team::create([ 'name' => 'Fiorentina']);
		Team::create([ 'name' => 'Lyon']);
		Team::create([ 'name' => 'AZ Alkmaar']);
		Team::create([ 'name' => 'Benfica']);
		Team::create([ 'name' => 'Poland']);

		Team::create([ 'name' => 'Brazil']);
		Team::create([ 'name' => 'Croatia']);
		Team::create([ 'name' => 'Mexico']);
		Team::create([ 'name' => 'Cameroon']);
		Team::create([ 'name' => 'Spain']);
		Team::create([ 'name' => 'Netherlands']);
		Team::create([ 'name' => 'Chile']);
		Team::create([ 'name' => 'Australia']);
		Team::create([ 'name' => 'Colombia']);
		Team::create([ 'name' => 'Greece']);

		Team::create([ 'name' => 'Ivory Coast']);
		Team::create([ 'name' => 'Japan']);
		Team::create([ 'name' => 'Uruguay']);
		Team::create([ 'name' => 'Costa Rica']);
		Team::create([ 'name' => 'England']);
		Team::create([ 'name' => 'Italy']);
		Team::create([ 'name' => 'Switzerland']);
		Team::create([ 'name' => 'Ecuador']);
		Team::create([ 'name' => 'France']);
		Team::create([ 'name' => 'Honduras']);

		Team::create([ 'name' => 'Argentina']);
		Team::create([ 'name' => 'Bosnia']);
		Team::create([ 'name' => 'Iran']);
		Team::create([ 'name' => 'Nigeria']);
		Team::create([ 'name' => 'Ghana']);
		Team::create([ 'name' => 'USA']);
		Team::create([ 'name' => 'Belgium']);
		Team::create([ 'name' => 'Algeria']);
		Team::create([ 'name' => 'Russia']);
		Team::create([ 'name' => 'South Korea']);

		Team::create([ 'name' => 'Turkey']);
		Team::create([ 'name' => 'Iceland']);
		Team::create([ 'name' => 'Deutschland']);
		Team::create([ 'name' => 'Algerien']);
		Team::create([ 'name' => 'Belgien']);
		Team::create([ 'name' => 'Grasshoppers']);
		Team::create([ 'name' => 'Lille']);
		Team::create([ 'name' => 'Asteras Tripolis']);
		Team::create([ 'name' => 'Zimbru Chisinau']);
		Team::create([ 'name' => 'Garabagh']);
		Team::create([ 'name' => 'St.Pölten']);
		Team::create([ 'name' => 'PSV Eindhoven']);
		Team::create([ 'name' => 'Altach']);
		Team::create([ 'name' => 'Burnley']);
		Team::create([ 'name' => 'FC Copenhagen']);
		Team::create([ 'name' => 'Malmö']);
		Team::create([ 'name' => 'HJK Helsinki']);
		Team::create([ 'name' => 'Eibar']);
		Team::create([ 'name' => 'Cordoba']);
		Team::create([ 'name' => 'Leicester City']);
		Team::create([ 'name' => 'Georgia']);
		Team::create([ 'name' => 'Scotland']);
		Team::create([ 'name' => 'Albania']);
		Team::create([ 'name' => 'Norway']);
		Team::create([ 'name' => 'Celtic']);
		Team::create([ 'name' => 'Deportivo La Coruna']);
		Team::create([ 'name' => 'FC Cologne']);
		Team::create([ 'name' => 'Monaco']);
		Team::create([ 'name' => 'Astra Giorgiu']);
		Team::create([ 'name' => 'Zürich']);

		Team::create([ 'name' => 'Moldova']);
		Team::create([ 'name' => 'Montenegro']);
		Team::create([ 'name' => 'Wales']);
		Team::create([ 'name' => 'Cyprus']);
		Team::create([ 'name' => 'Northern Ireland']);
		Team::create([ 'name' => 'Paderborn']);
		Team::create([ 'name' => 'Dinamo Zagreb']);
		Team::create([ 'name' => 'Belarus']);
		Team::create([ 'name' => 'Latvia']);
		Team::create([ 'name' => 'Roma']);
		Team::create([ 'name' => 'Cornella']);
		Team::create([ 'name' => 'L\'Hospitalet']);
		Team::create([ 'name' => 'Huesca']);
		Team::create([ 'name' => 'Bournemouth']);
		Team::create([ 'name' => 'L´Hospitalet']);
		Team::create([ 'name' => 'Shaktar Donetsk']);
		Team::create([ 'name' => 'FC Basel']);
		Team::create([ 'name' => 'Sheffield United']);
		Team::create([ 'name' => 'Dynamo Dresden']);
		Team::create([ 'name' => 'Inter Milan']);
		Team::create([ 'name' => 'Dinamo Moscow']);
		Team::create([ 'name' => 'Napoli']);
		Team::create([ 'name' => 'Liechtenstein']);
		Team::create([ 'name' => 'Israel']);
		Team::create([ 'name' => 'Bosnia-Herzegovina']);
		Team::create([ 'name' => 'Dnipro']);
		Team::create([ 'name' => 'Gibraltar']);
		Team::create([ 'name' => 'Las Palmas']);
		Team::create([ 'name' => 'Sporting Gijon']);
		Team::create([ 'name' => 'Dinamo Minsk']);

		Team::create([ 'name' => 'Belenenses']);
		Team::create([ 'name' => 'Fiji']);
		Team::create([ 'name' => 'New Zealand']);
		Team::create([ 'name' => 'Namibia']);
		Team::create([ 'name' => 'Romania']);
		Team::create([ 'name' => 'South Africa']);
		Team::create([ 'name' => 'Watford']);
		Team::create([ 'name' => 'Darmstadt 98']);
		Team::create([ 'name' => 'Czech Republic']);
		Team::create([ 'name' => 'Astana']);
		Team::create([ 'name' => 'Hungary']);
		Team::create([ 'name' => 'Denmark']);
		Team::create([ 'name' => 'BATE Borisov']);
		Team::create([ 'name' => 'Bochum']);
		Team::create([ 'name' => 'AA Gent']);
		Team::create([ 'name' => 'Malta']);
		Team::create([ 'name' => 'Slovakia']);
		Team::create([ 'name' => 'Ukraine']);
		Team::create([ 'name' => 'Republic of Ireland']);
		Team::create([ 'name' => 'Rosenborg']);
		Team::create([ 'name' => 'Trencin']);
		Team::create([ 'name' => 'RB Leipzig']);
		Team::create([ 'name' => 'Alavés']);
		Team::create([ 'name' => 'FK Krasnodar']);
		Team::create([ 'name' => 'Bulgaria']);
		Team::create([ 'name' => 'Middlesbrough']);
		Team::create([ 'name' => 'Nice']);
		Team::create([ 'name' => 'Sassuolo']);
		Team::create([ 'name' => 'Birmingham City']);
		Team::create([ 'name' => 'Rostov']);
		Team::create([ 'name' => 'Austria']);

		League::create([ 'name' => 'Champions League' ]);
		League::create([ 'name' => 'Europa League' ]);
		League::create([ 'name' => 'English Premier League' ]);
		League::create([ 'name' => 'Spanish Primera Division']);
		League::create([ 'name' => 'Bundesliga(DE)' ]);
		League::create([ 'name' => 'Bundesliga(AT)' ]);
		League::create([ 'name' => 'Friendly International' ]);
	}
}