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
use bdd\models\character;
use bdd\models\Platform;
use bdd\models\Genre;
use bdd\models\Company;

class Game extends \Illuminate\Database\Eloquent\Model
{

    protected $table = 'game';
    protected $primaryKey = 'id';
    public $timestamps = false;


    public function game_ratings(){
    	$this->belongsToMany('Game_Rating', 
    		'game2rating', 
    		'game_id', 
    		'rating_id');
    }

    public function themes(){
    	$this->belongsToMany('Theme', 
    		'theme2rating', 
    		'game_id', 
    		'theme_id');
    }

    public function characters(){
    	$this->belongsToMany('character',
    		'game2character',
    		'game_id',
    		'character_id');
    }

    public function platforms(){
    	$this->belongsToMany('platform',
    		'game2platform',
    		'game_id',
    		'platform_id');
    }

    public function genres(){
    	$this->belongsToMany('genre',
    		'game2genre',
    		'game_id',
    		'genre_id');
    }

    public function developers(){
    	$this->belongsToMany('company',
    		'game_developers',
    		'game_id',
    		'comp_id');
    }

    public function publishers(){
		$this->belongsToMany('company',
    		'game_publishers',
    		'game_id',
    		'comp_id');
    }

	public function similar(){
		$this->belongsToMany('game',
			'similar_games',
			'game1_id',
			'game2_id');
	}

}