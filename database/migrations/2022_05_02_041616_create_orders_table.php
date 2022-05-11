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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('restaurant_id');
            $table->bigInteger('price')->nullable();
            $table->string('type');
            $table->string('comment');
            $table->string('status');
            $table->string('notes')->nullable();
            $table->timestamps();
            $table->text('address')->nullable();
            $table->unsignedBigInteger('reservation_id')->nullable(); 
            $table->string('name');
            $table->text('cart');
            $table->string('payment_type')->nullable(); 
            $table->text('deliverlatertime')->nullable();
            $table->text('img')->nullable();
           
            $table->foreign('reservation_id')
            ->references('id')->on('reservations')
            ->onDelete('cascade');
            $table->foreign('name')
            ->references('username')->on('users')
            ->onDelete('cascade');
 
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
