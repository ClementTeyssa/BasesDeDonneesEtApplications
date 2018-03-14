<?php
/**
 * Created by PhpStorm.
 * User: Clement
 * Date: 14/03/2018
 * Time: 15:28
 */

require_once "vendor/autoload.php";
\bdd\conf\ConnexionBase::initialisation('src/conf/conf.ini');

$req1 = \bdd\models\Game::where("id","=","12342")->first();
$characters = $req1->characters;
foreach($characters as $char){
	print($char->name." ".$char->deck."\n");
}

$req3 = \bdd\models\Company::where("name","like","%Sony%")->get();
foreach($req3 as $res){
	$games = $res->games;
	foreach($games as $game){
		print($game->name."\n");
	}
}


$req5 = \bdd\models\Games::where("name","like","Mario%")->get();
foreach($req5 as $res){
	$characters = $res->characters;
	if(sizeOf($characters)>=3){
		print($res->name."\n");
	}
}

