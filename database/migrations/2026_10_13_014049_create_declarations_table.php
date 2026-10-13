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
        Schema::create('declarations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('certificate_id')->constrained('certificates')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('policy_id')->constrained('policies')->onUpdate('cascade')->onDelete('restrict');
            $table->dateTime('declared_at')->nullable();
            $table->timestamps();
            $table->unique(['certificate_id', 'policy_id'], 'declarations_certificate_policy_unique');
            $table->index(['declared_at'], 'idx_declarations_done_declared');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('declarations');
    }
};
