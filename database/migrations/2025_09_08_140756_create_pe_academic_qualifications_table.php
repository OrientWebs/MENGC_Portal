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
            $table->foreignId('first_university_id')->nullable()->constrained('universities');

            $table->char('first_graduation_year', 9)->nullable();

            $table->foreignId('first_eng_disc_id')->nullable()->constrained('engineering_disciplines');
            $table->foreignId('first_acad_qual_id')->nullable()->constrained('academic_qualifications');

            $table->foreignId('post_university_id')->nullable()->constrained('universities');

            $table->char('post_graduation_year', 9)->nullable();
            $table->string('other_qualification', 250)->nullable();

            $table->foreignId('post_eng_disc_id')->nullable()->constrained('engineering_disciplines');

            $table->foreignId('post_acad_qual_id')->nullable()->constrained('academic_qualifications');

            $table->foreignId('other_eng_disc_id')->nullable()->constrained('engineering_disciplines');

            $table->char('other_graduation_year', 9)->nullable();

            $table->string('other_document_name_1')->nullable();
            $table->string('other_document_name_2')->nullable();
            $table->string('other_document_name_3')->nullable();
            $table->string('other_document_name_4')->nullable();

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
