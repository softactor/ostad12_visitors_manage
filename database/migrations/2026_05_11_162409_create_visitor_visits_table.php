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
        Schema::create('visitor_visits', function (Blueprint $table) {
            $table->id();

            $table->foreignId('visitor_site_id')->constrained()->cascadeOnDelete();
            $table->foreignId('visitor_id')->constrained()->cascadeOnDelete();

            $table->foreignId('host_user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('checked_in_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('checked_out_by')->nullable()->constrained('users')->nullOnDelete();

            $table->string('purpose')->nullable();
            $table->string('vehicle_no')->nullable();

            $table->string('status')->default('checked_in');
            // checked_in, checked_out, cancelled

            $table->timestamp('check_in_at')->nullable();
            $table->timestamp('check_out_at')->nullable();

            $table->text('remarks')->nullable();

            $table->timestamps();

            $table->index(['visitor_site_id', 'status']);
            $table->index(['check_in_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('visitor_visits');
    }
};
