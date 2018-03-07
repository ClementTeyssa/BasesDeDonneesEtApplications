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
    public $timestamps = false;


}