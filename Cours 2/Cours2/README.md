# Modèles
Compléter les modèles Eloquent pour représenter les associations nécessaire à l'écriture des requêtes suivantes, puis écrire les requêtes suivantes avec eloquent :
- Character
```php
    public function firstAppared(){
    	return
    		$this->belongsTo('bdd\models\Game','first_appared_in_game_id');
    }

    public function games(){
    	return
    	$this->belongsToMany('bdd\models\Game',
    			'game2character',
    			'game_id',
    			'character_id');
    }
    
    public function friends(){
    	return
    	$this->belongsToMany('bdd\models\Character',
    			'friends',
    			'char1_id',
    			'char2_id');
    }
    
    public function enemies(){
    	return
    	$this->belongsToMany('bdd\models\Character',
    			'enemies',
    			'char1_id',
    			'char2_id');
    }
```
- Company
```php
    public function developers(){
    	return 
    	$this->belongsToMany('bdd\models\Game',
    			'game_developers',
    			'comp_id',
    			'game_id');
    }
    
    public function publishers(){
    	return $this->belongsToMany('bdd\models\Game',
    			'game_publishers',
    			'game_id',
    			'comp_id');
    }
```
- Game
```php
         public function game_ratings(){
            return $this->belongsToMany('bdd\models\Game_Rating',
        		'game2rating', 
        		'game_id', 
        		'rating_id');
        }
    
        public function themes(){
            return $this->belongsToMany('bdd\models\Theme',
        		'theme2rating', 
        		'game_id', 
        		'theme_id');
        }
    
        public function characters(){
        	return $this->belongsToMany('bdd\models\Character',
        		'game2character',
        		'game_id',
        		'character_id');
        }
    
        public function platforms(){
            return $this->belongsToMany('bdd\models\Platform',
        		'game2platform',
        		'game_id',
        		'platform_id');
        }
    
        public function genres(){
            return $this->belongsToMany('bdd\models\Genre',
        		'game2genre',
        		'game_id',
        		'genre_id');
        }
    
        public function developers(){
            return $this->belongsToMany('bdd\models\Company',
        		'game_developers',
        		'game_id',
        		'comp_id');
        }
    
        public function publishers(){
            return $this->belongsToMany('bdd\models\Company',
        		'game_publishers',
        		'game_id',
        		'comp_id');
        }
    
    	public function similar(){
            return $this->belongsToMany('bdd\models\Game',
    			'similar_games',
    			'game1_id',
    			'game2_id');
    	}
```
- Game_Rating
```php
    public function games(){
            return $this->belongsToMany('bdd\models\Game',
                'game2rating',
                'rating_id',
                'game_id');
        }
    
        public function rating_board(){
            return $this->belongsTo('Rating_Board', 'rating_board_id');
        }
```
- Genre
```php
    public function games(){
        	return 
        	$this->belongsToMany('game',
        			'game2genre',
        			'genre_id',
        			'game_id');
        }
```
- Platform
```php
    public function gamess(){
            return $this->belongsToMany('bdd\models\Game',
                'game2platform',
                'platform_id',
                'game_id');
        }
```
- Rating_Board
```php
    public function game_ratings(){
        return $this->hasMany('Game_Rating', 'rating_board_id');
    }
```
- Theme
```php
    public function games(){
        return $this->belongsToMany('bdd\models\Game',
            'theme2rating',
            'theme_id',
            'game_id');
    }
```
# Requètes
- afficher (name , deck) les personnages du jeu 12342
```php
$req1 = \bdd\models\Game::where("id","=","12342")->first();
$characters = $req1->characters;
foreach($characters as $char) {
    print($char->name . " " . $char->deck . "\n");
}
```
- les personnages des jeux dont le nom (du jeu) débute par 'Mario'
```php
$res2 = \bdd\models\Game::where('name', 'like', 'Mario%')->get();
foreach($res2 as $re){
    $pers = $re->characters;
    print "---------".$re->name."---------\n";
    foreach ($pers as $per){
        print $per->id." ".$per->name."\n";
    }
}
```
- les jeux développés par une compagnie dont le nom contient 'Sony'
```php
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
```php
$res4 = \bdd\models\Game::where('name', 'like', "%Mario%")->get();
foreach ($res4 as $re) {
    print "---------" . $re->name . "---------\n";
    $ratings = $re->game_ratings;
    foreach ($ratings as $rating) {
        print $rating->id . " " . $rating->name . "\n";
    }
}
```
- les jeux dont le nom débute par Mario et ayant plus de 3 personnages
```php
$req5 = \bdd\models\Game::where("name","like","Mario%")->get();
foreach($req5 as $res){
    $characters = $res->characters;
    if(sizeOf($characters)>=3){
        print($res->name."\n");
    }
}
```
- les jeux dont le nom débute par Mario et dont le rating initial contient "3+"
```php
$req6 = \bdd\models\Game::where("name", "like", "Mario%")
    ->whereHas("game_ratings", function ($q){
        $q->where("name", "like", "%3+%");
    })
    ->get();
foreach ( $req6 as $re){
    print $re->id." ".$re->name."\n";
}
```
- les jeux dont le nom débute par Mario, publiés par une compagnie dont le nom contient "Inc." et dont le rating initial contient "3+"
```php
$req7 = \bdd\models\Game::where("name", "like", "Mario%")
    ->whereHas("publishers", function ($q){
        $q->where("name", "like", "%Inc%");
    })
    ->whereHas("game_ratings", function ($q){
        $q->where("name", "like", "%3+%");
    })
    ->get();
foreach ( $req7 as $re){
    print $re->id." ".$re->name."\n";
}
```
- les jeux dont le nom débute Mario, publiés par une compagnie dont le nom contient "Inc",dont le rating initial contient "3+" et ayant reçu un avis de la part du rating board nommé"CERO"
```php
$req8 = \bdd\models\Game::where("name", "like", "Mario%")
    ->whereHas("publishers", function ($q){
        $q->where("name", "like", "%Inc%");
    })
    ->whereHas("game_ratings", function ($q){
        $q->where("name", "like", "%3+%");
        $q->where("name", "like", "%CERO%");
    })
    ->get();
foreach ( $req8 as $re){
    print $re->id." ".$re->name."\n";
}
```
- ajouter un nouveau genre de jeu, et l'associer aux jeux 12, 56, 12, 345
```php
$nouvGenre = new \bdd\models\Genre();
$nouvGenre->name = 'MEUPORG';
$nouvGenre->deck = 'MMORPG mais en nul';
$nouvGenre->save();

$genre = \bdd\models\Genre::find($nouvGenre->id);
$jeu = \bdd\models\Game::find(12);
$jeu->genres()->save($genre);

$jeu = \bdd\models\Game::find(56);
$jeu->genres()->save($genre);

$jeu = \bdd\models\Game::find(345);
$jeu->genres()->save($genre);
```