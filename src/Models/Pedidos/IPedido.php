<?php
namespace Models\Pedidos;
interface IPedido
{
  function UpdateStatus($id, $newStatus);
  function isValidStatus($status);
}
