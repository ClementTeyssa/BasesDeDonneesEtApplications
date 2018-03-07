<?php
/**
 * Created by PhpStorm.
 * User: Clement
 * Date: 07/03/2018
 * Time: 17:17
 */
require_once "vendor/autoload.php";
\bdd\conf\ConnexionBase::initialisation('src/conf/conf.ini');

$res = \bdd\models\Game::where([
    ["id",">",21173],
    ["id", "<=", 21615]
])->get();

foreach ($res as $re) {
    print($re->id." ".$re->name."\n");
}