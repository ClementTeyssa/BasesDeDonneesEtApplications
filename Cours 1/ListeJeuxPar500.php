<?php
/**
 * Created by PhpStorm.
 * User: Clement
 * Date: 07/03/2018
 * Time: 17:30
 */

require_once "vendor/autoload.php";
\bdd\conf\ConnexionBase::initialisation('src/conf/conf.ini');

$continuer = true;
$i=1;
while($continuer){
    $res = $res = \bdd\models\Game::where([["id",">",($i-1)*500],["id","<=", $i*500]])->get();
    foreach ($res as $re){
        print ($re->id." ".$re->name."\n");
    }
    $rep = readline("Suivant = 2, Précédent = 1, Arret = 0 : ");
    switch ($rep){
        case 0:
            $continuer = false;
            break;
        case 1:
            $i--;
            break;
        case 2:
            $i++;
            break;
    }
    if($i == 0)
        $i = 1;
}