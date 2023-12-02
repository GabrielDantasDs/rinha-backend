<?php
require_once __DIR__ . '/autoloader.php';

use controllers\Users;
use router\Router;


$request = $_SERVER['REQUEST_URI'];
$payload = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' || $_SERVER['REQUEST_METHOD'] === 'PUT') {
    $payload = file_get_contents("php://input");
}

$controllerDir = '/controllers/';

global $connect_pg;

try {
    $connect_pg = pg_pconnect("host=db port=5432 dbname=root user=root password=password");
} catch (Exception $e) {
    return $e->getMessage();
}

$router = new Router();

$router->addRoute('POST', '/users', function () use ($payload) {
    return Users::create($payload);
});

$router->addRoute('PUT', "/users/", function ($id) use ($payload) {
    return Users::update($id, $payload);
});

$router->addRoute('GET', "/users/", function ($id) {
    return Users::get($id);
});

$router->addRoute('DELETE', "/users/", function ($id) {
    return Users::delete($id);
});

$router->matchRoute();
