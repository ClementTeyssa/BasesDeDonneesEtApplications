<?php
/**
 * Created by PhpStorm.
 * User: Clement
 * Date: 07/03/2018
 * Time: 15:45
 */

namespace bdd\models;


class Game2Genre extends \Illuminate\Database\Eloquent\Model
{

    protected $table = 'game2genre';
    protected $primaryKey = 'id';
    public $timestamps = false;
}