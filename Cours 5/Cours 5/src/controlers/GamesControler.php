<?php
/**
 * Created by PhpStorm.
 * User: Clement
 * Date: 03/04/2018
 * Time: 17:27
 */

namespace bdd\controlers;


use bdd\models\Comment;
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
        $linkCom = $app->urlFor('gamesCo', ['no'=>$id]);
        echo json_encode(["game"=>$q, "links"=>["comments"=>$linkCom]]);
    }

    public function getGames(){
        $app = \Slim\Slim::getInstance();
        $app->response->headers->set('Content-Type', 'application/json');
        try{
            $tab = [];
            $requete = $app->request();
            $r = $requete->get("page");
            if(isset($r)){
                $i = $r;
            } else {
                $i = 1;
            }
            if($i<1)
                $i = 1;
            $res = Game::select('id', 'name', 'alias', 'deck')
                ->where([["id",">",($i-1)*200],["id","<=", $i*200]])
                ->get();
            foreach ($res as $re){
                $link = $app->urlFor("gamesNo",["no"=>$re->id]);
                array_push($tab, ["game"=>$re, "links"=>["self"=>$link]]);
            }
        } catch (ModelNotFoundException $e){
            $app->response->setStatus(404);
            echo json_encode(["msg"=>"games not found"]);
            return null;
        }
        $no1 = $i+1;
        $no2 = $i-1;
        if($no2 <= 0)
            $no2 = 1;
        $res = json_encode([["games"=>$tab], ["links"=>["prev"=>"/api/games?page=$no1", "next"=>"/api/games?page=$no2"]]]);


        echo $res;
    }

    public function getGameCom($no){
        $app = \Slim\Slim::getInstance();
        $app->response->headers->set('Content-Type', 'application/json');
        try{
            $req = Comment::where("idGame", "=", $no)
                ->select('id', 'title', 'content', 'email', 'created_at')
                ->get();

        }catch (ModelNotFoundException $e){

            $app->response->setStatus(404);
            echo json_encode(["msg"=>"game $no not found"]);
            return null;
        }
        $q = ["comments"=>$req];
        echo json_encode($q);
    }
}