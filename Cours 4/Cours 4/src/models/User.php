<?php
/**
 * Created by PhpStorm.
 * User: Clement
 * Date: 28/03/2018
 * Time: 14:39
 */

namespace bdd\models;


class User extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'user';
    protected $primaryKey = 'email';
    public $timestamps = false;
    public $incrementing =false;
    public $keyType ='string';



    public function comments(){
        return $this->hasMany('\bdd\models\Comment', 'email');
    }

}