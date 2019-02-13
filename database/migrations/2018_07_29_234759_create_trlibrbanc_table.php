<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrlibrbancTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trlibrbanc', function (Blueprint $table) {

            $table->engine = 'InnoDB';
            
            $table->increments('id_trlibrbanc')->comment('Clave primaria de la tabla trlibrbanc');;
            $table->integer('id_cuenbanc')->unsigned()->comment('Columna que hace de llave foranea de la tabla mcuenbanc');
            $table->integer('id_tipotran')->unsigned()->comment('Columna que hace de llave foranea de la tabla mtipotran');
            $table->string('tx_numetran',20)->comment('Numero del documento bancario');
            $table->date('fe_fechtran')->comment('Fecha del documento bancario');
            $table->double('nu_monttran',15,2)->comment('Monto de la transacción');
            $table->double('nu_saldbanc',15,2)->nullable()->comment('Saldo del banco despues de la transaccion');
            $table->unique(['id_cuenbanc', 'id_tipotran','tx_numetran']);
            $table->index('id_cuenbanc','i_trlibrbanc_id_cuenbanc');
            $table->index('id_tipotran','i_trlibrbanc_id_tipotran');

            $table->foreign('id_cuenbanc', 'fk_trlibrbanc_to_mcuenbanc')->references('id_cuenbanc')->on('mcuenbancs')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_tipotran', 'fk_trlibrbanc_to_mtipotran')->references('id_tipotran')->on('mtipotrans')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });

         DB::select("ALTER TABLE trlibrbanc COMMENT = 'Transacciones en libro de bancos'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trlibrbanc', function(Blueprint $table)
        {
            $table->dropForeign('fk_trlibrbanc_to_mcuenbanc');
            $table->dropForeign('fk_trlibrbanc_to_mtipotran');
        });
        
        Schema::dropIfExists('trlibrbanc');
    }
}
