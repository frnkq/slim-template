<?php

namespace Controllers;
use Helpers\JWTAuth;
use Models\User;
use Models\AuditLogIn;

class AuthController
{
  public static function LogIn($request, $response, $args)
  {
    $data = json_decode($request->getBody());

    //echo password_hash($data->password, PASSWORD_DEFAULT); die();


    if(!isset($data->username) || !isset($data->password))
      return $response->withJson("ingrese username/password", 400);

    $user = User::FindByUsername($data->username);

    if(is_null($user))
    {
        return $response->withJson("invalid username/password");
    }
    else
    {
      if(!password_verify($data->password, $user->password))
      {
        return $response->withJson("invalid username/password");
      }

    }

    if(!$user->active)
    {
      return $response->withJson("Su usuario se encuentra suspendido, contacte al administrador", 503);
    }
    $obj = [
      "id" => $user->id,
      "username" => $user->username,
      "role" => $user->role,
      "active" => $user->active
    ];
    $aud = new AuditLogIn;
    $aud->username = $user->username;
    $aud->role = $user->role;
    $aud->active = $user->active;
    $aud->save();
    return  JWTAuth::CreateToken($obj);
  }

  public static function Register($user, $password)
  {
      $newUser = new User;
      $newUser->username = $user->username;
      $newUser->password = password_hash($password, PASSWORD_DEFAULT);
      $newUser->role = $user->role;

      $newUser->save();
      return $newUser;
  }

  public static function Suspender($request, $response, $args)
  {
    $body = $request->getParsedBody();
    if(!isset($body["username"]))
    {
      return $response->withJson("debe especificar id", 400);
    }

    $user = User::FindByUsername($body["username"]);

    if(is_null($user))
    {
      return $response->withJson("empleado inexistente", 200);
    }

    $user->active = false;
    $user->save();
    return $response->withJson("Empleado suspendido", 200);
  }

  public static function DesSuspender($request, $response, $args)
  {
    $body = $request->getParsedBody();
    if(!isset($body["username"]))
    {
      return $response->withJson("debe especificar id", 400);
    }

    $user = User::FindByUsername($body["username"]);

    if(is_null($user))
    {
      return $response->withJson("user inexistente", 200);
    }

    $user->active = true;
    $user->save();
    return $response->withJson("Empleado activo", 200);
  }

  public static function ChangePassword()
  {
      //create route, if is socio don't
      //check old password or security question
  }
}
