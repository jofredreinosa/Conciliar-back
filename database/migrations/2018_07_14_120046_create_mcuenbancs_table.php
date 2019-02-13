<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMcuenbancsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mcuenbancs', function (Blueprint $table) {
            
            $table->engine = 'InnoDB';

            $table->increments('id_cuenbanc');
            $table->string('tx_numecuenbanc',20)->unique()->comment('Numero de la cuenta bancaria');
            $table->string('tx_desccuenbanc',100)->comment('Descripcion de la cuenta bancaria');
            $table->string('tx_codicontcuba',20)->comment('Codigo contable de la cuenta bancaria');
            $table->string('tx_tipocuenbanc',20)->comment('Tipo de la cuenta bancaria (AHORRO / CORRIENTE)');
            $table->string('tx_tipobanco',20)->comment('Tipo de Banco al que pertenece la cuenta bancaria (PUBLICO / PRIVADO)');
            $table->string('tx_impucuenta',2)->comment('Identifica si la cuenta tiene algun impuesto (SI / NO)');
            $table->float('nu_porcimpu',6,2)->nullable()->comment('Porcentaje del impuesto');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mcuenbancs');
    }
}
