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
        Schema::create('reparations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('description');
            $table->enum('statut', ['en attente', 'en cours', 'terminée']);
            $table->date('date_debut')->nullable();
            $table->date('date_fin')->nullable();
            $table->text('notes_mecanicien')->nullable();
            $table->text('notes_client')->nullable();
            $table->unsignedBigInteger('id_mecanicien');
            $table->foreign('id_mecanicien')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
            $table->unsignedBigInteger('id_vehicule');
            $table->timestamps();

            $table->foreign('id_vehicule')
                  ->references('id')
                  ->on('vehicules')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reparations');
    }
};
