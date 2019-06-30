<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use \Slim\App;
use Controllers\EmpleadosController;
use Middleware\AuthMiddleware;
use Middleware\RoleMiddleware;
//abm empleados
return function(App $app)
{
  //if jwt.user.role == socio...let, otherwise don't let
  $app->group('/admin/empleados', function()
  {
    $this->get('/', EmpleadosController::class . ':GetAll');
    $this->get('/{username}', EmpleadosController::class . ':GetOne');
    $this->post('/create', EmpleadosController::class . ':Create');
    $this->put('/update', EmpleadosController::class . ':Update');
    $this->delete('/delete', EmpleadosController::class . ':Delete');
  })->add(AuthMiddleware::class .':IsLoggedIn');
    //->add(RoleMiddleware::class .':IsSocio');
};
