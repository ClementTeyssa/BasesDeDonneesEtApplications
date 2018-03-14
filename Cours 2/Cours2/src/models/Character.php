<?php
/**
 * Created by PhpStorm.
 * User: Clement
 * Date: 07/03/2018
 * Time: 15:44
 */

namespace bdd\models;


class Character extends \Illuminate\Database\Eloquent\Model
{

    protected $table = 'character';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function firstAppared(){
    	return
    		$this->belongsTo('game','first_appared_in_game_id');
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
}