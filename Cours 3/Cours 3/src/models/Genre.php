<?php
/**
 * Created by PhpStorm.
 * User: Clement
 * Date: 07/03/2018
 * Time: 15:47
 */

namespace bdd\models;

use bdd\models\Games;

class Genre extends \Illuminate\Database\Eloquent\Model
{

    protected $table = 'genre';
    protected $primaryKey = 'id';
    public $timestamps = false;
    
    public function games(){
    	return 
    	$this->belongsToMany('game',
    			'game2genre',
    			'genre_id',
    			'game_id');
    }
}