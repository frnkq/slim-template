<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
  protected $table = "facturas";
  public $timestamps = false;
  //id factura
  //guid factura
  //mozo username
  //cliente username
  //hora creacion
  //productos array[[producto, cantidad]]
  //total (calculado en el cierre)
  //hora cierre
}
