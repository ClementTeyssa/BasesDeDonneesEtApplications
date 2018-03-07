<?php
/**
 * Created by PhpStorm.
 * User: Clement
 * Date: 07/03/2018
 * Time: 17:14
 */

require_once "vendor/autoload.php";
\bdd\conf\ConnexionBase::initialisation('src/conf/conf.ini');

$res = \bdd\models\Platform::where("install_base",">=", 10000000)->get();
foreach ($res as $re) {
    print($re->id." ".$re->name."\n");
}