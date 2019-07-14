<?php

namespace Models;
use Illuminate\Database\Eloquent\Model;

class AuditLogIn extends Model
{
  protected $table = "audit_login";
  public $timestamps = false;
}
