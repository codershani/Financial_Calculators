<?php

use app\controllers\AuthController;
use app\controllers\SiteController;
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

$app->router->get('/', [SiteController::class, 'home']);
$app->router->get('/{slug}', [SiteController::class, 'index']);

$app->router->get('/login', [AuthController::class, 'login']);
$app->router->get('/login/{id}/', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);

$app->router->get('/logout', [AuthController::class, 'logout']);
$app->router->get('/admin', [AuthController::class, 'admin']);
$app->router->get('/admin/{id:\d+}/{username}', [AuthController::class, 'admin']);

// $app->router->get('/project', [ProjectController::class, 'index']);
// $app->router->get('/admin/project', [ProjectController::class, 'project']);
// $app->router->get('/admin/upload', [ProjectController::class, 'upload']);
// $app->router->post('/admin/upload', [ProjectController::class, 'upload']);
// $app->router->get('/admin/project/edit', [ProjectController::class, 'edit']);
$app->run();