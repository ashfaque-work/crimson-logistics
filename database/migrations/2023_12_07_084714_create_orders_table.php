<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique();
            $table->enum('status', ['pending', 'processing', 'ready_to_receive', 'ready_to_ship', 'completed', 'decline'])->default('pending');
            $table->decimal('order_total', 20, 6);
            $table->unsignedBigInteger('conductor_id')->nullable();
            $table->unsignedBigInteger('refiner_id')->nullable();
            $table->unsignedBigInteger('freight_id')->nullable();
            $table->unsignedBigInteger('shipper_id')->nullable();
            $table->unsignedBigInteger('client_id')->nullable();
            $table->timestamps();

            $table->foreign('conductor_id')->references('id')->on('conductors')->onDelete('set null');
            $table->foreign('refiner_id')->references('id')->on('refiners')->onDelete('set null');
            $table->foreign('freight_id')->references('id')->on('freights')->onDelete('set null');
            $table->foreign('shipper_id')->references('id')->on('shippers')->onDelete('set null');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('set null');

            $table->index('status');
            $table->index('order_number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
