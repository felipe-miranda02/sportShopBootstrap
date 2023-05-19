<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Talle
 *
 * @property $id
 * @property $name
 * @property $activo
 * @property $created_at
 * @property $updated_at
 *
 * @property Compra[] $compras
 * @property HistorialCompra[] $historialCompras
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Talle extends Model
{
    
    static $rules = [
		'name' => 'required',
		'activo' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','activo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function compras()
    {
        return $this->hasMany('App\Models\Compra', 'talle_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function historialCompras()
    {
        return $this->hasMany('App\Models\HistorialCompra', 'talle_id', 'id');
    }
    

}
