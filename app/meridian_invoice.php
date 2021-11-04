<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class meridian_invoice extends Model
{
    protected $guard_name = "web";
    
    protected $table = "meridian_invoices";
    public $primaryKey = "invoice_id";
    //public $incrementing = false;

    protected $fillable = ["companyName","address","pobox","city","lot"];

    public function meridian_invoice_item(){

    	return $this->belogsTo('App\meridian_invoice_item');
    }
}
