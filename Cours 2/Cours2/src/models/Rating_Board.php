<?php
/**
 * Created by PhpStorm.
 * User: Clement
 * Date: 07/03/2018
 * Time: 15:48
 */

namespace bdd\models;


class Rating_Board extends \Illuminate\Database\Eloquent\Model
{

    protected $table = 'rating_board';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function game_ratings(){
        return $this->hasMany('Game_Rating', 'rating_board_id');
    }
}