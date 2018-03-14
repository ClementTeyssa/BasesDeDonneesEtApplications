# Modèles
Compléter les modèles Eloquent pour représenter les associations nécessaire à l'écriture des requêtes suivantes, puis écrire les requêtes suivantes avec eloquent :

# Requètes
- afficher (name , deck) les personnages du jeu 12342
```
$req1 = \bdd\models\Game::where("id","=","12342")->first();
$characters = $req1->characters;
foreach($characters as $char) {
    print($char->name . " " . $char->deck . "\n");
}
```
- les personnages des jeux dont le nom (du jeu) débute par 'Mario'
```
$res2 = \bdd\models\Game::where('name', 'like', '%Mario%')->get();
foreach($res2 as $re){
    $pers = $re->characters;
    print "---------".$re->name."---------\n";
    foreach ($pers as $per){
        print $per->id." ".$per->name."\n";
    }
}
```
- les jeux développés par une compagnie dont le nom contient 'Sony'
```
$req3 = \bdd\models\Company::where("name","like","%Sony%")->get();
foreach ($req3 as $re){
    $games = $re->developers;
    print "---------".$re->name."---------\n";
    foreach ($games as $game){
        print $game->name."\n";
    }
}
```
- le rating initial (indiquer le rating board) des jeux dont le nom contient Mario
```

```
- les jeux dont le nom débute par Mario et ayant plus de 3 personnages
```
$req5 = \bdd\models\Game::where("name","like","Mario%")->get();
foreach($req5 as $res){
    $characters = $res->characters;
    if(sizeOf($characters)>=3){
        print($res->name."\n");
    }
}
```
- les jeux dont le nom débute par Mario et dont le rating initial contient "3+"
```

```
- les jeux dont le nom débute par Mario, publiés par une compagnie dont le nom contient "Inc." et dont le rating initial contient "3+"
```

```
- les jeux dont le nom débute Mario, publiés par une compagnie dont le nom contient "Inc",dont le rating initial contient "3+" et ayant reçu un avis de la part du rating board nommé"CERO"
```

```
- ajouter un nouveau genre de jeu, et l'associer aux jeux 12, 56, 12, 345
```

```