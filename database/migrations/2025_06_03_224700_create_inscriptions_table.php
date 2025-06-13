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
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->integer('etudiant_id');
            $table->integer('cour_id');
            $table->foreign('etudiant_id')->references('etudiant_id')->on('etudiants')->cascadeOnDelete();
            $table->foreign('cour_id')->references('cour_id')->on('cours')->cascadeOnDelete();
            $table->string('paiement')->nullable();
            $table->timestamps();
            $table->primary(['etudiant_id','cour_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscriptions');
    }
};
