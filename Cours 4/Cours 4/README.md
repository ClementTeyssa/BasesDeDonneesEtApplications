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
```
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
```
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
```
-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `title` varchar(20) DEFAULT NULL,
  `content` text,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `name` varchar(20) DEFAULT NULL,
  `surname` varchar(20) DEFAULT NULL,
  `mail` varchar(30) NOT NULL,
  `address` varchar(50) DEFAULT NULL,
  `phoneNumber` varchar(10) DEFAULT NULL,
  `birthDate` date DEFAULT NULL,
  PRIMARY KEY (`mail`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;
```
- Programmer un script php qui crée 2 utilisateurs, 3 commentaires par utilisateurs, tous concernant le
jeu 12342.
```

```
# Partie 2 : génération automatique de données
Ressources : https://github.com/fzaninotto/Faker
- On souhaite programmer un script qui va générer une quantité importante de données pour remplir
les tables concernant les commentaires et les utilisateurs. On souhaite que ces données soient
"réalistes", c'est à dire qu'elles aient une forme proche de données réelles.
Utiliser pour cela un outil de génération de données en php, nommé Faker.
Utiliser faker pour générer 25000 utilisateurs et 250 000 commentaires portant sur les jeux de votre
base. Les associations doivent bien entendu être remplies.
Ecrire les requêtes suivantes :
- lister les commentaires d'un utilisateur donné, afficher la date du commentaire de façon
lisible, ordonnés par date décroissante
```

```
- lister les utilisateurs ayant posté plus de 5 commentaires
```

```