<?php
/**
 * Created by PhpStorm.
 * User: Clement
 * Date: 03/04/2018
 * Time: 16:46
 */

require_once "vendor/autoload.php";

\bdd\conf\ConnexionBase::initialisation('src/conf/conf.ini');

$app = new \Slim\Slim();

$app->get('/api/games/:no(/)', function ($no){
    (new bdd\controlers\GamesControler())->getGame($no);
})->name("games");



$app->run();