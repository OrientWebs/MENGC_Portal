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
        Schema::create('pe_registration_forms', function (Blueprint $table) {
            $table->id();

            // Foreign key to main registration form
            $table->foreignId('registration_id')->nullable()->constrained('registration_forms');

            // Permanent Contact Address
            $table->string('perm_address_en')->nullable();
            $table->string('perm_address_mm')->nullable();
            $table->foreignId('perm_state_id')->nullable()->constrained('states');
            $table->foreignId('perm_township_id')->nullable()->constrained('townships');
            $table->string('perm_post_code', 20)->nullable();
            $table->string('perm_tele_no', 50)->nullable();
            $table->string('perm_fax_no', 50)->nullable();
            $table->string('perm_email', 100)->nullable();

            // Designation and Office Address
            $table->string('des_address_en')->nullable();
            $table->string('des_address_mm')->nullable();
            $table->foreignId('des_state_id')->nullable()->constrained('states');
            $table->foreignId('des_township_id')->nullable()->constrained('townships');
            $table->string('des_post_code', 20)->nullable();
            $table->string('des_tele_no', 50)->nullable();
            $table->string('des_fax_no', 50)->nullable();
            $table->string('des_email', 100)->nullable();

            // Engineering Discipline
            $table->foreignId('engineering_discipline_id')->nullable()->constrained('engineering_disciplines');

            // Boolean requirements
            $table->boolean('exp_15_years')->default(false)->nullable();
            $table->boolean('meet_all_requirements')->default(false)->nullable();
            $table->boolean('no_disciplinary_action')->default(false)->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pe_registration_forms');
    }
};