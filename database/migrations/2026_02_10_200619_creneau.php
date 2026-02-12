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
         Schema::create('creneau', function (Blueprint $table) {
            $table->id();
            $table->time('heureDebut');
            $table->time('heureFin');
            $table->foreignId('id-horairesServices')->references('id')->on('horairesServices');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
