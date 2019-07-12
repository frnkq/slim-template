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

    if(!$data->active)
    {
      return $response->withJson("su usuario se encuentra suspendido, por favor contacte al administrador", 403);
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
    if(!$data->active)
    {
      return $response->withJson("su usuario se encuentra suspendido, por favor contacte al administrador", 403);
    }
    return $next($request, $response);
  }

  public static function IsMozo($request, $response, $next)
  {
    $data = parent::GetTokenData($request);

    if(is_null($data))
      return $response->withJson("no tiene los permisos necesarios para acceder aqui, ismozo", 403);

    if(strtolower($data->role != "mozo"))
    {
      return $response->withJson("no tiene los permisos necesarios para acceder aqui, ismozo", 403);
    }
    if(!$data->active)
    {
      return $response->withJson("su usuario se encuentra suspendido, por favor contacte al administrador", 403);
    }

    return $next($request, $response);
  }

}
