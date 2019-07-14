<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use \Slim\App;
use Controllers\PedidosController;
use Middleware\RoleMiddleware;
use Middleware\AuthMiddleware;

//abm pedidos
//restrict responses based on empleado role
//client -> /login -> /miPedido
//mozo can see hole pedido
//#bartender can only see BartenderItem...
//PedidosController -> IPedido
return function(App $app)
{
  $app->group('/admin/pedidos', function()
  {
    //$this->get('/', PedidosController::class . ':GetPedidosBasedOnRole')->add(AuthMiddleware:: . ':IsLoggedIn');
    $this->post('/create', PedidosController::class . ':Create')
         ->setName("CrearPedido")
         ->add(RoleMiddleware::class . ':IsMozoOrHigher');

    $this->delete('/delete', PedidosController::class . ':Delete');
  });

  $app->get("/pedidos", PedidosController::class . ':GetPedidosBasedOnRole')
      ->setName("ListarPedidos")
      ->add(AuthMiddleware::class . ':IsLoggedIn');

  $app->get("/pedido/{alfanum}", PedidosController::class . ':GetPedidoForCliente')
      ->setName("ListarPedido")
      ->add(AuthMiddleware::class . ':IsLoggedIn');

  //id corresponde al tipo de pedido segun el rol
  $app->post("/pedidos/{id}", PedidosController::class . ':Update')
      ->setName("ActualizarPedido")->add(AuthMiddleware::class . ':IsLoggedIn');

};
