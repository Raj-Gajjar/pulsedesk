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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('app_name')->default('PulseDesk');
            $table->string('company_name')->nullable();
            $table->string('timezone')->default('Asia/Kolkata');

            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();

            $table->enum('survey_default_status', [
                'draft',
                'published',
            ])->default('draft');

            $table->boolean('allow_multiple_response')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
