<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->id(); // id (Primary Key)
            $table->foreignId('computer_id')->constrained('computers'); // Khóa ngoại tham chiếu computers.id
            $table->string('reported_by', 50)->nullable(); // Người báo cáo
            $table->dateTime('reported_date'); // Thời gian báo cáo
            $table->text('description'); // Mô tả vấn đề
            $table->enum('urgency', ['Low', 'Medium', 'High']); // Mức độ sự cố
            $table->enum('status', ['Open', 'In Progress', 'Resolved']); // Trạng thái
            $table->timestamps(); // created_at, updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('issues');
    }
};
