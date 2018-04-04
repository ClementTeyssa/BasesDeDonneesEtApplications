<?php
/**
 * Created by PhpStorm.
 * User: Clement
 * Date: 28/03/2018
 * Time: 14:40
 */

namespace bdd\models;


class Comment extends \Illuminate\Database\Eloquent\Model
{

    protected $table = 'comment';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('\bdd\models\User','email');
    }

    public function game(){
        return $this->belongsTo('\bdd\models\Game','idGame');
    }
}