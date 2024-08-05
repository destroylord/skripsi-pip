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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('nisn');
            $table->enum('gender', ['L', 'P']);
            $table->enum('type', ['tampil', 'sembunyi']);
            $table->string('birth_place')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('religion', 100)->nullable();
            $table->string('kindergarten')->nullable();
            $table->text('kindergarten_address')->nullable();
            $table->text('home_address')->nullable();
            $table->string('father_name')->nullable();
            $table->text('father_address')->nullable();
            $table->string('father_birth_place')->nullable();
            $table->date('father_birth_date')->nullable();
            $table->string('mother_name')->nullable();
            $table->text('mother_address')->nullable();
            $table->string('mother_birth_place')->nullable();
            $table->date('mother_birth_date')->nullable();
            $table->string('birth_certificate')->nullable(); // fotokopi akta kelahiran
            $table->string('family_card')->nullable(); //fotokopi kartu keluarga
            $table->string('kindergarten_certificate')->nullable(); //fotokopi ijazah tk (jika ada)'); 
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
