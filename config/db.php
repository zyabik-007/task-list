<?php
$capsule = new Illuminate\Database\Capsule\Manager;
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
?>