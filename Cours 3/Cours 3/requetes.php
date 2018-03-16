<?php
/**
 * Created by PhpStorm.
 * User: Clement
 * Date: 16/03/2018
 * Time: 08:37
 */

require_once "vendor/autoload.php";
\bdd\conf\ConnexionBase::initialisation('src/conf/conf.ini');

$timestamp_debut = microtime(true);
$req = \bdd\models\Game::where("name", "like", "Mario%")
    ->whereHas("game_ratings", function ($q){
        $q->where("name", "like", "%3+%");
    })
    ->get();
$timestamp_fin = microtime(false);
$tps_execution = $timestamp_fin-$timestamp_debut;

print "=================================================================================="."/n";
//Afficher perso jeux commencant par "mario"
$timestamp_debut = microtime(true);
$res3 = \bdd\models\Game::where('name', 'like', 'Mario%')->get();
foreach($res3 as $re){
	$pers = $re->characters;
	
	foreach ($pers as $per){
		
	}
}
$timestamp_fin = microtime(true);
$difference_ms = $timestamp_fin - $timestamp_debut;
print "Exécution de l'instruction en : ' . $difference_ms . ' secondes.\n";	

