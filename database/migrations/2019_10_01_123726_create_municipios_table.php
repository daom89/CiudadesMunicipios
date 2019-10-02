<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMunicipiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipios', function (Blueprint $table) {
            $table->integer('id')->primary()->unsigned();
            $table->string('Nombre',90);
            $table->integer('Departamento')->unsigned();
            $table->string('Acortado',40)->nullable();
            $table->enum('Estado',['Activo','Inactivo']);
            $table->timestamps();
            $table->foreign('Departamento')
                ->references('id')
                ->on('departamentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('municipios');
    }
}
