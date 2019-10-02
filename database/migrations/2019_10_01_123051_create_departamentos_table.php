<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departamentos', function (Blueprint $table) {
            $table->integer('id')->primary()->unsigned();
            $table->string('Nombre',90);
            $table->enum('Region', ['Caribe', 'Centro Oriente', 'Centro Sur', 'Eje Cafetero - Antioquia', 'Llano', 'Pacífico']);
            $table->enum('Estado',['Activo','Inactivo']);
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
        Schema::dropIfExists('departamentos');
    }
}
