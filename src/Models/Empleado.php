<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;
use Helpers\AppConfig as Config;
use Helpers\ImagesHelper as Images;
use Illuminate\Database\Capsule\Manager as Capsule;

class Empleado extends Model
{
  protected $table = "empleados";
  public $timestamps = false;

  public static function LastInsertId()
  {
      //$id = Capsule::select("SELECT id from ".Config::$tables["empleados"]." order by id desc limit 1");
      //if(isset($id[0]))
      //    return $id[0]->id;
      //return 0;
      $e = Empleado::select("id")->orderBy("id", "desc")->first();
      return is_null($e) ? 0 : $e->id;
  }

  public static function FindByUsername($username)
  {
      //$obj =  Capsule::select("SELECT * from ".Config::$tables["empleados"]." where username='$username'");
      //return Empleado::find($obj[0]->id);
      return Empleado::where("username", $username)->first();
  }

  public function ConstructUsername()
  {
      //username will be = fcanevali900
      //where f= nombre franco
      //canevali = apellido
      //900 = last 3 dni digits
      $result = $this->nombre[0];
      $result .= $this->apellido;
      $result .= substr($this->dni, strlen($this->dni) - 3, strlen($this->dni));

      return strtolower($result);
  }

  public static function SaveImage($request, $id)
  {
      return Images::SaveImageFromRequest(
          $request,
          Config::$imagesDirectories["empleados"],
          Config::$imagesDirectories["empleadosBkp"],
          $id
      );
  }
}
