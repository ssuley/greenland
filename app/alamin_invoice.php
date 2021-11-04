<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class alamin_invoice extends Model
{
    protected $guard_name = "web";
    
    protected $table = "alamin_invoices";
    public $primaryKey = "invoice_id";
    //public $incrementing = false;

    protected $fillable = ["companyName","address","pobox","city","lot","transport","insurence"];

    public function alamin_invoice_item(){

    	return $this->belogsTo('App\alamin_invoice_item');
    }
}
