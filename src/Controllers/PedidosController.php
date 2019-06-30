<?php

namespace Controllers;

use Illuminate\Database\Capsule\Manager as Capsule;
use Controllers\AuthController;
use Models\Pedidos\Pedido;
use Models\Factura;
use Models\Producto;
use Models\User;
use Models\Pedidos\PedidoBar;
use Models\Pedidos\PedidoCocina;
use Models\Pedidos\PedidoCerveza;
use Helpers\JWTAuth;
use Helpers\GUID;
use Helpers\AppConfig as Config;

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

  public static function GetPedidosBasedOnRole($request, $response, $args)
  {
    $token = JWTAuth::GetData($request->getHeaders()["HTTP_TOKEN"][0]);
    switch($token->role)
    {
    case "cliente":
        self::GetPedidoByCliente($request, $response, $args);
        break;

    case "mozo":
      echo "mostrando los pedidos del mozo: ".$token->username;
      break;

    case "admin":
      echo "mostrando todos los pedidos";
      break;
    }
  }

  public static function GetPedidoByCliente($request, $response, $args)
  {
    $token = JWTAuth::GetData($request->getHeaders()["HTTP_TOKEN"][0]);
    $pedido = Pedido::where("clienteUsername", $token->username)->first();
    return $response->withJson(var_dump($pedido), 200); 
  }

  public static function Create($request, $response, $args)
  {
    $token = JWTAuth::GetData($request->getHeaders()["HTTP_TOKEN"][0]);
    $data = $request->getParsedBody();

    if(User::where("username", $data["cliente"])->first() == null)
    {
      $clienteUsername = User::CreateClienteUsername($data["cliente"], null);
      $cliente = new User;
      $cliente->username = $clienteUsername;
      $cliente->password = strrev($clienteUsername);
      $cliente->role = "cliente";
      $savedCliente = AuthController::Register($cliente, $cliente->password);
    }
    else
    {
      $cliente = User::where("username", $data["cliente"])->first();
    }
    $dispatch = self::DispatchPedidos($data["productos"]);

    //id,guid,mozoUsername,clienteUsername,fechaApertura,fechaCierre,productos,importe
    $factura = new Factura;
    $factura->guid = GUID::NewGuid();
    $factura->mozoUsername = $token->username;
    $factura->clienteUsername = $cliente->username;
    $factura->fechaCierre = null;
    $factura->productos = json_encode($data["productos"]);
    $factura->importe = -1;
    $factura->save();


    //mesaId, mozoUsername, clienteUsername, estado, pedidoBarIds, pedidoCervezaIds, pedidoCocinaIds, hora
    $pedido = new Pedido;
    $pedido->mozoUsername = $token->username;
    $pedido->facturaId = $factura->id; //generar factura

    $pedido->mesaId = $data["mesa"];
    $pedido->clienteUsername = $cliente->username; //pido nombre cliente o username, si no existe lo crea
    $pedido->estado = Config::$estadosPedido["nuevo"];
    $pedido->pedidosBarIds = json_encode($dispatch["bar"]);
    $pedido->pedidosCocinaIds = json_encode($dispatch["cocina"]);
    $pedido->pedidosCervezaIds = json_encode($dispatch["cerveza"]);
    $pedido->save();

    $mesa = Mesa::find($data["mesa"]);
    $mesa->estado = Config::$estadosMesa["clienteEsperando"];
    $mesa->save();

    $respuesta = ["pedido" => $pedido->id, "factura" => $factura->id, "cliente" => $cliente->username];
    return $response->withJson($respuesta, 200);
  }

  public static function DispatchPedidos($productos)
  {
    $pedidosCocina = array();
    $pedidosBar = array();
    $pedidosCerveza = array();
    $pedidoId = Pedido::LastInsertId();
    foreach($productos as $productoCantidad)
    {
      $producto = $productoCantidad[0];
      $cantidad = $productoCantidad[1];
      $producto = Capsule::table('productos')->where('id', $productoCantidad[0])->first();

      switch($producto->categoria)
      {
        case Config::$categoriasProducto['bar']:
          $pedidoBar = new PedidoBar;
          $pedidoBar->pedidoId = $pedidoId;
          $pedidoBar->bartenderUsername = null; //se edita cuando el bartender toma el pedido
          $pedidoBar->estado = "Nuevo"; //appConfig
          $pedidoBar->productoId = $productoCantidad[0];
          $pedidoBar->cantidad = $productoCantidad[1];
          $pedidoBar->save();
          array_push($pedidosBar, $pedidoBar->id);
        break;

        case Config::$categoriasProducto['cocina']:
        case Config::$categoriasProducto['postre']:
          $pedidoCocina = new PedidoCocina;
          $pedidoCocina->pedidoId = $pedidoId;
          $pedidoCocina->cocineroUsername = null; //se edita cuando el bartender toma el pedido
          $pedidoCocina->estado = "Nuevo"; //appConfig
          $pedidoCocina->productoId = $productoCantidad[0];
          $pedidoCocina->cantidad = $productoCantidad[1];
          $pedidoCocina->save();
          array_push($pedidosCocina, $pedidoCocina->id);
          break;

        case Config::$categoriasProducto['cerveza']:
          $pedidoCerveza = new PedidoCerveza;
          $pedidoCerveza->pedidoId = $pedidoId;
          $pedidoCerveza->cerveceroUsername = null; //se edita cuando el bartender toma el pedido
          $pedidoCerveza->estado = "Nuevo"; //appConfig
          $pedidoCerveza->productoId = $productoCantidad[0];
          $pedidoCerveza->cantidad = $productoCantidad[1];
          $pedidoCerveza->save();
          array_push($pedidosCerveza, $pedidoCerveza->id);
          break;
      }
    }
    return array(
      "cocina" => $pedidosCocina,
      "bar" => $pedidosBar,
      "cerveza" => $pedidosCerveza 
    );
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
