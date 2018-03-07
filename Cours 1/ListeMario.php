<?php
/**
 * Created by PhpStorm.
 * User: Clement
 * Date: 07/03/2018
 * Time: 16:50
 */

require_once "vendor/autoload.php";
\bdd\conf\ConnexionBase::initialisation('src/conf/conf.ini');

$res = \bdd\models\Game::where('name','like','%Mario%')->get();
foreach ($res as $re){
    printf($re->id." ".$re->name);
}