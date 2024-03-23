<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
//Contenu du fichier de migration

public function up()
{
    Schema::create('matieres', function (Blueprint $table) {
        $table->id();
        $table->string('nom');
        $table->string('description');
        $table->foreignId('module_id')->constrained('modules')->cascadeOnDelete();
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('matieres');
}

};
