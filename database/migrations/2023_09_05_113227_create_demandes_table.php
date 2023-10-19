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
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->string('code_demande')->unique();
            $table->string('statut_reponse');
            $table->text('signature');
            $table->foreignId('document_id')
                  ->references('id')
                  ->on('documents')
                  ->onDelete('restrict');
            $table->foreignId('paiement_id')
                  ->references('id')
                  ->on('paiements')
                  ->onDelete('restrict');
            $table->foreignId('reponse_id')
                  ->references('id')
                  ->on('reponses')
                  ->onDelete('restrict');
            $table->foreignId('acte_id')
                  ->references('id')
                  ->on('actes')
                  ->onDelete('restrict');
            $table->foreignId('matiere_id')
                  ->references('id')
                  ->on('matieres')
                  ->onDelete('restrict');
            $table->foreignId('etudiant_id')
                  ->references('id')
                  ->on('etudiants')
                  ->onDelete('restrict');
            $table->foreignId('validation_id')
                  ->references('id')
                  ->on('validations')
                  ->onDelete('restrict');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demandes');
    }
};