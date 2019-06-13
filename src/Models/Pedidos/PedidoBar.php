<?php
namespace Models\Pedidos;

use Illuminate\Database\Eloquent\Model;
use Models\Pedidos\IPedido;

class PedidoBar extends Model implements IPedido
{
  /*
   * pedido bar must take shorter than cocina, cerveza as well*/
  //id, pedidoId,  estado, bartenderUsername, stockId, cantidad
  protected $table = "pedidos_bar";
  public $timestamps = false;

  function UpdateStatus($id, $newStatus)
  {
    return true;
  }

  function isValidStatus($status)
  {
     //check if status exists on AppConfig::PedidoStatus
  }

  public static function LastInsertId()
  {
    $pb = PedidoBar::select("id")->orderBy("id", "desc")->first();
    return is_null($pb) ? 0 : $pb->id;
  }
}

