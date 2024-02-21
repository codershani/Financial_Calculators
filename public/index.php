<?php

use app\controllers\AuthController;
use app\controllers\SiteController;
use app\controllers\ToolController;
use app\core\Application;
use app\models\User;

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config = [
    'userClass' => User::class,
    "db" => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
];

$app = new Application(dirname(__DIR__), $config);

$app->route->group('/', function ($router) {
    $router->get('', [SiteController::class, 'home']);
    $router->get('{slug}', [SiteController::class, 'index']);
});

$app->route->group('/login', function ($router) {
    $router->get('', [AuthController::class, 'login']);
    $router->post('', [AuthController::class, 'login']);
});


$app->route->get('/logout', [AuthController::class, 'logout']);

$app->route->group('/admin', function ($router) {
    $router->get('', [AuthController::class, 'admin']);

    $router->group('/tools', function ($router) {
        $router->get('', [ToolController::class, 'index']);

        $router->group('/edit', function ($router) { 
            $router->get('/{id:\d+}', [ToolController::class, 'update']);
            $router->post('/{id:\d+}', [ToolController::class, 'update']);
            $router->post('/{id:\d+}/{status}', [ToolController::class, 'update']);
        });

        $router->group('/delete', function ($router) {
            $router->get('/{id:\d+}', [ToolController::class, 'delete']);
            $router->post('/{id:\d+}', [ToolController::class, 'delete']);
        });
    });
});

$app->run();