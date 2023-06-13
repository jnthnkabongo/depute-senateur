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
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->bigIncrements('uti_id');
            $table->string('nom_uti');
            $table->string('postnom_uti');
            $table->string('prenom_uti');
            $table->integer('age');
            $table->string('sexe');
            $table->string('sigle');
            $table->string('voix_liste');
            $table->string('voix_Candidat');
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
