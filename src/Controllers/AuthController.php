<?php

namespace Controllers;
use Helpers\JWTAuth;

class AuthController
{
  public static function LogIn($request, $response, $args)
  {

    $data = json_decode($request->getBody());
    return  JWTAuth::CreateToken($data);
  }
}
