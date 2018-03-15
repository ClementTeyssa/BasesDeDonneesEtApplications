<?php
/**
 * Created by PhpStorm.
 * User: Clement
 * Date: 15/03/2018
 * Time: 08:55
 */
$timestamp_debut = microtime(true);
for($i = 0; $i < 100000000; $i++){
    $i++;
    $i--;
}
$timestamp_fin = microtime(true);
$difference_ms = $timestamp_fin - $timestamp_debut;
print "Exécution de l'instruction en : ' . $difference_ms . ' secondes.\n";
print "==================================================================================\n";
