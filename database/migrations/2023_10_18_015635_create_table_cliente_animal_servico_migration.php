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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 40);
            $table->string('telefone', 20);
            $table->string('email', 80);
            $table->timestamps();
        });

        Schema::create('animais', function (Blueprint $table) {
            $table->id();
            $table->string('animal', 40);
            $table->string('raca', 40);
            $table->timestamps();
        });

        Schema::create('servicos', function (Blueprint $table) {
            $table->id();
            $table->string('observacao', 200)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
        Schema::dropIfExists('animais');
        Schema::dropIfExists('servicos');
    }
};
