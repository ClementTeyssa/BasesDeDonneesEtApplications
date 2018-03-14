<?php
/**
 * Created by PhpStorm.
 * User: Clement
 * Date: 14/03/2018
 * Time: 15:28
 */

require_once "vendor/autoload.php";
\bdd\conf\ConnexionBase::initialisation('src/conf/conf.ini');

//requete 1
$req1 = \bdd\models\Game::where("id","=","12342")->first();
$characters = $req1->characters;
foreach($characters as $char){
	print($char->name." ".$char->deck."\n");
}