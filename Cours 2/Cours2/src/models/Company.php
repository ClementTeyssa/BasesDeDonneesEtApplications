<?php
/**
 * Created by PhpStorm.
 * User: Clement
 * Date: 07/03/2018
 * Time: 15:44
 */

namespace bdd\models;


class Company extends \Illuminate\Database\Eloquent\Model
{

    protected $table = 'company';
    protected $primaryKey = 'id';
    public $timestamps = false;
    
    public function developers(){
    	return 
    	$this->belongsToMany('bdd\models\Game'
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
}