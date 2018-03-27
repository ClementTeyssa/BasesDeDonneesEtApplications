<?php
/**
 * Created by PhpStorm.
 * User: Clement
 * Date: 27/03/2018
 * Time: 18:22
 */
require_once 'vendor/autoload.php';

$faker = Faker\Factory::create();

foreach (range(1, 100) as $i){
    echo $faker->word."\n";
}

$d = new DateTime();
$d->setDate(2017,02,16);
$d->setTime(16,15);
echo $d->format('Y/m/d (H:i)');