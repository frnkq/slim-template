<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
  protected $table = "productos";
  public $timestamps = false;

  public static function GetByCategoria($categoria)
  {
    return Producto::where("categoria", $categoria)->get();
  }

  public static function GetStock($id)
  {
    return Producto::find($id)->stock;
  }

  public static function GetPrecio($id)
  {
    return Producto::find($id)->precio;
  }
}
