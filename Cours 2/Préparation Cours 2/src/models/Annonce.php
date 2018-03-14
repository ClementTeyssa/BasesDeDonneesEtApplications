<?php
/**
 * Created by PhpStorm.
 * User: Clement
 * Date: 13/03/2018
 * Time: 18:20
 */

namespace bdd\models;
use bdd\models\Catégorie as Categorie;
use bdd\models\Photo as Photo;


class Annonce extends \Illuminate\Database\Eloquent\Model
{

    protected $table = 'character';
    protected $primaryKey = 'idAnnonce';
    public $timestamps = false;

    public function categories() {
        return
            $this->belongsToMany('Categorie',
                'Type',
                'idAnnonce',
                'idCateg');
    }

    public function photos(){
        return $this->hasMany('Photo', 'idAnnonce');
    }


}