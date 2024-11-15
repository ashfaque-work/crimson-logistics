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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id')->nullable();
            $table->string('truck_number')->nullable();
            $table->string('item')->nullable();
            $table->string('weight')->nullable();
            $table->text('description')->nullable();
            $table->text('tracking_info')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('order_status')->nullable();
            $table->string('delivery_status')->nullable();
            $table->string('notified')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
