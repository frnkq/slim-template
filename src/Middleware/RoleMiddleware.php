<?php

namespace Middleware;

class RoleMiddleware extends TokenValidatorMiddleware
{
  public static function IsMozoOrHigher($request, $response, $next)
  {
    $data = parent::GetTokenData($request);

    if(is_null($data))
      return $response->withJson("no tiene los permisos necesarios para acceder aqui, ismozoorhigher", 403);

    if(strtolower($data->role != "mozo") && strtolower($data->role != "socio"))
    {
      return $response->withJson("no tiene los permisos necesarios para acceder aqui, ismozoorhigher", 403);
    }

    return $next($request, $response);
  }

  public static function IsSocio($request, $response, $next)
  {
     $data = parent::GetTokenData($request);

     if(is_null($data))
        return $response->withJson("no tiene los permisos necesarios para acceder aqui, isSocio", 403);

      if(strtolower($data->role) != "socio")
      {
        return $response->withJson("no tiene los permisos necesarios para acceder aqui, isSocio", 403);
      }
    return $next($request, $response);
  }

}
