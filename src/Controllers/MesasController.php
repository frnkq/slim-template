<?php

namespace Controllers;

use Models\Mesa;
use Helpers\JWTAuth;
use Helpers\AppConfig;

class MesasController implements IController
{
  public static function GetAll($request, $response, $args)
  {
    return "mostrando mezas";
  }

  public static function GetOne($request, $response, $args)
  {
    $id = $request->getAttributes()["id"];
    $mesa = Mesa::find($id);
    if($mesa)
    {
      $responseObj = ["message" => "mesa encontrada", "mesa" => $mesa];
      return $response->withJson(json_encode($responseObj), 200);
    }
    else
    {
      $responseObj = ["message" => "mesa no encontrada"];
      return $response->withJson(json_encode($responseObj), 401);
    }
  }

  public static function Create($request, $response, $args)
  {
    $mesa = new Mesa;
    $mesa->estado = AppConfig::$estadosMesa["disponible"];
    $mesa->save();
    $responseObj = ["message" => "mesa creada", "mesa" => $mesa];
    return $response->withJson(json_encode($responseObj), 200);
  }

  public static function Update($request, $response, $args)
  {
    $body = $request->getParsedBody();
    if(!isset($body["id"]))
    {
      return $response->withJson("debe especificar id", 400);
    }
    if(!isset($body["estado"]))
    {
      return $response->withJson("debe especificar estado", 400);
    }
    $mesa = Mesa::find($body["id"]);
    if(!$mesa)
    {
      return $response->withJson("mesa inexistente", 200);
    }
    $mesa->estado = $body["estado"];
    $mesa->save();
    return $response->withJson("mesa guardada");
    die();
  }

  public static function Delete($request, $response, $args)
  {
    throw new \BadMethodCallException;
  }
}
