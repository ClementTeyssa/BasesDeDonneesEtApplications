<?php
/**
 * Created by PhpStorm.
 * User: Clement
 * Date: 07/03/2018
 * Time: 15:47
 */

namespace bdd\models;


class Game_Developers extends \Illuminate\Database\Eloquent\Model
{

    protected $table = 'game_developers';
    protected $primaryKey = 'id';
    public $timestamps = false;
}