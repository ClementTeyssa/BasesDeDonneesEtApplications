<?php
/**
 * Created by PhpStorm.
 * User: Clement
 * Date: 16/03/2018
 * Time: 08:37
 */

require_once "vendor/autoload.php";
use Illuminate\Database\Capsule\Manager as DB;
\bdd\conf\ConnexionBase::initialisation('src/conf/conf.ini');

/*
print "==================================================================================\n";
$timestamp_debut = microtime(true);
$res1 = \bdd\models\Game::get();
foreach ($res1 as $re){
    $tmp = $re->name."\n";
}
$timestamp_fin = microtime(true);
$difference_ms = $timestamp_fin - $timestamp_debut;
print "Exécution de l'instruction 1 en : " . $difference_ms . " secondes.\n";
print "==================================================================================\n";
$timestamp_debut = microtime(true);
$res2 = \bdd\models\Game::where("name", "like", "%Mario%");
foreach ($res1 as $re){
    $tmp = $re->name."\n";
}
$timestamp_fin = microtime(true);
$difference_ms = $timestamp_fin - $timestamp_debut;
print "Exécution de l'instruction 2 en : " . $difference_ms . " secondes.\n";
print "==================================================================================\n";
$timestamp_debut = microtime(true);
$res3 = \bdd\models\Game::where('name', 'like', 'Mario%')->get();
foreach($res3 as $re){
	$pers = $re->characters;
	foreach ($pers as $per){
	    $tmp = $re->name;
    }
}
$timestamp_fin = microtime(true);
$difference_ms = $timestamp_fin - $timestamp_debut;
print "Exécution de l'instruction 3 en : " . $difference_ms . " secondes.\n";
print "==================================================================================\n";
$timestamp_debut = microtime(true);
$req4 = \bdd\models\Game::where("name", "like", "Mario%")
    ->whereHas("game_ratings", function ($q){
        $q->where("name", "like", "%3+%");
    })
    ->get();
$timestamp_fin = microtime(true);
$difference_ms = $timestamp_fin-$timestamp_debut;
print "Exécution de l'instruction 4 en : " . $difference_ms . " secondes.\n";
print "==================================================================================\n";
$timestamp_debut = microtime(true);
$req5_1 = \bdd\models\Game::where("name", "like", "Mario%")
    ->whereHas("game_ratings", function ($q){
        $q->where("name", "like", "%3+%");
    })
    ->get();
$timestamp_fin = microtime(true);
$difference_ms = $timestamp_fin-$timestamp_debut;
print "Exécution de l'instruction 5.1 en : " . $difference_ms . " secondes.\n";
$timestamp_debut = microtime(true);
$req5_2 = \bdd\models\Game::where("name", "like", "Mario%")
    ->whereHas("game_ratings", function ($q){
        $q->where("name", "like", "%3+%");
    })
    ->get();
$timestamp_fin = microtime(true);
$difference_ms = $timestamp_fin-$timestamp_debut;
print "Exécution de l'instruction 5.2 en : " . $difference_ms . " secondes.\n";
$timestamp_debut = microtime(true);
$req5_3 = \bdd\models\Game::where("name", "like", "Mario%")
    ->whereHas("game_ratings", function ($q){
        $q->where("name", "like", "%3+%");
    })
    ->get();
$timestamp_fin = microtime(true);
$difference_ms = $timestamp_fin-$timestamp_debut;
print "Exécution de l'instruction 5.3 en : " . $difference_ms . " secondes.\n";
$timestamp_debut = microtime(true);
$req5_4 = \bdd\models\Game::where("name", "like", "Mario%")
    ->whereHas("game_ratings", function ($q){
        $q->where("name", "like", "%3+%");
    })
    ->get();
$timestamp_fin = microtime(true);
$difference_ms = $timestamp_fin-$timestamp_debut;
print "Exécution de l'instruction 5.4 en : " . $difference_ms . " secondes.\n";
$timestamp_debut = microtime(true);
$req5_5 = \bdd\models\Game::where("name", "like", "Mario%")
    ->whereHas("game_ratings", function ($q){
        $q->where("name", "like", "%3+%");
    })
    ->get();
$timestamp_fin = microtime(true);
$difference_ms = $timestamp_fin-$timestamp_debut;
print "Exécution de l'instruction 5.5 en : " . $difference_ms . " secondes.\n";
print "==================================================================================\n";
$timestamp_debut = microtime(true);
$res6_1 = \bdd\models\Game::where('name', 'like', 'Mario%')->get();
$timestamp_fin = microtime(true);
$difference_ms1 = $timestamp_fin - $timestamp_debut;
print "Exécution de l'instruction 6.1 en : " . $difference_ms1 . " secondes.\n";
$timestamp_debut = microtime(true);
$res6_2 = \bdd\models\Game::where('name', 'like', 'Desert%')->get();
$timestamp_fin = microtime(true);
$difference_ms2 = $timestamp_fin - $timestamp_debut;
print "Exécution de l'instruction 6.2 en : " . $difference_ms2 . " secondes.\n";
$timestamp_debut = microtime(true);
$res6_3 = \bdd\models\Game::where('name', 'like', 'The%')->get();
$timestamp_fin = microtime(true);
$difference_ms3 = $timestamp_fin - $timestamp_debut;
print "Exécution de l'instruction 6.3 en : " . $difference_ms3 . " secondes.\n";
$moySI = ($difference_ms1+$difference_ms2+$difference_ms3)/3;
print "Exécution en $moySI en moyenne\n";
print "==================================================================================\n";
DB::connection()->table('game', function ($table){
    $table->index('name');
});
print "==================================================================================\n";
$timestamp_debut = microtime(true);
$res7_1 = \bdd\models\Game::where('name', 'like', 'Mario%')->get();
$timestamp_fin = microtime(true);
$difference_ms1 = $timestamp_fin - $timestamp_debut;
print "Exécution de l'instruction 7.1 en : " . $difference_ms1 . " secondes.\n";
$timestamp_debut = microtime(true);
$res7_2 = \bdd\models\Game::where('name', 'like', 'Desert%')->get();
$timestamp_fin = microtime(true);
$difference_ms2 = $timestamp_fin - $timestamp_debut;
print "Exécution de l'instruction 7.2 en : " . $difference_ms2 . " secondes.\n";
$timestamp_debut = microtime(true);
$res7_3 = \bdd\models\Game::where('name', 'like', 'The%')->get();
$timestamp_fin = microtime(true);
$difference_ms3 = $timestamp_fin - $timestamp_debut;
print "Exécution de l'instruction 7.3 en : " . $difference_ms3 . " secondes.\n";
$moyAI = ($difference_ms1+$difference_ms2+$difference_ms3)/3;
$difmoy = $moySI-$moyAI;
print "Exécution en $moyAI en moyenne\n";
$diff = ($difmoy*100)/$moyAI;
print "Gain de $diff%\n";

DB::connection()->table('game', function ($table){
    $table->dropIndex('name');
});

print "==================================================================================\n";
$timestamp_debut = microtime(true);
$res8_1 = \bdd\models\Game::where('name', 'like', '%Mario%')->get();
$timestamp_fin = microtime(true);
$difference_ms1 = $timestamp_fin - $timestamp_debut;
print "Exécution de l'instruction 8.1 en : " . $difference_ms1 . " secondes.\n";
$timestamp_debut = microtime(true);
$res8_2 = \bdd\models\Game::where('name', 'like', '%Desert%')->get();
$timestamp_fin = microtime(true);
$difference_ms2 = $timestamp_fin - $timestamp_debut;
print "Exécution de l'instruction 8.2 en : " . $difference_ms2 . " secondes.\n";
$timestamp_debut = microtime(true);
$res8_3 = \bdd\models\Game::where('name', 'like', '%The%')->get();
$timestamp_fin = microtime(true);
$difference_ms3 = $timestamp_fin - $timestamp_debut;
print "Exécution de l'instruction 8.3 en : " . $difference_ms3 . " secondes.\n";
$moySI = ($difference_ms1+$difference_ms2+$difference_ms3)/3;
print "Exécution en $moySI en moyenne\n";

DB::connection()->table('game', function ($table){
    $table->index('name');
});

$timestamp_debut = microtime(true);
$res8_1 = \bdd\models\Game::where('name', 'like', 'Mario%')->get();
$timestamp_fin = microtime(true);
$difference_ms1 = $timestamp_fin - $timestamp_debut;
print "Exécution de l'instruction 8.1 en : " . $difference_ms1 . " secondes.\n";
$timestamp_debut = microtime(true);
$res8_2 = \bdd\models\Game::where('name', 'like', 'Desert%')->get();
$timestamp_fin = microtime(true);
$difference_ms2 = $timestamp_fin - $timestamp_debut;
print "Exécution de l'instruction 8.2 en : " . $difference_ms2 . " secondes.\n";
$timestamp_debut = microtime(true);
$res8_3 = \bdd\models\Game::where('name', 'like', 'The%')->get();
$timestamp_fin = microtime(true);
$difference_ms3 = $timestamp_fin - $timestamp_debut;
print "Exécution de l'instruction 8.3 en : " . $difference_ms3 . " secondes.\n";
$moyAI = ($difference_ms1+$difference_ms2+$difference_ms3)/3;
$difmoy = $moySI-$moyAI;
print "Exécution en $moyAI en moyenne\n";
$diff = ($difmoy*100)/$moyAI;
print "Gain de $diff%\n"; */

