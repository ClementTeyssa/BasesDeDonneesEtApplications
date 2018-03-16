<?php
/**
 * Created by PhpStorm.
 * User: Clement
 * Date: 16/03/2018
 * Time: 08:37
 */

require_once "vendor/autoload.php";
\bdd\conf\ConnexionBase::initialisation('src/conf/conf.ini');

//print "==================================================================================\n";
$timestamp_debut = microtime(true);
$res1 = \bdd\models\Game::get();
foreach ($res1 as $re){
    $tmp = $re->name."\n";
}
$timestamp_fin = microtime(true);
$difference_ms = $timestamp_fin - $timestamp_debut;
print "Exécution de l'instruction en : " . $difference_ms . " secondes.\n";
print "==================================================================================\n";
