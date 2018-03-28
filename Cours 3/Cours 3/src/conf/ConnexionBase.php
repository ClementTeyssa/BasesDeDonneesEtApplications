<?php
/**
 * Created by PhpStorm.
 * User: Clément Teyssandier
 * Date: 12/12/2017
 * Time: 12:18
 */
namespace bdd\conf;

require __DIR__ . '..\\..\\..\\vendor\\autoload.php';

use Illuminate\Database\Capsule\Manager as DB;

class ConnexionBase
{
    
    
    public static function initialisation($file){
        $db = new DB();
        $t=parse_ini_file( 'src/conf/conf.ini' );
        $db->addConnection( [
            'driver' => $t['driver'],
            'host' =>  $t['host'],
            'database' =>  $t['database'],
            'username' =>  $t['username'],
            'password' =>  $t['password'],
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => ''
        ] );
        $db->setAsGlobal();
        $db->bootEloquent();
    }
}