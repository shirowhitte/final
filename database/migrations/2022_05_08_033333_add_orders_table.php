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
        Schema::table('orders', function (Blueprint $table) {
            $table->text('address')->nullable();
            $table->unsignedBigInteger('reservation_id')->nullable(); 
            $table->string('name');
            $table->text('cart');
            $table->string('payment_type')->nullable();
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
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
};
