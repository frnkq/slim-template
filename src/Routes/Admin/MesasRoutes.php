<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use \Slim\App;
use Controllers\MesasController;
use Middleware\RoleMiddleware;
use Middleware\AuthMiddleware;

return function(App $app)
{
  //socios or mozos
  $app->group('/admin/mesas', function()
  {
    $this->get('/', MesasController::class . ':GetAll')
         ->setName("ListarMesas");

    $this->get('/{id}', MesasController::class . ':GetOne')
         ->setName("ListarMesa");
  })->add(AuthMiddleware::class.':IsLoggedIn')
    ->add(RoleMiddleware::class.':IsMozoOrHigher');

  //only socios
  $app->group('/admin/mesas', function()
  {
    $this->post('/create', MesasController::class . ':Create')
         ->setName("CrearMesa");

    $this->put('/update', MesasController::class . ':Update')
         ->setName("ActualizarMesa");

    $this->delete('/delete', MesasController::class . ':Delete')
         ->setName("EliminarMesa");
  })->add(AuthMiddleware::class.':IsLoggedIn')
    ->add(RoleMiddleware::class.':IsSocio');
};
