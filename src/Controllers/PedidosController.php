<?php

namespace Controllers;

use Illuminate\Database\Capsule\Manager as Capsule;
use Controllers\AuthController;
use Models\Empleado;
use Models\Mesa;
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

/**
 * PedidosController
 *
 * @uses IController
 * @package
 * @version $id$
 * @copyright Franco Canevali
 * @author Franco Canevali <mail@francocanevali.com
 * @license PHP Version 3.0 {@link http://www.php.net/license/3_0.txt}
 */
class PedidosController implements IController
{
  /**
   * GetAll
   *
   * @param mixed $request
   * @param mixed $response
   * @param mixed $args
   * @static
   * @access public
   * @return void
   */
  public static function GetAll($request, $response, $args)
  {
    throw new \BadMethodCallException;
  }

  /**
   * GetOne
   *
   * @param mixed $request
   * @param mixed $response
   * @param mixed $args
   * @static
   * @access public
   * @return void
   */
  public static function GetOne($request, $response, $args)
  {
    throw new \BadMethodCallException;
  }

  public static function GetPedidoForCliente($request, $response, $args)
  {
    $pedido = Pedido::find($args["alfanum"][2]);
    $returnStr = self::PedidoToUl($pedido->id);
    return $response->getBody()->write($returnStr);
  }

  /**
   * GetPedidosBasedOnRole
   *
   * @param mixed $request
   * @param mixed $response
   * @param mixed $args
   * @static
   * @access public
   * @return void
   */
  public static function GetPedidosBasedOnRole($request, $response, $args)
  {
    $token = JWTAuth::GetData($request->getHeaders()["HTTP_TOKEN"][0]);
    switch($token->role)
    {
    case "cliente":
        self::GetPedidoByCliente($request, $response, $args);
        break;
    case "mozo":
        self::GetPedidoByMozo($request, $response, $args);
      break;

    case "socio":
        self::GetPedidosBySocio($request, $response, $args);
      break;
    case "cocinero":
        self::GetPedidosByCocinero($request, $response, $args);
      break;
    case "cervecero":
        self::GetPedidosByCervecero($request, $response, $args);
      break;
    case "bartender":
        self::GetPedidosByBartender($request, $response, $args);
      break;
    }
  }

  /**
   * GetPedidosBySocio
   *
   * @param mixed $request
   * @param mixed $response
   * @param mixed $args
   * @static
   * @access public
   * @return void
   */
  public static function GetPedidosBySocio($request, $response, $args)
  {
    $token = JWTAuth::GetData($request->getHeaders()["HTTP_TOKEN"][0]);
    echo "socio ".$token->username;
    $pedidos = Pedido::all();
    $returnStr = "";
    foreach($pedidos as $pedido)
    {
      $returnStr .= self::PedidoToUl($pedido->id);
    }
    return $response->getBody()->write($returnStr);
  }
  /**
   * GetPedidoByMozo
   *
   * @param mixed $request
   * @param mixed $response
   * @param mixed $args
   * @static
   * @access public
   * @return void
   */
  public static function GetPedidoByMozo($request, $response, $args)
  {
    $token = JWTAuth::GetData($request->getHeaders()["HTTP_TOKEN"][0]);
    $pedidos = Pedido::where("mozoUsername", $token->username)->get();
    $pedidosR = array();
    $returnStr = "";
    echo "mozo ".$token->username;
    foreach($pedidos as $pedido)
    {
      $returnStr .= self::PedidoToUl($pedido->id);
    }
    return $response->getBody()->write($returnStr);
  }

  /**
   * GetPedidosByCocinero
   *
   * @param mixed $request
   * @param mixed $response
   * @param mixed $args
   * @static
   * @access public
   * @return void
   */
  public static function GetPedidosByCocinero($request, $response, $args)
  {
    $token = JWTAuth::GetData($request->getHeaders()["HTTP_TOKEN"][0]);
    $pedidos = PedidoCocina::all();
    $pedidosR = array();
    $returnStr = "";
    foreach($pedidos as $pedido)
    {
      echo self::PedidoCocinaToUl($pedido);
    }
    echo "cocinero ".$token->username;
    return $response->getBody()->write($returnStr);
  }

