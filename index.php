<?php

use Illuminate\Database\Capsule\Manager as Capsule;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Helpers\AppConfig;
use Models\Mesa;
use Models\Pedidos\PedidoCocina;

require __DIR__.'/vendor/autoload.php';

$config = ['settings' => ['displayErrorDetails' => true]];

$app = new \Slim\App($config);

$capsule = new Capsule;
$capsule->addConnection(AppConfig::$illuminateDb);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$authRoutes = require __DIR__.'/src/Routes/AuthRoutes.php';
$authRoutes($app);

$empleadosRoutes = require __DIR__.'/src/Routes/Admin/EmpleadosRoutes.php';
$empleadosRoutes($app);

$pedidosRoutes = require __DIR__.'/src/Routes/Admin/PedidosRoutes.php';
$pedidosRoutes($app);

$mesaRoutes = require __DIR__.'/src/Routes/Admin/MesasRoutes.php';
$mesaRoutes($app);

$clienteRoutes = require __DIR__.'/src/Routes/ClienteRoutes.php';
$clienteRoutes($app);

//admin/mesas
$app->get('/', function($request, $response, $args)
{
  echo password_hash("hola", PASSWORD_BCRYPT);
  echo password_verify("$2y$10$73UeCRoFIvdHMeElrhqE0.M/1pz/rVHjCzR30UDXUQaO9RusA5Pve", PASSWORD_BCRYPT);
});
$app->run();
