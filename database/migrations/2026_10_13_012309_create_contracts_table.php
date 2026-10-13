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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->string('contract_number')->unique();
            $table->string('secret_key', 9)->unique(); // NNNN-XXXX
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('vessel_id')->constrained('vessels')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('rank_id')->constrained('ranks')->onUpdate('cascade')->onDelete('restrict');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('status')->default('Inactive');
            $table->text('remarks')->nullable();
            $table->timestamps();
            $table->index(['status', 'start_date', 'end_date'], 'idx_contracts_status_dates');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
