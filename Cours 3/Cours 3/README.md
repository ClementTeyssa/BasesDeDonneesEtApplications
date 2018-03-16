# Partie 1 : mesurer les performances et utiliser des index
Ressources :
http://php.net/manual/fr/function.microtime.php
https://openclassrooms.com/courses/administrez-vos-bases-de-donnees-avec-mysql/index-1

Compléter vos scripts contenant des requêtes pour mesurer le temps d'exécution des requêtes faites
avec Eloquent. Mesurez uniquement le temps d'exécution, sans prendre en compte l'affichage.
Mesurer en particulier les requêtes :
- lister l'ensemble des jeux,
```
$timestamp_debut = microtime(true);
$res1 = \bdd\models\Game::get();
foreach ($res1 as $re){
    $tmp = $re->name."\n";
}
$timestamp_fin = microtime(true);
$difference_ms = $timestamp_fin - $timestamp_debut;
print "Exécution de l'instruction en : " . $difference_ms . " secondes.\n";
```
- lister les jeux dont le nom contient 'Mario'
```
$res2 = \bdd\models\Game::where("name", "like", "%Mario%");
foreach ($res1 as $re){
    $tmp = $re->name."\n";
}
$timestamp_fin = microtime(true);
$difference_ms = $timestamp_fin - $timestamp_debut;
print "Exécution de l'instruction 2 en : " . $difference_ms . " secondes.\n";
```
- afficher les personnages des jeux dont le nom débute par 'Mario'
```
$res3 = \bdd\models\Game::where('name', 'like', 'Mario%')->get();
foreach($res3 as $re){
	$pers = $re->characters;
	foreach ($pers as $per){
	    $tmp = $re->name;
    }
}
$timestamp_fin = microtime(true);
$difference_ms = $timestamp_fin - $timestamp_debut;
print "Exécution de l'instruction 3 en : ' . $difference_ms . ' secondes.\n";
```
- les jeux dont le nom débute par 'Mario' et dont le rating initial contient '3+'
```
$timestamp_debut = microtime(true);
$req4 = \bdd\models\Game::where("name", "like", "Mario%")
    ->whereHas("game_ratings", function ($q){
        $q->where("name", "like", "%3+%");
    })
    ->get();
$timestamp_fin = microtime(true);
$difference_ms = $timestamp_fin-$timestamp_debut;
print "Exécution de l'instruction 4 en : " . $difference_ms . " secondes.\n";
```

Cache de requêtes mysql : comparer le temps d'exécution d'une requête coûteuse entre la 1ère
exécution et les exécutions suivantes.
```
$timestamp_debut = microtime(true);
$req5_1 = \bdd\models\Game::where("name", "like", "Mario%")
    ->whereHas("game_ratings", function ($q){
        $q->where("name", "like", "%3+%");
    })
    ->get();
$timestamp_fin = microtime(true);
$difference_ms = $timestamp_fin-$timestamp_debut;
print "Exécution de l'instruction 5.1 en : " . $difference_ms . " secondes.\n";
$timestamp_debut = microtime(true);
$req5_2 = \bdd\models\Game::where("name", "like", "Mario%")
    ->whereHas("game_ratings", function ($q){
        $q->where("name", "like", "%3+%");
    })
    ->get();
$timestamp_fin = microtime(true);
$difference_ms = $timestamp_fin-$timestamp_debut;
print "Exécution de l'instruction 5.2 en : " . $difference_ms . " secondes.\n";
$timestamp_debut = microtime(true);
$req5_3 = \bdd\models\Game::where("name", "like", "Mario%")
    ->whereHas("game_ratings", function ($q){
        $q->where("name", "like", "%3+%");
    })
    ->get();
$timestamp_fin = microtime(true);
$difference_ms = $timestamp_fin-$timestamp_debut;
print "Exécution de l'instruction 5.3 en : " . $difference_ms . " secondes.\n";
$timestamp_debut = microtime(true);
$req5_4 = \bdd\models\Game::where("name", "like", "Mario%")
    ->whereHas("game_ratings", function ($q){
        $q->where("name", "like", "%3+%");
    })
    ->get();
$timestamp_fin = microtime(true);
$difference_ms = $timestamp_fin-$timestamp_debut;
print "Exécution de l'instruction 5.4 en : " . $difference_ms . " secondes.\n";
$timestamp_debut = microtime(true);
$req5_5 = \bdd\models\Game::where("name", "like", "Mario%")
    ->whereHas("game_ratings", function ($q){
        $q->where("name", "like", "%3+%");
    })
    ->get();
$timestamp_fin = microtime(true);
$difference_ms = $timestamp_fin-$timestamp_debut;
print "Exécution de l'instruction 5.5 en : " . $difference_ms . " secondes.\n";
```
Index : On essaye d'améliorer les performances de certaines requêtes, en particulier celles
contenant une condition "where". Pour vérifier l'amélioration de performance, on mesure le temps
d'exécution des requêtes. Faites plusieurs requêtes similaires (même requêtes mais valeurs
différentes dans la condition where.

