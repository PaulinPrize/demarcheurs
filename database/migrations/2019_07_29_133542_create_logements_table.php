<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('texte');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('region_id');
            $table->unsignedBigInteger('user_id')->default(0);
            $table->string('prix')->nullable();
            $table->string('commission')->nullable();
            $table->string('frais_de_visite')->nullable();
            // le pseudonyme de celui qui poste le logement
            $table->string('pseudo');
            // Email de celui qui poste le logement
            $table->string('email');
            // Date limite de la publication
            $table->date('limit');
            // Etat actif de l’annonce (si elle a été acceptée)
            $table->boolean('active')->default(false);
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('region_id')->references('id')->on('regions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logements');
    }
}
