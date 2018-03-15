<?php
/**
 * Created by PhpStorm.
 * User: Clement
 * Date: 07/03/2018
 * Time: 15:47
 */

namespace bdd\models;


class Game_Rating extends \Illuminate\Database\Eloquent\Model
{

    protected $table = 'game_rating';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function games(){
        return $this->belongsToMany('bdd\models\Game',
            'game2rating',
            'rating_id',
            'game_id');
    }

    public function rating_board(){
        return $this->belongsTo('Rating_Board', 'rating_board_id');
    }
}