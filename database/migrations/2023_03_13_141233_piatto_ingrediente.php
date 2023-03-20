<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PiattoIngrediente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('piatto_ingrediente', function (Blueprint $table) {
            
            $table->id();

            
            $table->foreignId('id_piatto')->references('codice_piatto')->on('piatti')
            ->onDelete('restrict')->onUpdate('cascade');
            
            $table->foreignId('id_ingrediente')->references('codice_ingrediente')->on('ingredienti')
            ->onDelete('restrict')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('piatto_ingrediente');
    }
}
