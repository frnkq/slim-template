<?php

namespace Controllers;

use Models\Pedidos\Pedido;
use Models\Producto;
use Models\Pedidos\PedidoBar;

class PedidosController implements IController
{
  public static function GetAll($request, $response, $args)
  {
    throw new \BadMethodCallException;
  }

  public static function GetOne($request, $response, $args)
  {
    throw new \BadMethodCallException;
  }

  public static function Create($request, $response, $args)
  {
    $pedido = new Pedido;

    //var_dump($request->getParsedBody()["elementos"]);
    $pedidosBar = array();

      $pedidosQueue = array();
    foreach($request->getParsedBody()["elementos"] as $elemento)
    {
      $id =  $elemento["id"];
      $categoria = Producto::find($id)->categoria;
      $pedidoBar = null;
      switch($categoria)
      {
        //move to appconfig
        case "Bar":
          $pedidoBar = new PedidoBar;
          $pedidoBar->pedidoId = Pedido::LastInsertId()+1;
          $pedidoBar->cantidad = $elemento["cantidad"];
          $pedidoBar->productoId = $id;
          $pedidoBar->save();
          //array_push($pedidosBar, $pedidoBar);
          array_push($pedidosQueue, $pedidoBar);
          break;

          //switch cocina, postre
      }

    }

    $pedidosBarIds = "";
    $pedidosCocinaIds = "";
    $pedidosPostreIds = "";

    foreach($pedidosQueue as $p)
    {
      if($p instanceof PedidoBar)
        $pedidosBarIds .= "_".$p->id;
    }
    $pedidosBarIds = substr($pedidosBarIds, 1, strlen($pedidosBarIds));
    var_dump($pedidosBarIds); //id1_id2_id3

    $pedidosCocinaIds = substr($pedidosCocinaIds, 1, strlen($pedidosCocinaIds));
    var_dump($pedidosCocinaIds); //id1_id2_id3

    $pedidosPostreIds = substr($pedidosPostreIds, 1, strlen($pedidosPostreIds));
    var_dump($pedidosPostreIds); //id1_id2_id3

    die();
    //Pedido::crearpedidofromrequest()
    //las cosas viajan en array "elementos", sacar categoria por id de stock
    //dispatch
    //clienteusername = lo saco al crear username (pensar como a travez del nombre)
    //mozoUsername viaja con el token
    //facturaid la creo
    //estado = nuevo
    //hora = null
    //rellenar pedidos
    //mesa cerrada -> no borra cliente username
    $pedido->pedidosBarIds = $pedidosBarIds;
    $pedido->save(); 

    die();
    throw new \BadMethodCallException;
  }

  public static function Update($request, $response, $args)
  {
    throw new \BadMethodCallException;
  }

  public static function Delete($request, $response, $args)
  {
    throw new \BadMethodCallException;
  }
}
