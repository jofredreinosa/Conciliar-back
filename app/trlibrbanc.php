<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class trlibrbanc extends Model
{
    protected $table = 'trlibrbanc';
	public $timestamps = false;
	protected $primaryKey ='id_trlibrbanc';

    protected $fillable = [	'id_cuenbanc',
    					   	'id_tipotran',
    					   	'tx_numetran',
    					   	'fe_fechtran',
    						'nu_monttran',
    						'nu_saldbanc'
    					];

    public function mtipotran()
    {
        return 
        $this->belongsTo('App\mtipotran','id_tipotran','id_tipotran');
    }

    public function mcuenbanc()
    {
        return 
        $this->belongsTo('App\mcuenbanc','id_cuenbanc','id_cuenbanc');
    }

   
}
