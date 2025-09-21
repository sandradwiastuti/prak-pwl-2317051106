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
    Schema::create('mata_kuliah', function (Blueprint $table) {
        $table->id();                  // kolom id (primary key)
        $table->string('nama_mk');     // kolom nama_mk
        $table->integer('sks');        // kolom sks
        $table->timestamps();          // kolom created_at & updated_at
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mata_kuliah');
    }
};