  /**
   * GetPedidosByCervecero
   *
   * @param mixed $request
   * @param mixed $response
   * @param mixed $args
   * @static
   * @access public
   * @return void
   */
  public static function GetPedidosByCervecero($request, $response, $args)
  {
    $token = JWTAuth::GetData($request->getHeaders()["HTTP_TOKEN"][0]);
    $pedidos = PedidoCerveza::all();
    $pedidosR = array();
    $returnStr = "";
    foreach($pedidos as $pedido)
    {
      echo self::PedidoCervezaToUl($pedido);
    }
    echo "cervecero ".$token->username;
    return $response->getBody()->write($returnStr);
  }

  /**
   * GetPedidosByCervecero
   *
   * @param mixed $request
   * @param mixed $response
   * @param mixed $args
   * @static
   * @access public
   * @return void
   */
  public static function GetPedidosByBartender($request, $response, $args)
  {
    $token = JWTAuth::GetData($request->getHeaders()["HTTP_TOKEN"][0]);
    $pedidos = PedidoBar::all();
    $pedidosR = array();
    $returnStr = "";
    foreach($pedidos as $pedido)
    {
      echo self::PedidoBarToUl($pedido);
    }
    echo "bartender ".$token->username;
    return $response->getBody()->write($returnStr);
  }

  /**
   * GetPedidoByCliente
   *
   * @param mixed $request
   * @param mixed $response
   * @param mixed $args
   * @static
   * @access public
   * @return void
   */
  public static function GetPedidoByCliente($request, $response, $args)
  {
    $token = JWTAuth::GetData($request->getHeaders()["HTTP_TOKEN"][0]);
    $pedido = Pedido::where("clienteUsername", $token->username)->first();
    echo "cliente ".$token->username;
    return $response->getBody()->write(self::PedidotoUl($pedido->id));
  }

  /**
   * Create
   *
   * @param mixed $request
   * @param mixed $response
   * @param mixed $args
   * @static
   * @access public
   * @return void
   */
  public static function Create($request, $response, $args)
  {
    $token = JWTAuth::GetData($request->getHeaders()["HTTP_TOKEN"][0]);
    $data = $request->getParsedBody();
    $alfaNum = "";
    
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

    $respuesta = ["pedido" => $pedido->id, "alfanum" => $alfaNum,  "factura" => $factura->id, "cliente" => $cliente->username];
    return $response->withJson($respuesta, 200);
  }

  /**
   * DispatchPedidos
   *
   * @param mixed $productos
   * @static
   * @access public
   * @return void
   */
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

  public static function GetDispatchesByPedido($pedido)
  {
    $pedidosIdsCocina = json_decode($pedido->pedidosCocinaIds);
    $pedidosIdsBar = json_decode($pedido->pedidosBarIds);
    $pedidosIdsCerveza = json_decode($pedido->pedidosCervezaIds);

    $pedidosIdsCocina = is_null($pedidosIdsCocina) ? array() : $pedidosIdsCocina;
    $pedidosIdsBar = is_null($pedidosIdsBar) ? array() : $pedidosIdsBar;
    $pedidosIdsCerveza = is_null($pedidosIdsCerveza) ? array() : $pedidosIdsCerveza;

    $pedidosCocina = array();
    $pedidosBar = array();
    $pedidosCerveza = array();
    foreach($pedidosIdsCocina as $id)
      array_push($pedidosCocina, PedidoCocina::find($id));

    foreach($pedidosIdsBar as $id)
      array_push($pedidosBar, PedidoBar::find($id));

    foreach($pedidosIdsCerveza as $id)
      array_push($pedidosCerveza, PedidoCerveza::find($id));

    return array(
      "cocina" => $pedidosCocina,
      "bar" => $pedidosBar,
      "cerveza" => $pedidosCerveza
    );
  }


