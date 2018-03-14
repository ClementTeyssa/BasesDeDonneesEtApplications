<?php
/**
 * Created by PhpStorm.
 * User: Clement
 * Date: 14/03/2018
 * Time: 15:28
 */

require_once "vendor/autoload.php";
\bdd\conf\ConnexionBase::initialisation('src/conf/conf.ini');
/*
$req1 = \bdd\models\Game::where("id","=","12342")->first();
$characters = $req1->characters;
foreach($characters as $char) {
    print($char->name . " " . $char->deck . "\n");
}
print "==================================================================================\n";
$res2 = \bdd\models\Game::where('name', 'like', '%Mario%')->get();
foreach($res2 as $re){
    $pers = $re->characters;
    print "---------".$re->name."---------\n";
    foreach ($pers as $per){
        print $per->id." ".$per->name."\n";
    }
}
print "==================================================================================\n";
$req3 = \bdd\models\Company::where("name","like","%Sony%")->get();
foreach ($req3 as $re){
    $games = $re->developers;
    print "---------".$re->name."---------\n";
    foreach ($games as $game){
        print $game->name."\n";
    }
}

print "==================================================================================\n";
*/

print "==================================================================================\n";
$req5 = \bdd\models\Game::where("name","like","Mario%")->get();
foreach($req5 as $res){
    $characters = $res->characters;
    if(sizeOf($characters)>=3){
        print($res->name."\n");
    }
}
print "==================================================================================\n";


print "==================================================================================\n";
$nouvGenre = new \bdd\models\Genre();
$nouvGenre->name = 'MEUPORG';
$nouvGenre->deck = 'MMORPG mais en nul';
$nouvGenre->save();

$genre = \bdd\models\Genre::find($nouvGenre->id);
$jeu = \bdd\models\Game::find(12);
$jeu->genres()->associate($genre);

$jeu = \bdd\models\Game::find(56);
$jeu->genres()->associate($genre);

$jeu = \bdd\models\Game::find(345);
$jeu->genres()->associate($genre);

print "==================================================================================\n";

print "==================================================================================\n";
$req7 = \bdd\models\Game::where("name","like","%Mario")->whereHas('publishers', function ($q){
$q->where('name', 'like', '%Inc%'))->whereHas('game_raitings', function ($q){
$q->where('name', 'like', '%3+'))->get()
print "==================================================================================\n";
