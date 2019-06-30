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
      //$id = Capsule::select("SELECT id from ".Config::$tables["users"]." order by id desc limit 1");
      //if(isset($id[0]))
      //    return $id[0]->id;
      //return 0;
      return User::select("id")->orderBy("id", "desc")->first()->id;
  }

  public static function FindByUsername($username)
  {
      //$obj =  Capsule::select("SELECT * from ".Config::$tables["users"]." where username='$username'");
      //if(count($obj)==0)
      //  return null;
    //return User::find($obj[0]->id);
     return User::where("username", $username)->first();
  }

  public static function FindByUsernameAndPassword($username, $password)
  {
      //$obj =  Capsule::select("SELECT * from ".Config::$tables["users"]." where username='$username' and password='$password'");
      //if(count($obj)==0)
      //  return null;
     //return User::find($obj[0]->id);
     return User::where("username", $username)->where("password", $password)->first();
  }

  public static function CreateClienteUsername($username, $i=null)
  {
    $i = is_null($i) ? 1 : ((int)explode("_", $username)[1]) +1;

    $username = str_replace(" ", "", $username);

    if(User::where("username", $username)->first() != null)
    {
      $username = explode("_", $username);
      $username = $username[0];
      $username = $username."_".$i;
      return self::CreateClienteUsername($username, $i);
    }
    return $username;
  }
}
