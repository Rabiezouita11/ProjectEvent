<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table -> string('Nom');
            $table -> string('Location');
            $table -> integer('Nombre_total_abonnés');
            $table -> integer('Prix');
            $table->unsignedBigInteger('categorie_id');
            $table->foreign('categorie_id')->references('id')->on('categories')->onDelete('cascade');
            $table -> string('start_date');
            $table -> string('end_date');
            $table -> string('start_time');
            $table -> string('end_time');
            $table -> longText('Description');
            $table -> string('Image');
            $table -> string('status')->default('ACCEPTED');
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
        Schema::dropIfExists('events');
    }
};