Etudier la requête : "lister les jeux dont le nom débute par '<valeur>' "
- mesurer son temps d'exécution avec 3 valeurs différentes
```
$timestamp_debut = microtime(true);
$res6_1 = \bdd\models\Game::where('name', 'like', 'Mario%')->get();
$timestamp_fin = microtime(true);
$difference_ms1 = $timestamp_fin - $timestamp_debut;
print "Exécution de l'instruction 6.1 en : " . $difference_ms1 . " secondes.\n";
$timestamp_debut = microtime(true);
$res6_2 = \bdd\models\Game::where('name', 'like', 'Desert%')->get();
$timestamp_fin = microtime(true);
$difference_ms2 = $timestamp_fin - $timestamp_debut;
print "Exécution de l'instruction 6.2 en : " . $difference_ms2 . " secondes.\n";
$timestamp_debut = microtime(true);
$res6_3 = \bdd\models\Game::where('name', 'like', 'The%')->get();
$timestamp_fin = microtime(true);
$difference_ms3 = $timestamp_fin - $timestamp_debut;
print "Exécution de l'instruction 6.3 en : " . $difference_ms3 . " secondes.\n";
$moySI = ($difference_ms1+$difference_ms2+$difference_ms3)/3;
print "Exécution en $moySI en moyenne";
```
- créer un index sur la colonne 'name' de la table 'game'
```
DB::connection()->table('game', function ($table){
    $table->index('name');
});
```
- mesurer à nouveau le temps d'exécution avec 3 nouvelles valeurs
```
$timestamp_debut = microtime(true);
$res7_1 = \bdd\models\Game::where('name', 'like', 'Mario%')->get();
$timestamp_fin = microtime(true);
$difference_ms1 = $timestamp_fin - $timestamp_debut;
print "Exécution de l'instruction 6.1 en : " . $difference_ms1 . " secondes.\n";
$timestamp_debut = microtime(true);
$res7_2 = \bdd\models\Game::where('name', 'like', 'Desert%')->get();
$timestamp_fin = microtime(true);
$difference_ms2 = $timestamp_fin - $timestamp_debut;
print "Exécution de l'instruction 6.2 en : " . $difference_ms2 . " secondes.\n";
$timestamp_debut = microtime(true);
$res7_3 = \bdd\models\Game::where('name', 'like', 'The%')->get();
$timestamp_fin = microtime(true);
$difference_ms3 = $timestamp_fin - $timestamp_debut;
print "Exécution de l'instruction 6.3 en : " . $difference_ms3 . " secondes.\n";
$moyAI = ($difference_ms1+$difference_ms2+$difference_ms3)/3;
$difmoy = $moySI-$moyAI;
$diff = ($difmoy*100)/$moyAI;
print "Gain de $diff%";
```
Etudier de la même manière la requête : lister les jeux dont le nom contient '<valeur>'. Pouvezvous
expliquer le résultat ?
```
$timestamp_debut = microtime(true);
$res8_1 = \bdd\models\Game::where('name', 'like', '%Mario%')->get();
$timestamp_fin = microtime(true);
$difference_ms1 = $timestamp_fin - $timestamp_debut;
print "Exécution de l'instruction 8.1 en : " . $difference_ms1 . " secondes.\n";
$timestamp_debut = microtime(true);
$res8_2 = \bdd\models\Game::where('name', 'like', '%Desert%')->get();
$timestamp_fin = microtime(true);
$difference_ms2 = $timestamp_fin - $timestamp_debut;
print "Exécution de l'instruction 8.2 en : " . $difference_ms2 . " secondes.\n";
$timestamp_debut = microtime(true);
$res8_3 = \bdd\models\Game::where('name', 'like', '%The%')->get();
$timestamp_fin = microtime(true);
$difference_ms3 = $timestamp_fin - $timestamp_debut;
print "Exécution de l'instruction 8.3 en : " . $difference_ms3 . " secondes.\n";
$moySI = ($difference_ms1+$difference_ms2+$difference_ms3)/3;
print "Exécution en $moySI en moyenne\n";

DB::connection()->table('game', function ($table){
    $table->index('name');
});

$timestamp_debut = microtime(true);
$res8_1 = \bdd\models\Game::where('name', 'like', 'Mario%')->get();
$timestamp_fin = microtime(true);
$difference_ms1 = $timestamp_fin - $timestamp_debut;
print "Exécution de l'instruction 8.1 en : " . $difference_ms1 . " secondes.\n";
$timestamp_debut = microtime(true);
$res8_2 = \bdd\models\Game::where('name', 'like', 'Desert%')->get();
$timestamp_fin = microtime(true);
$difference_ms2 = $timestamp_fin - $timestamp_debut;
print "Exécution de l'instruction 8.2 en : " . $difference_ms2 . " secondes.\n";
$timestamp_debut = microtime(true);
$res8_3 = \bdd\models\Game::where('name', 'like', 'The%')->get();
$timestamp_fin = microtime(true);
$difference_ms3 = $timestamp_fin - $timestamp_debut;
print "Exécution de l'instruction 8.3 en : " . $difference_ms3 . " secondes.\n";
$moyAI = ($difference_ms1+$difference_ms2+$difference_ms3)/3;
$difmoy = $moySI-$moyAI;
print "Exécution en $moyAI en moyenne\n";
$diff = ($difmoy*100)/$moyAI;
print "Gain de $diff%\n";

DB::connection()->table('game', function ($table){
    $table->dropIndex('name');
});



Il est normal qu'il n'y ai pas de différence car on n'utilise pas l'indexage
```
Etudiez sur le même principe la requête "Liste des compagnies d'un pays(location_country)" :
évaluez le gain de performance amené par un index. Que pensez-vous du résultat ?
```

```

