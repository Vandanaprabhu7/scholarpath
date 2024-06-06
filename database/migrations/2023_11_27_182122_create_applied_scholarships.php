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
        Schema::create('applied_scholarships', function (Blueprint $table) {
            $table->id();
            $table->string('applied_by');
            $table->string('applied_to');
            $table->string('sname');
            $table->string('name');
            $table->string('email');
            $table->json('custom_fields'); // Store custom fields as JSON
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applied_scholarships');
    }
};
