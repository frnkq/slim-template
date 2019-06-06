<?php
namespace Controllers;
interface IController
{
  public static function GetAll($request, $response, $args);
  public static function GetOne($request, $response, $args);
  public static function Create($request, $response, $args);
  public static function Update($request, $response, $args);
  public static function Delete($request, $response, $args);
}