#Partie 2 : observer l'orm, améiorer les performances avec des chargements liés
Ressources :
• documentation Laravel, partie "Database / Basic usage"
• documentation Eloquent, partie "eager loading"
Activer dans Eloquent le mécanisme de log de requêtes, c'est à dire le mécanisme qui permet de
garder la trace des requêtes SQL effectivement exécutées.
Programmez une fonction d'affichage du log de requêtes de façon à ce qu'il soit lisible.
Utiliser ce mécanisme pour analyser les requêtes SQL effectivement exécutées dans les cas suivants
– préciser notamment le nombre de requête SQL exécutées :
1. lister les jeux dont le nom contient 'Mario'
2. afficher le nom des personnages du jeu 12342
3. afficher les noms des persos apparus pour la 1ère fois dans 1 jeu dont le nom contient
Mario
4. afficher le nom des personnages des jeux dont le nom (du jeu) contient 'Mario'
5. les jeux développés par une compagnie dont le nom contient 'Sony'
Chargements liés :
Reprogrammez la requête "afficher le nom des personnages des jeux dont le nom (de jeu) contient
'Mario'" en utilisant un chargement lié.
Afficher le log de requêtes : combien de requêtes sont exécutées ? quelle est la technique SQL
utilisée ?
Faites la même comparaison avec la requête : jeux développés par une compagnie dont le nom
contient 'Sony'