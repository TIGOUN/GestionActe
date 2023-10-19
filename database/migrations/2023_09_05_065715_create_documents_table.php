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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('copie_acte_naissance');
            $table->string('copie_fiche_preinscription')->nullable();
            $table->string('copie_carte_etudiant')->nullable();
            $table->string('certificat_de_perte')->nullable();
            $table->string('copie_acte_perdu')->nullable();
            $table->string('copie_quittance_frais_soutenance')->nullable();
            $table->string('originale_quitus')->nullable();
            $table->string('programmation_de_la_soutenance')->nullable();
            $table->string('piece_suscite')->nullable();
            $table->string('original_acte_certifie')->nullable();
            $table->string('copie_acte_certifie')->nullable();
            $table->string('copie_photo_identite')->nullable();
            $table->string('originale_attestation')->nullable();
            $table->string('copie_des_releves_notes')->nullable();
            $table->text('copie_releve_1')->nullable();
            $table->text('copie_releve_2')->nullable();
            $table->text('copie_releve_3')->nullable();
            $table->text('copie_releve_4')->nullable();
            $table->text('copie_releve_5')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};