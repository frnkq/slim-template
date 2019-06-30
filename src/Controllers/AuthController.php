<?php

namespace Controllers;
use Helpers\JWTAuth;
use Models\User;

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

    $obj = [
      "id" => $user->id,
      "username" => $user->username,
      "role" => $user->role
    ];
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

  public static function ChangePassword()
  {
      //create route, if is socio don't
      //check old password or security question
  }
}