  /**
   * Update
   *
   * @param mixed $request
   * @param mixed $response
   * @param mixed $args
   * @static
   * @access public
   * @return void
   */
  public static function Update($request, $response, $args)
  {
    $token = JWTAuth::GetData($request->getHeaders()["HTTP_TOKEN"][0]);
    $data = $request->getParsedBody();

    //$pedido = self::GetPedidoByIdAndRole($id, $role);
    switch($token->role)
    {
      case "bartender":
        $pedido = PedidoBar::find($args["id"]);
        break;
      case "cervecero":
        $pedido = PedidoCerveza::find($args["id"]);
        break;
      case "cocinero":
        $pedido = PedidoCocina::find($args["id"]);
        break;
      case "socio":
      case "mozo":
        $pedido = Pedido::find($args["id"]);
        break;
    }
    if(is_null($pedido))
    {
      //no delegated pedido id
      return $response->withJson("hubo un error, por favor intentelo de nuevo", 200);
    }
    if($token->role == "socio" || $token->role == "mozo")
    {
      self::UpdatePedidoGral($pedido);
      return $response->withJson("Estado actualizado a ".$pedido->estado, 200);
    }

    //pedidos state goes secuentially unless specified
    if(isset($data["estado"]))
    {
      $pedido->estado = $data["estado"]; //todo validation
    }
    else
    {
      $state = Config::$estadosPedido;
      switch($pedido->estado)
      {
        case $state["nuevo"];
          $pedido->estado = $state["enPreparacion"];
          break;

        case $state["enPreparacion"]:
          $pedido->estado = $state["sirviendo"];
          break;

        case $state["sirviendo"]:
          $pedido->estado = $state["listoParaServir"];
          break;

        case $state["listoParaServir"];
          $pedido->estado = $state["entregado"];
          break;
      }
    }

    $pedido->save();
    return $response->withJson("Estado actualizado a ".$pedido->estado, 200);
  }


  /**
   * UpdatePedidoGral
   *
   * @param mixed $pedido
   * @static
   * @access public
   * @return void
   */
  public static function UpdatePedidoGral($pedido)
  {
    $queues = self::GetDispatchesByPedido($pedido);
    $oneIsInPreparacion = false;
    $oneIsListoParaServir = false;
    $allEntregados = true;
    foreach($queues as $queue)
    {
      foreach($queue as $pedidoqueue)
      {

        if($pedidoqueue->estado == Config::$estadosPedido["enPreparacion"])
          $oneIsInPreparacion = true;
        if($pedidoqueue->estado == Config::$estadosPedido["listoParaServir"])
          $oneIsListoParaServir = true;
        if($pedidoqueue->estado != Config::$estadosPedido["entregado"])
          $allEntregados = false;

      }
    }

    if($oneIsInPreparacion)
      $pedido->estado = Config::$estadosPedido["enPreparacion"];
    else if($oneIsListoParaServir)
    {
      $pedido->estado = Config::$estadosPedido["sirviendo"];
      $mesa = Mesa::find($pedido->mesaId);
      $mesa->estado = Config::$estadosMesa["clienteComiendo"];
      $mesa->save();
    }
    else if($allEntregados)
      $pedido->estado = Config::$estadosPedido["entregado"];

    if($pedido->estado == Config::$estadosPedido["entregado"])
    {
      $pedido->estado = Config::$estadosPedido["pagando"];
      $mesa = Mesa::find($pedido->mesaId);
      $mesa->estado = Config::$estadosMesa["cerrada"];
    }
    if($pedido->estado == Config::$estadosPedido["pagando"])
    {
      $pedido->estado = Config::$estadosPedido["cerrado"];
      $mesa = Mesa::find($pedido->mesaId);
      $mesa->estado = Config::$estadosMesa["cerrada"];
      $mesa->save();
    }
    $pedido->save();
  }

  /**
   * Delete
   *
   * @param mixed $request
   * @param mixed $response
   * @param mixed $args
   * @static
   * @access public
   * @return void
   */
  public static function Delete($request, $response, $args)
  {
    throw new \BadMethodCallException;
  }

