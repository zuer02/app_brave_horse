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
        Schema::create('tipo_servicos', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_servico', 20);
            $table->timestamps();
        });

        //add rel com servicos
        Schema::table('servicos', function(Blueprint $table){
            $table->unsignedBigInteger('tipo_servico_id');
            $table->foreign('tipo_servico_id')->references('id')->on('tipo_servicos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('servicos', function(Blueprint $table){
            //remove fk
            $table->dropForeign('servicos_tipo_servico_id_foreign');
            //remove a couluna
            $table->dropColumn('tipo_servico_id'); 
        });
        Schema::dropIfExists('tipo_servicos');
    }
};
