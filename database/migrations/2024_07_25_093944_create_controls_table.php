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
            $table->string('statut')->default('PAS OK');
            $table->unsignedBigInteger('policier_id');
            $table->unsignedBigInteger('equipe_id')->default(1);
            $table->unsignedBigInteger('unite_id');
            $table->string('unite_Ctrl')->nullable();
            $table->foreign('equipe_id')->references('id')->on('equipes');
            $table->foreign('unite_id')->references('id')->on('unites');
            $table->foreign('policier_id')->references('id')->on('policiers');
            $table->dateTime('dateCtrl')->nullable();
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
