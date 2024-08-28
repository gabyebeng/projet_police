<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('controls', function (Blueprint $table) {
            $table->id();
            $table->string('matricule');
            $table->string('nom');
            $table->string('grade');
            $table->string('unite_id');
            $table->string('province');
            $table->string('statut')->default('PAS OK');
            $table->dateTime('dateCtrl')->nullable();
            $table->string('unite_Ctrl')->nullable();
            $table->unsignedBigInteger('equipe_id')->default(1);
            $table->foreign('equipe_id')->references('id')->on('equipes');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('controls');
    }
};
