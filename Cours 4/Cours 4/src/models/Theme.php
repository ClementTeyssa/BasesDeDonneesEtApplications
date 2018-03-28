<?php
/**
 * Created by PhpStorm.
 * User: Clement
 * Date: 07/03/2018
 * Time: 15:48
 */

namespace bdd\models;


class Theme extends \Illuminate\Database\Eloquent\Model
{

    protected $table = 'theme';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function games(){
        return $this->belongsToMany('bdd\models\Game',
            'theme2rating',
            'theme_id',
            'game_id');
    }
}