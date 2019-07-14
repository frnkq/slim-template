<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use \Slim\App;
use Controllers\ListadosController;
use Middleware\AuthMiddleware;
use Middleware\RoleMiddleware;

return function(App $app)
{
  //socios or mozos
  $app->group('/listados', function()
  {
    $this->get('/cocina', ListadosController::class . ':OperacionesCocina')
         ->setName("OperacionesCocina");

    $this->get('/cocina/[{empleado}]', ListadosController::class . ':OperacionesCocinaEmpleado')
         ->setName("OperacionesCocinaEmpleado");

    $this->get('/cerveza', ListadosController::class . ':OperacionesCerveza')
         ->setName("OperacionesCerveza");

    $this->get('/cerveza/[{empleado}]', ListadosController::class . ':OperacionesCervezaEmpleado')
         ->setName("OperacionesCervezaEmpleado");

    $this->get('/bar', ListadosController::class . ':OperacionesBar')
         ->setName("OperacionesBar");

    $this->get('/bar/[{empleado}]', ListadosController::class . ':OperacionesBarEmpleado')
         ->setName("OperacionesBarEmpleado");

    $this->get('/mozos', ListadosController::class . ':OperacionesMozos')
         ->setName("OperacionesMozos");

    $this->get('/mozos/[{empleado}]', ListadosController::class . ':OperacionesMozoEmpleado')
         ->setName("OperacionesMozoEmpleado");

    $this->get('/empleado/{username}', ListadosController::class . ':OperacionesEmpleado')
         ->setName("OperacionesPorEmpleado");
  })->add(AuthMiddleware::class.':IsLoggedIn')
    ->add(RoleMiddleware::class.':IsSocio');
};
