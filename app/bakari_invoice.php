<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bakari_invoice extends Model
{
    protected $guard_name = "web";
    
    protected $table = "bakari_invoices";
    public $primaryKey = "invoice_id";
    //public $incrementing = false;

    protected $fillable = ["companyName","address","pobox","city","lot","transport","insurence"];

    public function bakari_invoice_item(){

    	return $this->belogsTo('App\bakari_invoice_item');
    }
}
