<?php
/**
 * Created by PhpStorm.
 * User: Clement
 * Date: 07/03/2018
 * Time: 15:47
 */

namespace bdd\models;


class Platform extends \Illuminate\Database\Eloquent\Model
{

    protected $table = 'platform';
    protected $primaryKey = 'id';
    public $timestamps = false;

    function games(){
    	$this->belongsToMany('game',
    	'game2platform',
    	'platform_id',
    	'game_id');
    }
}