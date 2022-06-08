<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('avaliacoes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("ava_id_usuario");
            $table->unsignedBigInteger("ava_id_filme");
            $table->integer("ava_avaliacao");
            $table->string("ava_comentario");
            $table->timestamps();

            $table->foreign("ava_id_usuario")->references("id")->on("usuarios")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('avaliacoes');
    }
};
