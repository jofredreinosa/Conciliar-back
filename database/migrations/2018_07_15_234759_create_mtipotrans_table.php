<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMtipotransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mtipotrans', function (Blueprint $table) {

            $table->engine = 'InnoDB';
            
            $table->increments('id_tipotran');
            $table->string('tx_coditipotran',3)->unique()->comment('Código del tipo de transacción');
            $table->string('tx_desctipotran',100)->comment('Descripcion del tipo de transacción');
            $table->string('tx_sumaoresta',1)->comment('Indica si el tipo de transacción suma o resta al saldo de la cuenta (+ / -)');
            $table->string('tx_estadotiptran',20)->comment('Estado de la transacción (ACTIVO / INACTIVO)');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mtipotrans');
    }
}
