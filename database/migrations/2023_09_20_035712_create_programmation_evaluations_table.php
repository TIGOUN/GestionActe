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
        Schema::create('programmation_evaluations', function (Blueprint $table) {
            $table->id();
            $table->string('session');
            $table->date('date_debut');
            $table->string('classe');
            $table->date('date_fin');
            $table->string('fichier');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programmation_evaluations');
    }
};