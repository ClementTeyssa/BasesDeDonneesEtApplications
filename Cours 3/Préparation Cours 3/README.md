# Partie 1
http://php.net/manual/fr/function.microtime.php
https://openclassrooms.com/courses/administrez-vos-bases-de-donnees-avec-mysql/index-1
- écrivez le code pour mesurer le temps d'exécution d'une séquence d'instructions PHP.
```
$timestamp_debut = microtime(true);
//          instruction PHP
for($i = 0; $i < 100000000; $i++){
    $i++;
    $i--;
}
//          fin instruction PHP
$timestamp_fin = microtime(true);
$difference_ms = $timestamp_fin - $timestamp_debut;
print "Exécution de l'instruction en : ' . $difference_ms . ' secondes.\n";
```
- Rappelez le principe d'un index sur une colonne de table : intérêt, principe de fonctionnement
```
Structure de données qui reprend la liste ordonnée des valeurs auxquelles il se rapporte.
L'intérêt des index est d'accélérer les requêtes qui utilisent des colonnes indexées comme critères de recherche.
```

# partie 2
https://laravel.com/docs/5.0/database
https://laravel.com/docs/5.6/eloquent-relationships#eager-loading
- Décrivez la structure du log de requêtes dans Eloquent.
```

```
- Expliquez le problème des N+1 query
```
C'est un problème qui intervient en modèle relationnel, imaginons une table "Livre" et une table "Auteur" dans laquelle 
chaque livre associe un auteur. 

Si l'on veut afficher tous les livres et leur auteur associé, il faudra d'abord une requête pour récupérer tous les livres
puis pour chaque livre une requête pour trouver l'auteur associé, on aura donc N + 1 requêtes pour N livres 

Ce problème peut être résolu grâce au eager loading : lorsque l'on recherche tous les livres, on spécifie avec la méthode "with"
quelle relation on veut charger :

$livres = App\Livre::with('auteur')->get();

foreach ($books as $book) {
    echo $book->author->name;
}

La dernière instruction peut donc etre résolue en 2 requêtes contrairement à N + 1 précedemment :

select * from books

select * from authors where id in (1, 2, 3, 4, 5, ...)
```