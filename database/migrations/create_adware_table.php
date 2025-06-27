<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('adware', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('source_user_id'); // Chi ha piazzato l'adware
            $table->unsignedBigInteger('target_user_id'); // Chi è infettato
            $table->timestamp('planted_at')->nullable();
            $table->timestamp('removed_at')->nullable();
            $table->boolean('active')->default(true);
            $table->decimal('last_income', 12, 2)->default(0); // ultima cifra generata
            $table->timestamps();

            $table->unique(['source_user_id', 'target_user_id']);
            $table->foreign('source_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('target_user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('adware');
    }
};
