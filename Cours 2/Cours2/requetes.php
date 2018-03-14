<?php
/**
 * Created by PhpStorm.
 * User: Clement
 * Date: 14/03/2018
 * Time: 15:28
 */

require_once "vendor/autoload.php";
\bdd\conf\ConnexionBase::initialisation('src/conf/conf.ini');

$res2 = \bdd\models\Game::where('name', 'like', '%Mario%')->get();
foreach($res2 as $re){
    $pers = $re->characters;
    foreach ($pers as $per){
        print $per."\n";
    }
}