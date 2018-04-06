# Séance 4
objectif : utiliser un outil de génération de données
On souhaite compléter la base pour représenter des commentaires apportés par des utilisateurs sur
les jeux.
Pour pouvoir ensuite tester cette partie de la base de données, les tables correspondant aux
commentaires et aux utilisateurs seront remplies avec des données produites par un outil de
génération automatique de données typées et insérées dans la base avec un script.
# Partie 1 : modélisation et création des tables
- Compléter le modèle des données en ajoutant les éléments permettant de représenter les utilisateurs
et les commentaires. On suppose que les utilisateurs sont identifiés par leur @email. On possède les
informations suivantes sur chaque utilisateur : nom, prénom, email, adresse détaillée, numéro de tel,
date de naissance.
```php
class User extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'user';
    protected $primaryKey = 'email';
    public $timestamps = false;

    public function comments(){
        return $this->hasMany('\bdd\models\Comment', 'email');
    }

}
```
- Pour un commentaire : titre, contenu, date de création,
```php
class Comment extends \Illuminate\Database\Eloquent\Model
{

    protected $table = 'comment';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('\bdd\models\User','email');
    }
}
```
- Créer les tables correspondantes dans la base de données ; prévoir les colonnes 'created_at' et
'updated_at', de type DateTime, dans la tables des commentaires. Créer les modèles Eloquent
associés. Le modèle associé à la table des commentaires doit indiquer que les timestamps seront
gérés.
```php
-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `title` varchar(50) DEFAULT NULL,
  `content` text,
  `id` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idGame` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`title`, `content`, `id`, `email`, `updated_at`, `created_at`, `idGame`) VALUES
('Morbi tortor orci, c', 'Cras varius velit id ante rhoncus, porttitor malesuada velit sagittis. \r\nPraesent ac rhoncus augue. Nullam varius massa ac ex pulvinar, eu iaculis nunc porttitor. \r\nQuisque a ante pretium ex consequat lobortis. Curabitur tincidunt risus eleifend dolor convallis, \r\nsit amet feugiat sem viverra. Aenean quis tempus quam. \r\nMaecenas ex ante, condimentum a lorem ac, vestibulum interdum orci. ', 12, 'noob@esport.nl', '2018-03-28 15:48:33', '2018-03-28 15:48:33', 12342),
('Donec nibh ante, pre', 'Nullam vel nisi eu mauris gravida imperdiet id et mi. Proin euismod placerat nisi\r\n ac suscipit. Sed ut turpis molestie, consectetur odio ac, iaculis orci. Praesent lobortis nunc \r\n nec felis commodo, a vulputate orci suscipit. Sed arcu mi, gravida nec erat vitae, molestie porttitor\r\n  dolor. Pellentesque nec dolor nec eros aliquet sodales. Praesent hendrerit porttitor mauris, a accumsan erat\r\n   condimentum et. Nullam placerat fringilla lectus, nec rhoncus nulla tempor ullamcorper. Fusce non sollicitudin metus. ', 11, 'noob@esport.nl', '2018-03-28 15:48:33', '2018-03-28 15:48:33', 12342),
('Duis porttitor dapib', 'Fusce vulputate rutrum mi. Quisque posuere dictum sem vel placerat. \r\nIn sit amet scelerisque ligula. Curabitur vel purus et nisi iaculis facilisis ac in orci. \r\nAliquam vitae fermentum orci. Quisque vulputate venenatis condimentum. Vestibulum vitae massa nunc. ', 10, 'noob@esport.nl', '2018-03-28 15:48:33', '2018-03-28 15:48:33', 12342),
('Etiam sagittis aliqu', 'Fusce vulputate rutrum mi. Quisque posuere dictum sem vel placerat. \r\nIn sit amet scelerisque ligula. Curabitur vel purus et nisi iaculis facilisis ac in orci. \r\nAliquam vitae fermentum orci. Quisque vulputate venenatis condimentum. Vestibulum vitae massa nunc. ', 9, 'john.johni@gmail.com', '2018-03-28 15:48:33', '2018-03-28 15:48:33', 12342),
('Phasellus purus sapi', 'Cras varius velit id ante rhoncus, porttitor malesuada velit sagittis. \r\nPraesent ac rhoncus augue. Nullam varius massa ac ex pulvinar, eu iaculis nunc porttitor. \r\nQuisque a ante pretium ex consequat lobortis. Curabitur tincidunt risus eleifend dolor convallis, \r\nsit amet feugiat sem viverra. Aenean quis tempus quam. \r\nMaecenas ex ante, condimentum a lorem ac, vestibulum interdum orci. ', 8, 'john.johni@gmail.com', '2018-03-28 15:48:33', '2018-03-28 15:48:33', 12342),
('Lorem ipsum dolor si', 'Nullam vel nisi eu mauris gravida imperdiet id et mi. Proin euismod placerat nisi\r\n ac suscipit. Sed ut turpis molestie, consectetur odio ac, iaculis orci. Praesent lobortis nunc \r\n nec felis commodo, a vulputate orci suscipit. Sed arcu mi, gravida nec erat vitae, molestie porttitor\r\n  dolor. Pellentesque nec dolor nec eros aliquet sodales. Praesent hendrerit porttitor mauris, a accumsan erat\r\n   condimentum et. Nullam placerat fringilla lectus, nec rhoncus nulla tempor ullamcorper. Fusce non sollicitudin metus. ', 7, 'john.johni@gmail.com', '2018-03-28 15:48:33', '2018-03-28 15:48:33', 12342);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;COMMIT;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `name` varchar(30) DEFAULT NULL,
  `surname` varchar(30) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phoneNumber` varchar(20) DEFAULT NULL,
  `birthDate` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`name`, `surname`, `email`, `address`, `phoneNumber`, `birthDate`) VALUES
('esport', 'noob', 'noob@esport.nl', '48541 place Gueric', '0626389123', '1993-11-22'),
('Johni', 'John', 'john.johni@gmail.com', '45 rue Berhu', '0622489563', '1996-02-16');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);
COMMIT;
```
- Programmer un script php qui crée 2 utilisateurs, 3 commentaires par utilisateurs, tous concernant le
jeu 12342.
```php

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
```
# Partie 2 : génération automatique de données
Ressources : https://github.com/fzaninotto/Faker
- On souhaite programmer un script qui va générer une quantité importante de données pour remplir
les tables concernant les commentaires et les utilisateurs. On souhaite que ces données soient
"réalistes", c'est à dire qu'elles aient une forme proche de données réelles.
Utiliser pour cela un outil de génération de données en php, nommé Faker.
Utiliser faker pour générer 25000 utilisateurs et 250 000 commentaires portant sur les jeux de votre
base. Les associations doivent bien entendu être remplies.
```php

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
```
Ecrire les requêtes suivantes :
- lister les commentaires d'un utilisateur donné, afficher la date du commentaire de façon
lisible, ordonnés par date décroissante
```php
$commentaires = $u->comments->orderBy("dateCreation")->get();
foreach ($commentaires as $com) {
    echo $com->titre."\n" . $com->dateCreation;
}
```
- lister les utilisateurs ayant posté plus de 5 commentaires
```php

```