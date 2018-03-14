# Partie 1
- construire le modèle UML des données correspondant à l'application décrite
`Voir Diagramme_UML.png`
- construire le modèle relationnel correspondant
```
Jeu (ID, name, alias, desCourte, desLongue, dateSortieInit, dateSortieAtt, #IDCompagnie, #IDGenre)
Plateforme (ID, nom, alias, desCourte, desLongue, dateSortie, tarifInit, décompte, #IDCompagnie)
Compagnie (ID, nom, alias, abréviation, desCourte, desLongue, adresse, dateCrea, numTel, url)
Personnage (ID, nom, alias, nomReel, nomF, dateNaiss, genre, desCourte, desLongue, #PremierJeu)
Genre (ID, type, desCourte, desLongue)
Theme (ID, type)
OrgaDeClassification (ID, nom, desCourte, desLongue)
Classement (ID, public, #IDOrga)
Ami (#Perso1, #Perso2)
Ennemi (#Perso1, #Perso2)
Classifier (#IDJeu, #IDClassement)
Publier (#IDJeu, #IDCompagnie)
Fonctionner (#IDJeu, #IDPlateforme)
CorresTheme (#IDTheme, #IDJeu)
Utiliser (#IDJeu, #IDPerso)

```
- créer la base de données en utilisant les scripts sql fournis
```
dans un terminal, dans le répertoire des fichiers sql
mysql -u UTILISATEUR -p BASEDEDONNEES < games_schema.sql
mysql -u UTILISATEUR -p BASEDEDONNEES < games_data.sql
```

# Partie 2
Ecrire les requêtes suivantes avec eloquent ; pour chacune d'elles, créer le modèle nécessaire, et
réalisez la requête sous la forme d'une méthode d'une classe contenant toutes les requêtes.
Le programme principal peut être un script en ligne de commande.

- lister les jeux dont le nom contient 'Mario'
```
$res = \bdd\models\Game::where('name','like','%Mario%')->get();
foreach ($res as $re){
    print($re->id." ".$re->name."\n");
}
```
- lister les compagnies installées au Japon
```
$res = \bdd\models\Company::where("location_country","=","Japan")->get();
foreach ($res as $re) {
    print($re->id." ".$re->name."\n");
}
```
- lister les plateformes dont la base installée est >= 10 000 000
```
$res = \bdd\models\Platform::where("install_base",">=", 10000000)->get();
foreach ($res as $re) {
    print($re->id." ".$re->name."\n");
}
```
- lister 442 jeux à partir du 21173ème
```
$res = \bdd\models\Game::where([
    ["id",">",21173],
    ["id", "<=", 21615]
])->get();

foreach ($res as $re) {
    print($re->id." ".$re->name."\n");
}
```
- lister les jeux, afficher leur nom et deck, en paginant (taille des pages : 500)
```
$continuer = true;
$i=1;
while($continuer){
    $res = \bdd\models\Game::where([["id",">",($i-1)*500],["id","<=", $i*500]])->get();
    foreach ($res as $re){
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
```