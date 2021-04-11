<?php
$routes = [
    '' => [
        'rout' => 'TaskController@index',
        'pex' => ['guest', 'admin'],
        'parameters' => 0
    ],
    'page' => [
        'rout' => 'TaskController@index',
        'pex' => ['guest', 'admin'],
        'parameters' => 1
    ],
    'edit' => [
        'rout' => 'TaskController@edit',
        'pex' => ['admin'],
        'parameters' => 1
    ],
    'create' => [
        'rout' => 'TaskController@create',
        'pex' => ['guest', 'admin'],
        'parameters' => 0
    ],
    'store' => [
        'rout' => 'TaskController@store',
        'pex' => ['guest', 'admin'],
        'parameters' => 0
    ],
    'logout' => [
        'rout' => 'UserController@logout',
        'pex' => ['guest', 'admin'],
        'parameters' => 0
    ],
    'login' => [
        'rout' => 'UserController@login',
        'pex' => ['guest'],
        'parameters' => 0
    ],
];
?>