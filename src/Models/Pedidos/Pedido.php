<?php
//bartender, cervecero, cocinero, socio
namespace Models\Pedidos;

use Illuminate\Database\Eloquent\Model;
use Models\Pedidos\IPedido;

class Pedido extends Model implements IPedido
{
  protected $table = "pedidos";
  public $timestamps = false;

  function UpdateStatus($id, $newStatus)
  {
    return true;
  }

  function isValidStatus($status)
  {
     //check if status exists on AppConfig::PedidoStatus
  }
}

