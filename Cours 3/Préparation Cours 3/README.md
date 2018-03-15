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

```