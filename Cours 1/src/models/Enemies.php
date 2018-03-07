<?php
/**
 * Created by PhpStorm.
 * User: Clement
 * Date: 07/03/2018
 * Time: 15:44
 */

namespace bdd\models;


class Enemies extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'enemies';
    protected $primaryKey = 'id';
    public $timestamps = false;

}