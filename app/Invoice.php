<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $guard_name = "web";
    
    protected $table = "invoices";
    public $primaryKey = "invoice_id";
    //public $incrementing = false;

    protected $fillable = ["companyName","address","pobox","city","lot"];

    public function invoice_item(){

    	return $this->belogsTo('App\Invoice_item');
    }
}
