# Préparation de la séance 4
Ressources à étudier :
- https://github.com/fzaninotto/Faker
- le type DateTime en PHP : http://php.net/manual/fr/class.datetime.php
- comment s'installe faker ?
```
"fzaninotto/faker" : "1.7.1" dans le composer
composer install
faire le require :  require_once 'vendor/autoload.php';
$faker = Faker\Factory::create();
```
- donnez un exemple de code pour générer une adresse américaine en utilisant faker,
```
foreach (range(1, 100) as $i){
    echo $faker->word."\n";
}
```
- formattez une date en type DateTime : "2017/02/16 (16:15)"
```
$d = new DateTime();
$d->setDate(2017,02,16);
$d->setTime(16,15);
echo $d->format('Y/m/d (H:i)');
```