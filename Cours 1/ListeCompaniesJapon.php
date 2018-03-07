<?php
/**
 * Created by PhpStorm.
 * User: Clement
 * Date: 07/03/2018
 * Time: 17:10
 */

require_once "vendor/autoload.php";
\bdd\conf\ConnexionBase::initialisation('src/conf/conf.ini');

$res = \bdd\models\Company::where("location_country","=","Japan")->get();
foreach ($res as $re) {
    print($re->id." ".$re->name."\n");
}