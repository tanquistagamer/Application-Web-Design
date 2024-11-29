<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuperheroesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('superheroes', function (Blueprint $table) {
            $table->id(); // ID automático
            $table->string('real_name'); // Nombre real
            $table->string('hero_name'); // Nombre del superhéroe
            $table->string('photo_url'); // URL de la foto
            $table->text('additional_info')->nullable(); // Información adicional (opcional)
            $table->timestamps(); // Timestamps (created_at y updated_at)
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('superheroes');
    }
}
