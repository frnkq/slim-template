<?php

namespace Helpers;

class AppConfig
{
  public static $illuminateDb = [
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'tp_php',
    'username'  => 'root',
    'password'  => 'frnkquito',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => ''
  ];
  public static $estadosMesa = [
    'disponible' => "Disponible",
    'clienteEsperando' => "Cliente esperando pedido",
    'clienteComiendo' => "Cliente comiendo",
    'clientePagando' => "Cliente pagando",
    'cerrada' => "Cerrada"
  ];
}
