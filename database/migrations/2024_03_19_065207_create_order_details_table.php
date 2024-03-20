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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->string('orderNo')->unique();
            $table->date('orderDate')->nullable();
            $table->string('deliveryparty')->nullable();
            $table->string('deliveryDest1')->nullable();
            $table->string('deliveryDest2')->nullable();
            $table->float('orderWt', 10, 3);
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
        Schema::dropIfExists('order_details');
        
    }
};