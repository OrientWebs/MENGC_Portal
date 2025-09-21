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
        Schema::create('registration_forms', function (Blueprint $table) {
            $table->id();

            $table->string('register_no')->unique(); // PE-0001 etc.
            $table->foreignId('user_id')->nullable()->constrained('users');

            $table->enum('form_type', ['PE', 'RCPE', 'BE', 'SE']); // form apply type

            $table->string('name_en');
            $table->string('name_mm');
            $table->string('title', 256)->nullable();
            $table->string('father_name_en')->nullable();
            $table->string('father_name_mm')->nullable();
            $table->date('dob');
            $table->string('nationality_type')->nullable();
            $table->string('permanent_resident_no')->nullable();
            $table->string('nrc_no_en')->nullable();
            $table->string('nrc_no_mm')->nullable();

            $table->string('email', 256)->nullable();

            $table->string('tele_no_en')->nullable();
            $table->string('tele_no_mm')->nullable();

            $table->text('address_en')->nullable();
            $table->text('address_mm')->nullable();

            $table->foreignId('state_id')->nullable()->constrained('states');
            $table->foreignId('township_id')->nullable()->constrained('townships');

            $table->string('fax_no')->nullable();



            $table->enum('status', ['draft', 'submitted', 'approved', 'rejected'])->default('draft');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registration_forms');
    }
};
