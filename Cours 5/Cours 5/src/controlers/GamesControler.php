<?php
/**
 * Created by PhpStorm.
 * User: Clement
 * Date: 03/04/2018
 * Time: 17:27
 */

namespace bdd\controlers;


use bdd\models\Game;
use bdd\models\Genre;

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


    public function getGames(){
        $app = \Slim\Slim::getInstance();
        $app->response->headers->set('Content-Type', 'application/json');
        try{
            $qs = Game::select('id', 'name', 'alias', 'deck')->get();
        } catch (ModelNotFoundException $e){
            $app->response->setStatus(404);
            echo json_encode(["msg"=>"games not found"]);
            return null;
        }
        /*
        foreach ($qs as $q){
            $q->links = "href = ";
        }
        */

        echo "{\"games\",:".json_encode($qs)."}";
    }

    public function getGamePage($no){
        $app = \Slim\Slim::getInstance();
        $app->response->headers->set('Content-Type', 'application/json');
        try{
            $res = Game::select('id', 'name', 'alias', 'deck')
                ->where([["id",">",($no-1)*2],["id","<=", $no*2]])
                ->get();
        } catch (ModelNotFoundException $e){
            $app->response->setStatus(404);
            echo json_encode(["msg"=>"games not found"]);
            return null;
        }
        $res = json_encode($res);
        $no1 = $no+1;
        $no2 = $no-1;
        if($no2 <= 0)
            $no2 = 1;

        echo <<<end
        {"games",: $res,
        "links" : {
            "prev" : { "href" : "/api/games?page=$no1" },
            "next" : { "href" : "/api/games?page=$no2" }
        }}
end;
    }

}