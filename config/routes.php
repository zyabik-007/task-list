<?php

use App\Controllers\TaskController;
use App\Controllers\UserController;
use QuickRoute\Route;

if ($_SESSION['pex'] === 'admin') {
    Route::get('task/edit/{parameter}', function ($parameter = null) {
        (new TaskController())->edit($parameter);
        return \App\Helper::clearInfoSession();
    });
} else {
    Route::get('task/edit/{parameter}', function ($parameter = null) {
        return (new UserController())->login();
    });
}
Route::get('/', function ($parameter = null) {
    return (new TaskController())->index($parameter);
});

Route::get('/page/{parameter}', function ($parameter = null) {
    return (new TaskController())->index($parameter);
});
Route::get('task/create', function () {
    (new TaskController())->create();
    return \App\Helper::clearInfoSession();
});
Route::match(['get', 'post'], 'task/store', function () {
    return (new TaskController())->store();
});

Route::get('user/logout', function () {
    return (new UserController())->logout();
});
Route::match(['get', 'post'], 'user/login', function () {
    (new UserController())->login();
    return \App\Helper::clearInfoSession();
});
?>