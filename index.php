<?php

use Illuminate\Database\Capsule\Manager as Capsule;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Helpers\AppConfig;
use Models\Mesa;
use Models\Pedidos\PedidoCocina;
use Middleware\AuditMiddleware;

require __DIR__.'/vendor/autoload.php';

$config = ['settings' => ['displayErrorDetails' => true, 'determineRouteBeforeAppMiddleware' => true]];

$app = new \Slim\App($config);

$capsule = new Capsule;
$capsule->addConnection(AppConfig::$illuminateDb);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$app->add(AuditMiddleware::class . ':Audit');
$authRoutes = require __DIR__.'/src/Routes/AuthRoutes.php';
$authRoutes($app);

$empleadosRoutes = require __DIR__.'/src/Routes/Admin/EmpleadosRoutes.php';
$empleadosRoutes($app);

$listadosRoutes = require __DIR__.'/src/Routes/Admin/ListadosRoutes.php';
$listadosRoutes($app);

$pedidosRoutes = require __DIR__.'/src/Routes/Admin/PedidosRoutes.php';
$pedidosRoutes($app);

$mesaRoutes = require __DIR__.'/src/Routes/Admin/MesasRoutes.php';
$mesaRoutes($app);

$clienteRoutes = require __DIR__.'/src/Routes/ClienteRoutes.php';
$clienteRoutes($app);
$app->run();
