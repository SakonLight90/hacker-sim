<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('software', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->enum('type', [
                'sdk',
                'spam',
                'adware',
                'firewall',
                'antivirus',
                'ip_spoofer',
                'scanner'
            ]);
            $table->integer('level')->default(1);
            $table->timestamps();

            $table->unique(['user_id', 'type']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('software');
    }
};
