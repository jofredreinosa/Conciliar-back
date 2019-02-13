<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mtipotran extends Model
{
    protected $table = 'mtipotrans';
	public $timestamps = false;
	protected $primaryKey ='id_tipotran';

    protected $fillable = ['tx_coditipotran', 'tx_desctipotran', 'tx_sumaoresta',
							'tx_estadotiptran'];

	public function mcuenbanc()
    {
        return 
        $this->
        belongsToMany('App\mcuenbanc','trlibrbanc','id_tipotran','id_cuenbanc');
    }
}
