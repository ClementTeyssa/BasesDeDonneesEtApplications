<?php
/**
 * Created by PhpStorm.
 * User: Clement
 * Date: 28/03/2018
 * Time: 15:01
 */

require_once "vendor/autoload.php";

\bdd\conf\ConnexionBase::initialisation('src/conf/conf.ini');

/*
$u = new \bdd\models\User();
$u->name = "Johni";
$u->surname = "John";
$u->email = "john.johni@gmail.com";
$u->address = "45 rue Berhu";
$u->phoneNumber = "0622489563";
$d = new DateTime();
$d->setDate(1996,02,16);
$u->birthDate = $d;
$u->save();


$c1 = new \bdd\models\Comment();
$c1->title = "Lorem ipsum dolor sit amet. ";
$c1->content = "Nullam vel nisi eu mauris gravida imperdiet id et mi. Proin euismod placerat nisi
 ac suscipit. Sed ut turpis molestie, consectetur odio ac, iaculis orci. Praesent lobortis nunc 
 nec felis commodo, a vulputate orci suscipit. Sed arcu mi, gravida nec erat vitae, molestie porttitor
  dolor. Pellentesque nec dolor nec eros aliquet sodales. Praesent hendrerit porttitor mauris, a accumsan erat
   condimentum et. Nullam placerat fringilla lectus, nec rhoncus nulla tempor ullamcorper. Fusce non sollicitudin metus. ";
$c1->email = "john.johni@gmail.com";
$c1->idGame = 12342;
$c1->save();

$c2 = new \bdd\models\Comment();
$c2->title = "Phasellus purus sapien, elementum et. ";
$c2->content = "Cras varius velit id ante rhoncus, porttitor malesuada velit sagittis. 
Praesent ac rhoncus augue. Nullam varius massa ac ex pulvinar, eu iaculis nunc porttitor. 
Quisque a ante pretium ex consequat lobortis. Curabitur tincidunt risus eleifend dolor convallis, 
sit amet feugiat sem viverra. Aenean quis tempus quam. 
Maecenas ex ante, condimentum a lorem ac, vestibulum interdum orci. ";
$c2->email = "john.johni@gmail.com";
$c2->idGame = 12342;
$c2->save();

$c3 = new \bdd\models\Comment();
$c3->title = "Etiam sagittis aliquet turpis, id. ";
$c3->content = "Fusce vulputate rutrum mi. Quisque posuere dictum sem vel placerat. 
In sit amet scelerisque ligula. Curabitur vel purus et nisi iaculis facilisis ac in orci. 
Aliquam vitae fermentum orci. Quisque vulputate venenatis condimentum. Vestibulum vitae massa nunc. ";
$c3->email = "john.johni@gmail.com";
$c3->idGame = 12342;
$c3->save();

$u = new \bdd\models\User();
$u->name = "esport";
$u->surname = "noob";
$u->email = "noob@esport.nl";
$u->address = "48541 place Gueric";
$u->phoneNumber = "0626389123";
$d = new DateTime();
$d->setDate(1993,11,22);
$u->birthDate = $d;
$u->save();

$c1 = new \bdd\models\Comment();
$c1->title = "Duis porttitor dapibus semper. Pellentesque. ";
$c1->content = "Fusce vulputate rutrum mi. Quisque posuere dictum sem vel placerat. 
In sit amet scelerisque ligula. Curabitur vel purus et nisi iaculis facilisis ac in orci. 
Aliquam vitae fermentum orci. Quisque vulputate venenatis condimentum. Vestibulum vitae massa nunc. ";
$c1->email = "noob@esport.nl";
$c1->idGame = 12342;
$c1->save();

$c2 = new \bdd\models\Comment();
$c2->title = "Donec nibh ante, pretium ac. ";
$c2->content = "Nullam vel nisi eu mauris gravida imperdiet id et mi. Proin euismod placerat nisi
 ac suscipit. Sed ut turpis molestie, consectetur odio ac, iaculis orci. Praesent lobortis nunc 
 nec felis commodo, a vulputate orci suscipit. Sed arcu mi, gravida nec erat vitae, molestie porttitor
  dolor. Pellentesque nec dolor nec eros aliquet sodales. Praesent hendrerit porttitor mauris, a accumsan erat
   condimentum et. Nullam placerat fringilla lectus, nec rhoncus nulla tempor ullamcorper. Fusce non sollicitudin metus. ";
$c2->email = "noob@esport.nl";
$c2->idGame = 12342;
$c2->save();

$c3 = new \bdd\models\Comment();
$c3->title = "Morbi tortor orci, convallis a. ";
$c3->content = "Cras varius velit id ante rhoncus, porttitor malesuada velit sagittis. 
Praesent ac rhoncus augue. Nullam varius massa ac ex pulvinar, eu iaculis nunc porttitor. 
Quisque a ante pretium ex consequat lobortis. Curabitur tincidunt risus eleifend dolor convallis, 
sit amet feugiat sem viverra. Aenean quis tempus quam. 
Maecenas ex ante, condimentum a lorem ac, vestibulum interdum orci. ";
$c3->email = "noob@esport.nl";
$c3->idGame = 12342;
$c3->save();
*/

$faker = Faker\Factory::create();
$nbCom = 0;
for ($i=0; $i<25000; $i++){
    $u = new \bdd\models\User();
    $u->name = $faker->name;
    $u->surname = $faker->firstName;
    $mail = $u->name.".".$u->surname."@".$faker->domainName;
    $u->email = $mail;
    $u->address = $faker->address;
    $u->phoneNumber = $faker->phoneNumber;
    $d = new DateTime();
    $d->setDate($faker->year,$faker->month,$faker->dayOfMonth);
    $u->birthDate = $d;
    $u->save();
    $rd = rand(3,12);
    for ($j=0; $j<$rd; $j++){
        $c1 = new \bdd\models\Comment();
        $c1->title =  $faker->words(rand(5,10), true);
        $c1->content = $faker->sentences(rand(2,5), true);
        $c1->email = $mail;
        $c1->idGame = rand(1,47948);
        $c1->save();
        $nbCom++;
    }
}