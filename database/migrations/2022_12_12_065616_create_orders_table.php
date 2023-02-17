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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
             $table->Integer('buyer_id')->nullable();
             $table->String('name')->nullable();
             $table->String('email')->nullable();
             $table->String('phone_no')->nullable();
             $table->text('address')->nullable();
             $table->Integer('address_type')->nullable();
             $table->String('city')->nullable();
             $table->String('state')->nullable();
             $table->Integer('pincode')->nullable();
             $table->String('date')->nullable();
             $table->Integer('total_price')->nullable();
             $table->String('payment_mode')->nullable();
             $table->String('payment_id')->nullable();
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
        Schema::dropIfExists('orders');
    }
};

