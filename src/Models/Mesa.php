<?php

namespace Models;

use Helpers\AppConfig as Config;
use Helpers\ImagesHelper as Images;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Capsule\Manager as Capsule;

class Mesa extends Model
{
  protected $table = "mesas";
  public $timestamps = false;

  public static function LastInsertId()
  {
    return Mesa::select("id")->orderBy("id", "desc")->first()->id;
    //return Capsule::select("SELECT id from ".Config::$tables["mesas"]." order by id desc limit 1")[0]->id;
  }

  public static function SaveImage($request, $id)
  {
      return Images::SaveImageFromRequest(
          $request,
          Config::$imagesDirectories["mesas"],
          Config::$imagesDirectories["mesasBkp"],
          $id
      );
  }
}
