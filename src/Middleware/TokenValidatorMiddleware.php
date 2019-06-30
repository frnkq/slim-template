<?php
namespace Middleware;
use Helpers\JWTAuth;

class TokenValidatorMiddleware
{
  public static function GetTokenData($request)
  {
   return JWTAuth::GetData($request->getHeaders()["HTTP_TOKEN"][0]);
  }

  public static function IsValidToken($request)
  {
    if(!isset($request->getHeaders()["HTTP_TOKEN"]))
    {
      return false;
    }
    else
    {
      $token = $request->getHeaders()["HTTP_TOKEN"][0];

      if(!JWTAuth::VerifyToken($token))
      {
        return false;
      }
      //valid token at this point
      //var_dump(JWTAuth::GetData($token));
    }
   return true;
  }
}
