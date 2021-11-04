<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_items', function (Blueprint $table) {
            $table->bigIncrements('invoice_item_id');
            $table->unsignedBigInteger('invoice_id');
            $table->longText('item_name');
            $table->longText('unit');
            $table->longText('invoice_quantity');
            $table->longText('invoice_item_price');
            $table->longText('invoice_item_final_amount');
            $table->longText('currency_type');
            $table->timestamps();
            $table->foreign('invoice_id')->references('invoice_id')->on('invoices')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_items');
    }
}
