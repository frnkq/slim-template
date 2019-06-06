<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use \Slim\App;
use Controllers\PedidosController;

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
    $this->get('/', PedidosController::class . ':GetAll');
    $this->get('/{id}', PedidosController::class . ':GetOne');
    $this->post('/create', PedidosController::class . ':Create');
    $this->put('/update', PedidosController::class . ':Update');
    $this->delete('/delete', PedidosController::class . ':Delete');
  });
};
