<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    protected $guard_name = "web";
    
    protected $table = "letters";
    public $primaryKey = "letter_id";
    //public $incrementing = false;

    protected $fillable = ["description"];
}
