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
        Schema::create('pemetaans', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('dosen_id')->constrained('dosens')->cascadeOnDelete(); // Relasi ke dosens
            $table->foreignId('matakuliah_id')->constrained('matakuliah')->cascadeOnDelete(); // Relasi ke matakuliah
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemetaans');
    }
};
