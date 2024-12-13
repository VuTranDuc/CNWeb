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
        Schema::create('medicines', function (Blueprint $table) {
            $table->id("medicine_id");
            $table->string("name");
            $table->string("brand");
            $table->string("dosage");
            $table->string("form");
            $table->decimal("price", 8, 2); // Định nghĩa cột price là kiểu decimal (tối đa 8 chữ số, 2 chữ số sau dấu thập phân)
            $table->integer("stock");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicines');
    }
};
