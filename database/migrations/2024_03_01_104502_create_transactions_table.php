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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('devise');
            $table->float('change');
            $table->float('taux');
            $table->string('lieu');
            $table->date('date');
            $table->string('destination');
            $table->string('expediteur');
            $table->integer('contact_expediteur');
            $table->string('destinataire');
            $table->integer('contact_destinataire');
            $table->float('montant_envoye_depart');
            $table->float('montant_envoye_cfa');
            $table->float('frais_envoie');
            $table->float('montant_recupere');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
