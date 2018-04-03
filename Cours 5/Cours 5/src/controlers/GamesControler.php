<?php
/**
 * Created by PhpStorm.
 * User: Clement
 * Date: 03/04/2018
 * Time: 17:27
 */

namespace bdd\controlers;


use bdd\models\Game;

class GamesControler
{
    public function getGame($id){

        $app = \Slim\Slim::getInstance();
        $app->response->headers->set('Content-Type', 'application/json');

        try{

            $q = Game::select('id', 'name', 'alias', 'deck', 'description', 'original_release_date')
                ->where("id",'=',$id)
                ->firstOrFail();

        }catch (ModelNotFoundException $e){

            $app->response->setStatus(404);
            echo json_encode(["msg"=>"game $id not found"]);
            return null;
        }
        echo json_encode($q->toArray());
    }
}