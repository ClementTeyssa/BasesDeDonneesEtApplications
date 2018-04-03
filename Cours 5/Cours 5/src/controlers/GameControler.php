<?php
/**
 * Created by PhpStorm.
 * User: Clement
 * Date: 28/03/2018
 * Time: 15:01
 */
namespace bdd\controlers;
use bdd\models\Game;

require_once "vendor/autoload.php";

\bdd\conf\ConnexionBase::initialisation('src/conf/conf.ini');

class GamesController {
	public function getGame($id){
		
		$app = \Slim\Slim::getInstance();
		$app->response->headers->set('Content-Type', 'application/json');
		
		try{
			
			$q = Game::select('id', 'name', 'alias', 'deck', 'description', 'original')
			->where("id",'=',$id)
			->firstOrFail();
			
		}catch (ModelNotFoundException $e){
			
			$app->response->setStatus(404);
			echo json_encode(["msg"=>"game $id not found"]);
			return null;
		}
		echo json_encode($g->toArray());
	}
}