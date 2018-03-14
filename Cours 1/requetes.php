<?php
/**
 * Created by PhpStorm.
 * User: Clement
 * Date: 14/03/2018
 * Time: 15:01
 */

require_once "vendor/autoload.php";
\bdd\conf\ConnexionBase::initialisation('src/conf/conf.ini');

$res1 = \bdd\models\Game::where('name','like','%Mario%')->get();
foreach ($res1 as $re){
    print($re->id." ".$re->name."\n");
}

$res2 = \bdd\models\Company::where("location_country","=","Japan")->get();
foreach ($res2 as $re) {
    print($re->id." ".$re->name."\n");
}

$res3 = \bdd\models\Platform::where("install_base",">=", 10000000)->get();
foreach ($res3 as $re) {
    print($re->id." ".$re->name."\n");
}

$res4 = \bdd\models\Game::where([
    ["id",">",21173],
    ["id", "<=", 21615]
])->get();

foreach ($res4 as $re) {
    print($re->id." ".$re->name."\n");
}

$continuer = true;
$i=1;
while($continuer){
    $res5 = \bdd\models\Game::where([["id",">",($i-1)*500],["id","<=", $i*500]])->get();
    foreach ($res5 as $re){
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