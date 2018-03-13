<?php
/**
 * Created by PhpStorm.
 * User: Clement
 * Date: 13/03/2018
 * Time: 18:20
 */

namespace bdd\models;
use bdd\models\Annonce as Annonce;


class Photo extends \Illuminate\Database\Eloquent\Model
{

    protected $table = 'character';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function annonce(){
        return $this->belongsTo('Annonce', 'id');
    }
}