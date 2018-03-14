<?php
/**
 * Created by PhpStorm.
 * User: Clement
 * Date: 13/03/2018
 * Time: 18:16
 */

namespace bdd\models;
use bdd\models\Annonce as Annonce;


class Categorie extends \Illuminate\Database\Eloquent\Model
{

    protected $table = 'character';
    protected $primaryKey = 'idCateg';
    public $timestamps = false;

    public function annonces() {
        return
            $this->belongsToMany('Annonce',
                'Type',
                'idCateg',
                'idAnnonce');
    }
}