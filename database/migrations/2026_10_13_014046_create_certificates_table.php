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
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->string('certificate_number')->unique();
            $table->foreignId('contract_id')->unique()->constrained('contracts')->onUpdate('cascade')->onDelete('restrict');
            $table->date('issued_date');
            $table->string('status')->default('Invalid');
            $table->text('revocation_reason')->nullable();
            $table->timestamps();
            $table->index(['status', 'issued_date'], 'idx_certificates_status_dates');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};