DB::connection()->table('game', function ($table){
    $table->dropIndex('name');
});

$timestamp_debut = microtime(true);
$res9_1 = \bdd\models\Company::where('location_country', 'like', '%USA%')->get();
$timestamp_fin = microtime(true);
$difference_ms1 = $timestamp_fin - $timestamp_debut;
print "Exécution de l'instruction 9.1 en : " . $difference_ms1 . " secondes.\n";

$timestamp_debut = microtime(true);
$res9_2 = \bdd\models\Company::where('location_country', 'like', '%UK%')->get();
$timestamp_fin = microtime(true);
$difference_ms2 = $timestamp_fin - $timestamp_debut;
print "Exécution de l'instruction 9.2 en : " . $difference_ms2 . " secondes.\n";

$timestamp_debut = microtime(true);
$res9_3 = \bdd\models\Company::where('location_country', 'like', '%USA%')->get();
$timestamp_fin = microtime(true);
$difference_ms3 = $timestamp_fin - $timestamp_debut;
print "Exécution de l'instruction 9.3 en : " . $difference_ms3 . " secondes.\n";

DB::connection()->table('company', function ($table){
	$table->index('location_country');
});

$timestamp_debut = microtime(true);
$res9_1 = \bdd\models\Company::where('location_country', 'like', '%USA%')->get();
$timestamp_fin = microtime(true);
$difference_ms1 = $timestamp_fin - $timestamp_debut;
print "Exécution de l'instruction 9.1 en : " . $difference_ms1 . " secondes.\n";

