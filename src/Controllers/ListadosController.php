<?php
namespace Controllers;

use Models\Mesa;
use Helpers\AppConfig as Config;
use Helpers\FilesHelper as Files;
use Helpers\ImagesHelper as Images;
use Models\Audit;
use Models\User;
use Illuminate\Database\Capsule\Manager as Capsule;

class ListadosController
{
  public static function OperacionesCocina($request, $response, $args)
  {
    $operaciones = "";
    $auds = Audit::where("role", "cocinero")->orderBy("fecha")->get();
    $operaciones .="<p>Cant operaciones:".count($auds)."</p>";
    foreach($auds as $aud)
    {
      $operaciones .= self::AuditToUl($aud);
    }
    return $response->getBody()->write($operaciones);
  }

  public static function OperacionesCocinaEmpleado($request, $response, $args)
  {
    $operaciones = "";
    $user = null;
    if(isset($args["empleado"]))
    {
      $user = User::FindByUsername($args["empleado"]);
    }

    if(is_null($user))
    {
      return $response->withJson("Empleado inexistente");
    }

    $auds = Audit::where("role", "cocinero")->where("username", $user->username)->orderBy("fecha")->get();
    $operaciones .="<p>Cant operaciones:".count($auds)."</p>";
    foreach($auds as $aud)
    {
      $operaciones .= self::AuditToUl($aud);
    }
    return $response->getBody()->write($operaciones);
  }


  public static function OperacionesCerveza($request, $response, $args)
  {
    $operaciones = "";
    $auds = Audit::where("role", "cervecero")->orderBy("fecha")->get();
    $operaciones .="<p>Cant operaciones:".count($auds)."</p>";
    foreach($auds as $aud)
    {
      $operaciones .= self::AuditToUl($aud);
    }
    return $response->getBody()->write($operaciones);
  }

  public static function OperacionesCervezaEmpleado($request, $response, $args)
  {
    $operaciones = "";
    $user = null;
    if(isset($args["empleado"]))
    {
      $user = User::FindByUsername($args["empleado"]);
    }

    if(is_null($user))
    {
      return $response->withJson("Empleado inexistente");
    }

    $auds = Audit::where("role", "cervecero")->where("username", $user->username)->orderBy("fecha")->get();
    $operaciones .="<p>Cant operaciones:".count($auds)."</p>";
    foreach($auds as $aud)
    {
      $operaciones .= self::AuditToUl($aud);
    }
    return $response->getBody()->write($operaciones);
  }

  public static function OperacionesBar($request, $response, $args)
  {
    $operaciones = "";
    $auds = Audit::where("role", "bartender")->orderBy("fecha")->get();
    $operaciones .="<p>Cant operaciones:".count($auds)."</p>";
    foreach($auds as $aud)
    {
      $operaciones .= self::AuditToUl($aud);
    }
    return $response->getBody()->write($operaciones);
  }

  public static function OperacionesBarEmpleado($request, $response, $args)
  {
    $operaciones = "";
    $user = null;
    if(isset($args["empleado"]))
    {
      $user = User::FindByUsername($args["empleado"]);
    }

    if(is_null($user))
    {
      return $response->withJson("Empleado inexistente");
    }

    $auds = Audit::where("role", "bartender")->where("username", $user->username)->orderBy("fecha")->get();
    $operaciones .="<p>Cant operaciones:".count($auds)."</p>";
    foreach($auds as $aud)
    {
      $operaciones .= self::AuditToUl($aud);
    }
    return $response->getBody()->write($operaciones);
  }

  public static function OperacionesMozo($request, $response, $args)
  {
    $operaciones = "";
    $auds = Audit::where("role", "mozo")->orderBy("fecha")->get();
    $operaciones .="<p>Cant operaciones:".count($auds)."</p>";
    foreach($auds as $aud)
    {
      $operaciones .= self::AuditToUl($aud);
    }
    return $response->getBody()->write($operaciones);
  }

  public static function OperacionesMozoEmpleado($request, $response, $args)
  {
    $operaciones = "";
    $user = null;
    if(isset($args["empleado"]))
    {
      $user = User::FindByUsername($args["empleado"]);
    }

    if(is_null($user))
    {
      return $response->withJson("Empleado inexistente");
    }

    $auds = Audit::where("role", "mozo")->where("username", $user->username)->orderBy("fecha")->get();
    $operaciones .="<p>Cant operaciones:".count($auds)."</p>";
    foreach($auds as $aud)
    {
      $operaciones .= self::AuditToUl($aud);
    }
    return $response->getBody()->write($operaciones);
  }

  public static function OperacionesEmpleado($request, $response, $args)
  {
    $operaciones = "";

    $user = User::where("username", $args["username"])->first();

    if(is_null($user))
    {
      return $response->withJson("Empleado inexistente");
    }

    $auds = Audit::where("username", $user->username)->orderBy("fecha")->get();
    $operaciones .="<p>Cant operaciones:".count($auds)."</p>";
    foreach($auds as $aud)
    {
      $operaciones .= self::AuditToUl($aud);
    }
    return $response->getBody()->write($operaciones);
  }

  public static function AuditToUl($aud)
  {
    $returnStr = "<ul>";
    $returnStr .= "<li>".$aud->accion."</li>";
    $returnStr .= "<li>".$aud->username."</li>";
    $returnStr .= "<li>".$aud->fecha."</li>";
    $returnStr .="</ul>";
    $returnStr .="<hr>";

    return $returnStr;
  }
}
