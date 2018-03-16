<?php
/**
 * Created by PhpStorm.
 * User: Clement
 * Date: 16/03/2018
 * Time: 08:37
 */

require_once "vendor/autoload.php";
\bdd\conf\ConnexionBase::initialisation('src/conf/conf.ini');

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
print "=================================================================================="."/n";
//Mesurer temps d'exec avec 3 vals diff
$timestamp_debut = microtime(true);
$res21 = \bdd\models\Game::where('name', 'like', 'Mario%')->get();
$timestamp_fin = microtime(true);
$difference_ms = $timestamp_fin - $timestamp_debut;
print "Exécution de l'instruction 2.1 req 1 en : ' . $difference_ms . ' secondes.\n";

$timestamp_debut = microtime(true);
$res21 = \bdd\models\Game::where('name', 'like', 'Desert%')->get();
$timestamp_fin = microtime(true);
$difference_ms = $timestamp_fin - $timestamp_debut;
print "Exécution de l'instruction 2.1 req 2 en : ' . $difference_ms . ' secondes.\n";

$timestamp_debut = microtime(true);
$res1 = \bdd\models\Game::where('name', 'like', 'The%')->get();
$timestamp_fin = microtime(true);
$difference_ms = $timestamp_fin - $timestamp_debut;
print "Exécution de l'instruction 2.1 req 2 en : ' . $difference_ms . ' secondes.\n";
print "=================================================================================="."/n";
