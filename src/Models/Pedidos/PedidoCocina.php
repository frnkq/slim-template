<?php
namespace Models\Pedidos;

use Illuminate\Database\Eloquent\Model;
use Models\Pedidos\IPedido;
class PedidoCocina extends Model implements IPedido
{
  protected $table = "pedidos_cocina";
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

