<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class masuo_invoice extends Model
{
    protected $guard_name = "web";
    
    protected $table = "masuo_invoices";
    public $primaryKey = "invoice_id";
    //public $incrementing = false;

    protected $fillable = ["companyName","address","pobox","city","lot","transport","insurence"];

    public function masuo_invoice_item(){

    	return $this->belogsTo('App\masuo_invoice_item');
    }
}
