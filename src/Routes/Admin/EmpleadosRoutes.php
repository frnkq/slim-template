<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use \Slim\App;
use Controllers\EmpleadosController;
use Controllers\AuthController;
use Middleware\AuthMiddleware;
use Middleware\RoleMiddleware;
//abm empleados
return function(App $app)
{
  //if jwt.user.role == socio...let, otherwise don't let
  $app->group('/admin/empleados', function()
  {
    $this->get('/', EmpleadosController::class . ':GetAll')
         ->setName("ListarEmpleados");

    $this->get('/{username}', EmpleadosController::class . ':GetOne')
         ->setName("ListarEmpleado");

    $this->post('/create', EmpleadosController::class . ':Create')
         ->setName("CrearEmpleado");

    $this->post('/suspender', AuthController::class . ':Suspender')
         ->setName("SuspenderEmpleado")
         ->add(RoleMiddleware::class . ':IsSocio');

    $this->post('/dessuspender', AuthController::class . ':DesSuspender')
         ->setName("DesSuspenderEmpleado") 
         ->add(RoleMiddleware::class .':IsSocio');

    $this->put('/update', EmpleadosController::class . ':Update')
         ->setName("ActualizarEmpleado");

    $this->delete('/delete', EmpleadosController::class . ':Delete')
         ->setName("EliminarEmpleado");
  })->add(AuthMiddleware::class .':IsLoggedIn');
    //->add(RoleMiddleware::class .':IsSocio');
};
