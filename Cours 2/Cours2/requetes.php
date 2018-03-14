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