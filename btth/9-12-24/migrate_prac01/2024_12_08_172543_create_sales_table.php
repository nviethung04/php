<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id('sale_id'); // Primary Key
            $table->unsignedBigInteger('medicine_id'); // Foreign Key
            $table->integer('quantity');
            $table->dateTime('sale_date');
            $table->string('customer_phone', 10)->nullable();
            $table->timestamps(); // Tạo created_at, updated_at

            // Khóa ngoại
            $table->foreign('medicine_id')->references('medicine_id')->on('medicines')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
}
