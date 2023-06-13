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
        Schema::create('parlements', function(Blueprint $table){

            $table->id();
            $table->string('province');
            $table->string('circonscription');
            $table->string('sigle');
            $table->string('voix_liste');
            $table->string('nom');
            $table->string('postnom');
            $table->string('prenom');
            $table->string('fonction');
            $table->string('sexe');
            $table->string('age');
            $table->string('voix_candidat');
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