$timestamp_debut = microtime(true);
$res9_2 = \bdd\models\Company::where('location_country', 'like', '%UK%')->get();
$timestamp_fin = microtime(true);
$difference_ms2 = $timestamp_fin - $timestamp_debut;
print "Exécution de l'instruction 9.2 en : " . $difference_ms2 . " secondes.\n";

$timestamp_debut = microtime(true);
$res9_3 = \bdd\models\Company::where('location_country', 'like', '%USA%')->get();
$timestamp_fin = microtime(true);
$difference_ms3 = $timestamp_fin - $timestamp_debut;
print "Exécution de l'instruction 9.3 en : " . $difference_ms3 . " secondes.\n";

DB::connection()->table('location_country', function ($table){
	$table->dropIndex('location_country');
});
	
DB::connection()->enableQueryLog();
    
    function printEndQuery(){
        echo "</br>Derniere requete :";
        $queries = DB::getQueryLog();
        foreach ($queries as $q){
            echo "$q";
        }
        $last_query = end($queries);
        print($last_query);
    }

print "==================================================================================\n";
$res1 = \bdd\models\Game::where("name", "like", "%Mario%")->get();
printEndQuery();
print "==================================================================================\n";
$res2 = \bdd\models\Game::where("id","=","12342")
	->characters()->get();
foreach ($res2 as $r2){
	print $r2->name."<br>";
}
printEndQuery();
print "==================================================================================\n";
$res3 = \bdd\models\Game::firstAppared()->where("name", "like", "%Mario%")->get();
printEndQuery();
print "==================================================================================\n";
$res4 = \bdd\models\Game::where("name", "like", "%Mario%")->characters()->get();
printEndQuery();
print "==================================================================================\n";
$res5 = \bdd\models\Game::whereHas("game_developpers", function($q){
	$q->where("name","like","%Sony%");
})->get();
printEndQuery();
print "==================================================================================\n";

$persos = \bdd\models\Games::with('characters')->where("name","like","%Mario%")->get();
foreach ($persos as $p){
	echo $p->name;
}
$queries = DB::getQueryLog();
echo $queries;

$comps = \bdd\models\Company::with('developers')->where("name","like","%Sony%")->get();
foreach ($comps as $c){
	echo $c->name;
}
$queries = DB::getQueryLog();
echo $queries;