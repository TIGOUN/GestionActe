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
        Schema::create('resultat_semestrielles', function (Blueprint $table) {
            $table->id();
            $table->string('annee_academique');
            $table->foreignId('departement_id')
                  ->references('id')
                  ->on('departements')
                  ->onDelete('restrict');
            $table->string('niveau');
            $table->string('session');
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
        Schema::dropIfExists('resultat_semestrielles');
    }
};