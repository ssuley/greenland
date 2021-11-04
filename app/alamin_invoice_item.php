<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class alamin_invoice_item extends Model
{
     protected $guard_name = "web";
    
    protected $table = "alamin_invoice_items";
    public $primaryKey = "invoice_item_id";
    //public $incrementing = false;

    protected $fillable = ["invoice_id","item_name","unit","order_item_quantity","order_item_price","order_item_final_amount"];

    public function alamin_invoice(){
    	return $this->hasMany('App\alamin_invoice');
    }
}
