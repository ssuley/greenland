<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasuoInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masuo_invoices', function (Blueprint $table) {
            $table->bigIncrements('invoice_id')->primary()->uniqid();
            $table->unsignedBigInteger('user_id');
            $table->longText('companyName');
            $table->longText('address');
            $table->longText('pobox')->nullable();
            $table->longText('city');
            $table->longText('lot')->nullable();
            $table->longText('transport')->default(0);
            $table->longText('insurance')->default(0);
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
        Schema::dropIfExists('masuo_invoices');
    }
}
