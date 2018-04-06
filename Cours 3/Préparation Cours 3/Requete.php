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
print "Exécution de l'instruction en : " . $difference_ms . " secondes.\n";
print "==================================================================================\n";
DB::connection()->enableQueryLog();
DB::getQueryLog();

/**
 * C'est un tableau de taille n (n etant le nombbre de requetes)
 * Dans chaque valeur de ce tableau, on retrouve un tableau de taille 3, composé de la requete en elle meme
 * (avec des ?), les "bindings" qui sont les valeurs à placer à la place des ?,
 * et le temps d'execution
 */
/*
array(1) {
    [0]=>
  array(3) {
        ["query"]=>
    string(55) "select * from `company` where `location_country` like ?"
        ["bindings"]=>
    array(1) {
            [0]=>
      string(7) "%Japan%"
    }
    ["time"]=>
    float(20.02)
  }
}
*/
