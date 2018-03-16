# Partie 1 : mesurer les performances et utiliser des index
Ressources :
http://php.net/manual/fr/function.microtime.php
https://openclassrooms.com/courses/administrez-vos-bases-de-donnees-avec-mysql/index-1

Compléter vos scripts contenant des requêtes pour mesurer le temps d'exécution des requêtes faites
avec Eloquent. Mesurez uniquement le temps d'exécution, sans prendre en compte l'affichage.
Mesurer en particulier les requêtes :
```

```
- lister l'ensemble des jeux,
```

```
- lister les jeux dont le nom contient 'Mario'
```

```
- afficher les personnages des jeux dont le nom débute par 'Mario'
```

```
- les jeux dont le nom débute par 'Mario' et dont le rating initial contient '3+'
```

```

Cache de requêtes mysql : comparer le temps d'exécution d'une requête coûteuse entre la 1ère
exécution et les exécutions suivantes.
Index : On essaye d'améliorer les performances de certaines requêtes, en particulier celles
contenant une condition "where". Pour vérifier l'amélioration de performance, on mesure le temps
d'exécution des requêtes. Faites plusieurs requêtes similaires (même requêtes mais valeurs
différentes dans la condition where.

Etudier la requête : "lister les jeux dont le nom débute par '<valeur>' "
- mesurer son temps d'exécution avec 3 valeurs différentes
```

```
- créer un index sur la colonne 'name' de la table 'game'
```

```
- mesurer à nouveau le temps d'exécution avec 3 nouvelles valeurs
```

```
Etudier de la même manière la requête : lister les jeux dont le nom contient '<valeur>'. Pouvezvous
expliquer le résultat ?
```

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