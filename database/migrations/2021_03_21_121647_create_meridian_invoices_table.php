<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeridianInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meridian_invoices', function (Blueprint $table) {
            $table->bigIncrements('invoice_id');
            $table->unsignedBigInteger('user_id');
            $table->longText('companyName');
            $table->longText('address');
            $table->longText('pobox')->nullable();
            $table->longText('city');
            $table->longText('lot')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meridian_invoices');
    }
}