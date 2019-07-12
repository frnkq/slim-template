<?php

namespace Controllers;


use Models\Empleado;
use Models\User;
use Helpers\AppConfig as Config;
use Helpers\FilesHelper as Files;
use Helpers\ImagesHelper as Images;
use Controllers\AuthController;

class EmpleadosController implements IController
{
  public static function GetAll($request, $response, $args)
  {
      return json_encode(Empleado::all());
  }

  public static function GetOne($request, $response, $args)
  {
    $username = $request->getAttributes()["username"];
    $empleado = Empleado::FindByUsername($username);
    if($empleado)
    {
      $responseObj = ["message" => "empleado encontrado", "empleado" => $empleado];
      return $response->withJson(json_encode($responseObj), 200);
    }
    else
    {
      $responseObj = ["message" => "empleado no encontrada"];
      return $response->withJson(json_encode($responseObj), 401);
    }
  }

  public static function Create($request, $response, $args)
  {

    $body = $request->getParsedBody();
    if(!isset($body["dni"]) || !isset($body["nombre"])
        || !isset($body["apellido"]) || !isset($body["rol"]) || !isset($body["contrasena"])
      )
    {
      return $response->withJson("debe especificar dni, nombre, apellido, rol y contrasena", 400);
    }

    $empleado = new Empleado;
    $empleado->id = Empleado::LastInsertId()  +1;
    $empleado->dni = $body["dni"];
    $empleado->nombre = $body["nombre"];
    $empleado->apellido = $body["apellido"];
    $empleado->username = $empleado->ConstructUsername();
    $empleado->role = $body["rol"];
    //$empleado->image = Empleado::SaveImage($request, $empleado->id);
    $empleado->save();

    $password = $body["contrasena"];
    $user = AuthController::Register($empleado, $password);

    $responseObj = ["message" => "empleado creado",
        "empleado" => $empleado, "usuario" => ["username" => $user->username, "password" => $password] ];
    return $response->withJson(json_encode($responseObj), 200);
  }

  public static function Update($request, $response, $args)
  {
    $body = $request->getParsedBody();
    if(!isset($body["username"]))
    {
      return $response->withJson("debe especificar id", 400);
    }

    $empleado = Empleado::FindByUsername($body["username"]);
    if(is_null($empleado))
    {
      return $response->withJson("empleado inexistente", 200);
    }
    //empleado update
    if(isset($body["dni"]))
        $empleado->dni = $body["dni"];
    if(isset($body["nombre"]))
        $empleado->nombre = $body["nombre"];
    if(isset($body["apellido"]))
        $empleado->apellido = $body["apellido"];
    if(isset($body["rol"]))
        $empleado->role = $body["rol"];

    if(isset($body["password"]))
    {
        $user = User::FindByUsername($empleado->username);
        $user->password = $body["password"];
        $user->save();
    }
    $empleado->save();
    return $response->withJson("empleado guardada");
  }

  public static function UpdatePicture($request, $response, $args)
  {
      $id = $request->getAttribute("username");
      if(is_null($id))
      {
        return $resposne->withJson("debe especificar username empleado");
      }
      $empleado = Empleado::find($username);
      $empleado->picture = Empleado::SaveImage($request, $empleado->id);
      $result = $empleado->save();
      return $response->withJson("foto actualizada: ".$result, 200);
  }

  public static function Delete($request, $response, $args)
  {
    $body = $request->getParsedBody();
    if(!isset($body["username"]))
    {
      return $response->withJson("debe especificar username", 400);
    }
    $empleado = Empleado::FindByUsername($body["username"]);
    if(is_null($empleado))
    {
      return $response->withJson("empleado inexistente", 200);
    }

    $user = User::FindByUsername($body["username"]);
    if(is_null($user))
    {
      return $response->withJson("empleado inexistente", 200);
    }
    $user->delete();
    $empleado->delete();
    return $response->withJson("empleado eliminada");
  }
}
