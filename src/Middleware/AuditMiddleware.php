<?php

namespace Middleware;
use Helpers\JWTAuth;
use Models\Audit;

class AuditMiddleware
{
    //$route = $request->getAttribute('route');
    //$name = $route->getName();
    //$groups = $route->getGroups();
    //$methods = $route->getMethods();
    //$arguments = $route->getArguments();
    //URI = $_SERVER["REQUEST_URI"];
  public static function Audit($request, $response, $next)
  {

    $data = null;
    if(isset($request->getHeaders()["HTTP_TOKEN"]))
    {
      $data = JWTAuth::GetData($request->getHeaders()["HTTP_TOKEN"][0]);
    }

    if(!is_null($data))
    {
      $aud = new Audit;
      $aud->role = $data->role;
      $aud->username = $data->username;
      $aud->accion = $request->getAttribute('route')->getName();
      $aud->URI = $_SERVER["REQUEST_URI"];
      $aud->ip = $_SERVER["REMOTE_ADDR"];
      $aud->save();
    }
    else
    {
      if($_SERVER["REQUEST_URI"] == "/auth/login")
      {
        $aud = new Audit;
        $aud->role = "guest";
        $aud->username = json_decode($request->getBody())->username;
        $aud->accion = $request->getAttribute('route')->getName();
        $aud->URI = $_SERVER["REQUEST_URI"];
        $aud->ip = $_SERVER["REMOTE_ADDR"];
        $aud->save();
      }
    }
    return $next($request, $response);
  }

}
