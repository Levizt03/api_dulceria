<?php

use Facade\Ignition\Tabs\Tab;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_empleados')
                    ->constrained('empleados')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreignId('id_cliente')
                    ->constrained('clientes')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreignId('id_producto')
                    ->constrained('productos')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreignId('id_promocion')
                    ->nullable()
                    ->constrained('promocions')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->integer('total');
            $table->date('fecha');
            $table->string('pelicula');
            $table->integer('sala');
            $table->integer('butaca');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
