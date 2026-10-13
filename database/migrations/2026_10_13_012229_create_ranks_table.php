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
        Schema::create('ranks', function (Blueprint $table) {
            $table->id();
            $table->string('rank_name')->unique();
            $table->text('rank_description')->nullable();
            $table->string('category')->default('Normal Crew');
            $table->integer('is_active')->default(1);
            $table->timestamps();
            $table->index('is_active', 'idx_ranks_active_order');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ranks');
    }
};
