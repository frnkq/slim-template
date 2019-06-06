<?php

namespace Middleware;

class RoleMiddleware extends TokenValidatorMiddleware
{
  public static function IsMozoOrHigher($request, $response, $next)
  {
    $data = parent::GetTokenData($request);
    if(strtolower($data->role == "mozo") || strtolower($data->role == "socio"))
    {
      return $next($request, $response);
    }
    else
    {
      return $response->withJson("no tiene los permisos necesarios para acceder aqui, ismozoorhigher", 403);
    }
  }

  public static function IsSocio($request, $response, $next)
  {
    $data = parent::GetTokenData($request);
    if(strtolower($data->role) != "socio")
    {
      return $response->withJson("no tiene los permisos necesarios para acceder aqui, isSocio", 403);
    }
    else
    {
      return $next($request, $response);
    }

  }
}
