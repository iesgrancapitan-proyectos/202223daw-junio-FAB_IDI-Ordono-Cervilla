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
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable(false);
            $table->string('autor')->nullable(false);
            $table->string('centro')->nullable();
            $table->foreignId('curso_academico_id')->nullable(false)->constrained('cursos_academicos');
            $table->foreignId('tipo_proyecto_id')->nullable(false)->constrained('tipos_proyectos');
            $table->string('descripcion')->nullable(false);
            $table->string('destacado')->nullable(false)->default(false);
            $table->string('disponible')->nullable(false);
            $table->string('url')->nullable();
            $table->string('imagen')->nullable();
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyectos');
    }
};
