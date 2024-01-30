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
        Schema::create('perros', function (Blueprint $table) {
            $table->id();
            $table->string('numero')->unique();
            $table->integer('tamano');
            $table->date('fechafactura');
            $table->integer('importotal');
            $table->integer('imp0')->nullable();
            $table->integer('bonificacion')->nullable();
            $table->integer('dueno')->nullable();
            $table->string('color')->nullable();
            $table->integer('raza')->nullable();
            


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perros');
    }
};
