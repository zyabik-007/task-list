<?php
require __DIR__ . '/../vendor/autoload.php';

use QuickRoute\Router\Collector;
use QuickRoute\Router\Dispatcher;

session_start();
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../")->load();

require __DIR__ . '/../config/routes.php';
require __DIR__ . '/../config/db.php';

if (!isset($_SESSION['pex']))
    $_SESSION['pex'] = 'guest';

$request = \Illuminate\Http\Request::capture();
$dispatcher = Dispatcher::create(Collector::create()->collect())
    ->dispatch($request->method(), $request->path());
if ($dispatcher->isFound()) {
    $handler = $dispatcher->getRoute()->getHandler();
    $parameters = $dispatcher->getUrlParameters();
    return $handler(isset($parameters['parameter']) ? $parameters['parameter'] : null);
}
return \App\Helper::view('error');

?>