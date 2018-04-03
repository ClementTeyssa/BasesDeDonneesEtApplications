<?php
/**
 * Created by PhpStorm.
 * User: Clement
 * Date: 07/03/2018
 * Time: 15:45
 */

namespace bdd\models;
use bdd\models\Theme;
use bdd\models\Game_Rating;
use bdd\models\Character;
use bdd\models\Platform;
use bdd\models\Genre;
use bdd\models\Company;

class Game extends \Illuminate\Database\Eloquent\Model
{

    protected $table = 'game';
    protected $primaryKey = 'id';
    public $timestamps = true;


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

}