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
        Schema::create('teach', function (Blueprint $table) {
            $table->id();
            $table->name();
            $table->img();
            $table->direction();
            $table->telegram();
            $table->instegram();
            $table->fasebook();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teach');
    }
};
