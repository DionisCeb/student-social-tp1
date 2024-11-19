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
        Schema::create('files', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->foreignId('student_id')->constrained()->onDelete('cascade'); // Foreign key to students table
            $table->string('title'); // File title
            $table->date('upload_date'); // Upload date
            $table->string('file_path'); // File storage path
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
