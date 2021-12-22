<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $guard_name = "web";
    protected $table = "accounts";
    public $primaryKey = "account_id";
    //protected static $logAttributes = ['name', 'text'];
 	protected $fillable = ["first_name","last_name","staff_gender","user_id","phone"];
}
