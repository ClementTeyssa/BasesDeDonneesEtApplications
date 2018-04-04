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

$app->get('/api/games/:no/character', function ($no){
    (new bdd\controlers\GamesControler())->getGameCar($no);
})->name("gamesCa");

$app->get('/api/games/:no/comments', function ($no){
    (new bdd\controlers\GamesControler())->getGameCom($no);
})->name("gamesCo");

$app->get('/api/games/:no', function ($no){
    (new bdd\controlers\GamesControler())->getGame($no);
})->name("gamesNo");

$app->get('/api/games', function (){
    (new bdd\controlers\GamesControler())->getGames();
})->name("games");



$app->run();