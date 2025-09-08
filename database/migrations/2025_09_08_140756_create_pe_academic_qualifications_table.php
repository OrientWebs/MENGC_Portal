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
        Schema::create('pe_academic_qualifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pe_form_id')->constrained('pe_registration_forms')->onDelete('cascade');
            $table->foreignId('university_id')->nullable()->constrained('universities');
            $table->integer('graduation_year')->nullable();
            $table->integer('graduation_month')->nullable();
            $table->foreignId('engineering_discipline_id')->nullable()->constrained('engineering_disciplines');
            $table->foreignId('academic_qualification_id')->nullable()->constrained('academic_qualifications');
            $table->string('qualification_name')->nullable();
            $table->enum('qualification_type', ['first', 'post', 'other']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pe_academic_qualifications');
    }
};
