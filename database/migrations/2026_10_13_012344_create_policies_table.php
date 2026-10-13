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
        Schema::create('policies', function (Blueprint $table) {
            $table->id();
            $table->string('policy_name');
            $table->text('policy_description')->nullable();
            $table->text('policy_content')->nullable();
            $table->integer('policy_version')->default('1');
            $table->string('target_category')->nullable();
            $table->string('attachment_filename')->nullable();
            $table->string('attachment_path')->nullable();
            $table->string('attachment_type')->nullable();
            $table->bigInteger('attachment_size')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('status')->default('Inactive');
            $table->string('remarks')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('restrict');
            $table->timestamps();
            $table->index(['status', 'start_date', 'end_date'], 'idx_policies_status_dates');
            $table->unique(['policy_name', 'policy_version'], 'unique_policy_version');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('policies');
    }
};
