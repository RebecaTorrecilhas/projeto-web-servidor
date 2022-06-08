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
        Schema::create('seguidores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("seg_id_usuario");
            $table->unsignedBigInteger("seg_id_seguindo");
            $table->timestamps();

            $table->foreign("seg_id_usuario")->references("id")->on("usuarios")->onDelete("cascade");
            $table->foreign("seg_id_seguindo")->references("id")->on("usuarios")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('seguidores');
    }
};
