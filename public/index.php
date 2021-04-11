<?php
error_reporting(E_ALL ^ E_WARNING);
//ini_set('display_errors', 0);
//ini_set('display_startup_errors', 0);
require __DIR__ . '/../vendor/autoload.php';
session_start();
if (!isset($_SESSION['pex']))
    $_SESSION['pex'] = 'guest';

use Illuminate\Http\Request;
use Illuminate\Database\Capsule\Manager as Capsule;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();

$capsule = new Capsule;
$capsule->addConnection([
    'driver' => env('DBDRIVER'),
    'host' => env('DBHOST'),
    'database' => env('DBNAME'),
    'username' => env('DBUSER'),
    'password' => env('DBPASS'),
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
]);
$capsule->bootEloquent();

$request = Request::capture();

require __DIR__ . '/../config/routes.php';
try {
    $path = explode('/', $request->path());
    if (isset($path[0]) && isset($routes[$path[0]])) {
        if (in_array($_SESSION['pex'], $routes[$path[0]]['pex'])) {
            list($Controller, $function) = explode('@', $routes[$path[0]]['rout']);
            $Controller = "\App\Controllers\\" . $Controller;
            return (new $Controller())->$function(isset($path[1]) ? $path[1] : null);
        } else {
            return header('Location: ' . \App\Helper::url('login'));
        }
    }
} catch (\Throwable  $ex) {
}
return \App\Helper::view('error');
?>