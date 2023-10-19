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
        Schema::create('actes', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('nom')->unique();
            // $table->integer('prix')->nullable();
            $table->unsignedBigInteger('acte_parent_id')->nullable();
            $table->foreign('acte_parent_id')->references('id')->on('actes')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actes');
    }
};