  /**
   * PedidoToUl
   *
   * @param mixed $id
   * @static
   * @access public
   * @return void
   */
  public static function PedidoToUl($id)
  {
    $pedido = Pedido::find($id);
    $returnStr = "<ul>";
    $returnStr .="<li>Pedido: ".$pedido->id."</li>";
    $returnStr .="<li>Cliente: ".$pedido->clienteUsername."</li>";
    $returnStr .="<li>Mesa: ".$pedido->mesaId."</li>";
    $mozo = Empleado::where("username", $pedido->mozoUsername)->first();

    $returnStr .="<li>Mozo: ".$mozo->nombre." ".$mozo->apellido."</li>";
    $returnStr .="<li>Bar:";
    $returnStr .="<ul>";
      foreach(json_decode($pedido->pedidosBarIds) as $idPedidoBar)
      {
        $pedidoBar = PedidoBar::find($idPedidoBar)->first();
        $prod = Producto::find($pedidoBar->productoId);
        $returnStr .= "<li>".$pedidoBar->cantidad." X ".$prod->producto."</li>";
      }
    $returnStr .="</ul>";

    $returnStr .="<li>Cerveza:";
    $returnStr .="<ul>";
      foreach(json_decode($pedido->pedidosCervezaIds) as $idPedidoCerveza)
      {
        $pedidoCerveza = PedidoCerveza::find($idPedidoCerveza)->first();
        $prod = Producto::find($pedidoCerveza->productoId);
        $returnStr .= "<li>".$pedidoCerveza->cantidad." X ".$prod->producto."</li>";
      }
    $returnStr .="</ul>";

    $returnStr .="<li>Cocina:";
    $returnStr .="<ul>";
      foreach(json_decode($pedido->pedidosCocinaIds) as $idPedidoCocina)
      {
        $pedidoCocina = PedidoCocina::find($idPedidoCocina);
        $prod = Producto::find($pedidoCocina->productoId);
        $returnStr .= "<li>".$pedidoCocina->cantidad." X ".$prod->producto."</li>";
      }
    $returnStr .="</ul>";

    $returnStr .="</ul>";
    $returnStr .="<hr>";
    return $returnStr;
  }

  /**
   * PedidoCocinaToUl
   *
   * @param mixed $pedidoCocina
   * @static
   * @access public
   * @return void
   */
  public static function PedidoCocinaToUl($pedidoCocina)
  {
    $cocinero = ($pedidoCocina->cocineroUsername == null) ? "No asignado" : $pedidoCocina->cocineroUsername;
    $returnStr = "<ul>";
    $returnStr .="<li>Id: ".$pedidoCocina->id."</li>";
    $returnStr .="<li>Pedido: ".$pedidoCocina->pedidoId."</li>";
    $returnStr .="<li>Cocinero: ".$cocinero."</li>";
    $returnStr .="<li>".$pedidoCocina->cantidad." X ".Producto::find($pedidoCocina->productoId)->producto."</li>";
    $returnStr .="</ul>";
    $returnStr .="<hr>";

    return $returnStr;
  }

  /**
   * PedidoCervezaToUl
   *
   * @param mixed $pedidoCerveza
   * @static
   * @access public
   * @return void
   */
  public static function PedidoCervezaToUl($pedidoCerveza)
  {
    $cervecero = ($pedidoCerveza->cerveceroUsername == null) ? "No asignado" : $pedidoCerveza->cerveceroUsername;
    $returnStr = "<ul>";
    $returnStr .="<li>Id: ".$pedidoCerveza->id."</li>";
    $returnStr .="<li>Pedido: ".$pedidoCerveza->pedidoId."</li>";
    $returnStr .="<li>Cervecero: ".$cervecero."</li>";
    $returnStr .="<li>".$pedidoCerveza->cantidad." X ".Producto::find($pedidoCerveza->productoId)->producto."</li>";
    $returnStr .="</ul>";
    $returnStr .="<hr>";

    return $returnStr;
  }

  /**
   * PedidoCervezaToUl
   *
   * @param mixed $pedidoCerveza
   * @static
   * @access public
   * @return void
   */
  public static function PedidoBarToUl($pedidoBar)
  {
    $bartender = ($pedidoBar->bartenderUsername == null) ? "No asignado" : $pedidoBar->bartenderUsername;
    $returnStr = "<ul>";
    $returnStr .="<li>Id: ".$pedidoBar->id."</li>";
    $returnStr .="<li>Pedido: ".$pedidoBar->pedidoId."</li>";
    $returnStr .="<li>Cervecero: ".$bartender."</li>";
    $returnStr .="<li>".$pedidoBar->cantidad." X ".Producto::find($pedidoBar->productoId)->producto."</li>";
    $returnStr .="</ul>";
    $returnStr .="<hr>";

    return $returnStr;
  }
}
