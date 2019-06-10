<?php

namespace Controllers;
use Helpers\JWTAuth;
use Models\User;

class AuthController
{
  public static function LogIn($request, $response, $args)
  {

    $data = json_decode($request->getBody());

    if(!isset($data->username) || !isset($data->password))
      return $response->withJson("ingrese username/password", 400);

    $user = User::FindByUsernameAndPassword($data->username, $data->password);

    if(is_null($user))
    {
      return $response->withJson("invalid username/password");
    }

    return  JWTAuth::CreateToken($user);
  }

  public static function Register($empleado, $password)
  {
      $username = $empleado->username;
      $user = new User;
      $user->username = $username;
      
      $user->password = $password;
      $user->role = $empleado->role;

      $user->save();
      return $user;
  }

  public static function ChangePassword()
  {
      //create route, if is socio don't
      //check old password or security question
  }
}
