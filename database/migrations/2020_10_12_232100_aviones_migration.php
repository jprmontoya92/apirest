<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AvionesMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aviones', function (Blueprint $table) {
            $table->increments('serie');
            $table->string('modelo');
            $table->float('longitud');
            $table->integer('capacidad');
            $table->integer('velocidad');
            $table->integer('alcance');

            //Añadimos la clave foranea con fabricante. fabricante_id
            //Acordarse de añadir al array protected $fillable del fichero de modelo "Avion.php" la nueva columna
            //protected $fillable= array('modelo','longitud','capacidad','velocidad','alcance','fabricante_id');
            $table->integer('fabricante_id')->unique()->unsigned();

            //indicamos cual es la clave foranea de esta tabla
            $table->foreign('fabricante_id')->references('id')->on('fabricantes');

            // para que tambien cree automaticamente los campos timestamps(created_at, updated_at)
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
        Schema::dropIfExists('aviones');
    }
}
