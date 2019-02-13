<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mcuenbanc extends Model
{
	protected $table = 'mcuenbancs';
	public $timestamps = false;
	protected $primaryKey ='id_cuenbanc';

    protected $fillable = ['tx_numecuenbanc', 'tx_desccuenbanc', 'tx_codicontcuba',
							'tx_tipocuenbanc', 'tx_tipobanco', 'tx_impucuenta',
							'nu_porcimpu'];

	public function mtipotran()
    {
        return 
        $this->
        belongsToMany('App\mtipotran','trlibrbanc','id_cuenbanc','id_tipotran');
    }

     public function scopeBusquedaGeneral($query, $texto) {
        //$this->arrDPA = $arrDPA;
        return $query->orWhere( function ($query) use ($texto) {
            $query->where('id_cuenbanc', 'like', '%'.$texto.'%')
            ->orWhere('tx_desccuenbanc', 'like', '%'.$texto.'%')
            ->orWhere('tx_tipocuenbanc', 'like', '%'.$texto.'%')
            ->orWhere('tx_numecuenbanc', 'like', '%'.$texto.'%');
        });
    }

    /**
     * Local Scope que permite ordenar querys por diferentes columnas
     * 
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param $columnaOrden string columna sobre la cual se debe ordenar
     * @param $ordenDireccion string indica la dirección de ordenamiento
     * @return \Illuminate\Database\Eloquent\Builder
     */
            
    public function scopeOrderByColumn($query, $columnaOrden = 'id_cuenbanc', $ordenDireccion = 'asc'){
    	if(empty($columnaOrden))
    	{
    		$orderBy = 'id_cuenbanc';
    	}
    	if(empty($ordenDireccion))
    	{
    		$ordenDireccion = 'desc';
    	}
        switch($columnaOrden){
            case 'id_cuenbanc':
                $orderBy = 'id_cuenbanc';
                break;
            case 'tx_desccuenbanc':
                $orderBy = 'tx_desccuenbanc';
                break;
            case 'tx_tipocuenbanc':
                $orderBy = 'tx_tipocuenbanc';
                break;
            case 'tx_numecuenbanc':
                $orderBy = 'tx_numecuenbanc';
                break;
        }

        return $query->orderBy($orderBy, $ordenDireccion);
    }
}
