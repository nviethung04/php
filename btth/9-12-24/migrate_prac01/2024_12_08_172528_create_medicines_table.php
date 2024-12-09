<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinesTable extends Migration
{
    public function up(): void
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->id('medicine_id'); // Primary Key
            $table->string('name', 255);
            $table->string('brand', 100)->nullable();
            $table->string('dosage', 50);
            $table->string('form', 50); // Dạng thuốc
            $table->decimal('price', 10, 2);
            $table->integer('stock');
            $table->timestamps(); // Tạo created_at, updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('medicines');
    }
}
