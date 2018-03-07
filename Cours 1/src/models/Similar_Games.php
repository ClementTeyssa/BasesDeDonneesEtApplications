<?php
/**
 * Created by PhpStorm.
 * User: Clement
 * Date: 07/03/2018
 * Time: 15:48
 */

namespace bdd\models;


class Similar_Games extends \Illuminate\Database\Eloquent\Model
{

    protected $table = 'similar_games';
    protected $primaryKey = 'id';
    public $timestamps = false;
}