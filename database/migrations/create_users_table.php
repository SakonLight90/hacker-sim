<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('email')->unique()->nullable();
            $table->string('password');
            $table->string('ip_address')->nullable();
            $table->enum('phase', ['1','2','3','4','5'])->default('1');
            $table->integer('money_clean')->default(0);
            $table->integer('money_dirty')->default(0);
            $table->integer('crypto_legal')->default(0);
            $table->integer('crypto_illegal')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
