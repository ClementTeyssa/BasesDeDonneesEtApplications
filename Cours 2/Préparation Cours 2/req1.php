<?php
/**
 * Created by PhpStorm.
 * User: Clement
 * Date: 14/03/2018
 * Time: 14:26
 */

require_once "vendor/autoload.php";

$res1 = \bdd\models\Annonce::find(22)->photos;

$res2 = \bdd\models\Annonce::find(22)
    ->photos
    ->where("taille_octet", ">", 100000)
    ->get();

$res3 = \bdd\models\Annonce::has("photos", ">", 3)->get();

$res4 = \bdd\models\Annonce::whereHas("photos", function ($q){
    $q->where("taille_octet", ">", 100000)->get();
})->get();

/*
 * res 5
 */
$p = new \bdd\models\Photo();
$p->file = "img.png";
$p->date = "2018-03-14";
$p->taille = 94635;
$p->save();

$res5 = \bdd\models\Annonce::find(22);
$res5->photos->attach($p->idPhoto);

$res6 = \bdd\models\Annonce::find(22);
$res6->categories->attach([42,73]);