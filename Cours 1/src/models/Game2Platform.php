<?php
/**
 * Created by PhpStorm.
 * User: Clement
 * Date: 07/03/2018
 * Time: 15:46
 */

namespace bdd\models;


class Game2Platform extends \Illuminate\Database\Eloquent\Model
{

    protected $table = 'game2plateform';
    protected $primaryKey = 'id';
    public $timestamps = false;
}