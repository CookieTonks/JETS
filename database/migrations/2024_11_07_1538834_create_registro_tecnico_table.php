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
        Schema::create('resgitro_tecnicos', function (Blueprint $table) {
            $table->id();
            $table->string('tecnico')->nullable();
            $table->string('maquina')->nullable();
            $table->string('ot')->nullable();
            $table->string('date')->nullable();
            $table->string('cantidad')->nullable();
            $table->string('tiempo')->nullable();
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
        Schema::dropIfExists('resgitro_tecnicos');
    }
};
