<?php

namespace App;

use eftec\bladeone\BladeOne;
use Illuminate\Http\Request;
use Windwalker\Renderer\PhpRenderer;

class Helper
{
    public static function view($view, $data = [])
    {
        $blade = new BladeOne(__DIR__ . '/Views', __DIR__ . '/../cache', BladeOne::MODE_DEBUG);
        echo $blade->run($view, $data);
    }

    public static function url($url = '')
    {
        return (new Request())->capture()->root() . "/$url";
    }

    public static function urlWithParameters($url = '', $data = [], $pathInfo = true, $get = true)
    {
        $request = Request::capture();
        if ($pathInfo === false) $pathInfo = '/';
        else $pathInfo = $request->getPathInfo();
        if ($get === true) $get = $request->all();
        else $get = [];
        return (new Request())->capture()->root() . $pathInfo . "$url?" . http_build_query(array_merge($get, $data));
    }

    public static function redirect($url)
    {
        return header('Location: ' . $url);
    }

    public static function clearInfoSession()
    {
        unset($_SESSION['errors']);
        unset($_SESSION['success']);
    }

    public static function isAdmin()
    {
        return !empty($_SESSION['pex']) && $_SESSION['pex'] === 'admin';
    }

    public static function getSessionValue($key)
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    public static function hasSessionKey($key)
    {
        return !empty($_SESSION[$key]);
    }
}