<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
  protected $guard_name = "web";
    
    protected $table = "rates";
    public $primaryKey = "id";
    //public $incrementing = false;

    protected $fillable = ["rate"];
}