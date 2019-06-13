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

  /*
   * Mozo registra cliente:
   * Mozo crea main pedido:
   * Mozo crea factura??
   * Mozo puede agregar a pedido
   * main pedido crea queuees
   * main pedido esta en nuevo
   * (queuees) => nuevo
   *   #bartender #candybar #cervecero
   *   actualizan de nuevo a "en preparacion" /cancelado
   *   actualizan de en preparacion a "listo para servir" / cancelado 
   *   actualizan de listo para servir a entregado / cancelado 
   *   (go checking that for entregadu must've been listo p servir)
   *   listo p servir => "avisa " al mozo ¿?
   * (mozo) => "recoge los quees"
   *   main pedido "listo para servir"? el mozo va sirviendo..
   *   todos los quees entregados? estado main "todo servido"
   *   actualiza de (x) a "entregado"
   *   puede agregar un quee, sigue el mismo flujo
   * (mozo) => cierra 
   * 1 pedido por mesa
   * main: id, idmesa, mozo, idcliente, idfactura, hora, 
   *    estado, idBar(vino, trago), idCerveza(cerveza), idCocina (candy, platos)
   * (piden algo mas? nueva row, nuevo id, mismo idmesa, mismo idcliente);
   * piden una cerveza => idbar = (int), idcocina = null, idcandy = null
   *
   *
   *
   * pide cerveza "quilmes"
   * crea pedido main
   * crea pedidoCerveza = stockId, cantidad
   */
};
