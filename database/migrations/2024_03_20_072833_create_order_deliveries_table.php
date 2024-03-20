<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_deliveries', function (Blueprint $table) {
            $table->id();
            $table->string('orderNo');
            $table->float('emptyVehicleWt', 10, 3)->nullable();
            $table->float('grossLoadedVehicleWt', 10, 3)->nullable();
            $table->float('netVehicleWt', 10, 3)->nullable();
            $table->float('destination1loadedWt', 10, 3)->nullable();
            $table->float('destination1emptyWt', 10, 3)->nullable();
            $table->float('destination2loadedWt', 10, 3)->nullable();
            $table->float('destination2emptyWt', 10, 3)->nullable();
            $table->string('grNo')->nullable();
            $table->date('grDate')->nullable();
            $table->string('ewayBill')->nullable();
            $table->string('InvoiceNo')->nullable();
            $table->string('Supplier')->default('JSPL');
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
        Schema::dropIfExists('order_deliveries');
    }
};
