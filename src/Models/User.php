<?php

namespace Models;
use Illuminate\Database\Eloquent\Model;
use Helpers\AppConfig as Config;
use Helpers\ImagesHelper as Images;
use Illuminate\Database\Capsule\Manager as Capsule;

class User extends Model
{
  protected $table = "users";
  public $timestamps = false;
  public static function LastInsertId()
  {
      $id = Capsule::select("SELECT id from ".Config::$tables["users"]." order by id desc limit 1");
      if(isset($id[0]))
          return $id[0]->id;
      return 0;
  }

  public static function FindByUsername($username)
  {
      $obj =  Capsule::select("SELECT * from ".Config::$tables["users"]." where username='$username'");
      return User::find($obj[0]->id);
  }
}
