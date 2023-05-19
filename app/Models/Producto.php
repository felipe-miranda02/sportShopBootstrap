<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 *
 * @property $id
 * @property $name
 * @property $descripcion
 * @property $URLimagen
 * @property $precio
 * @property $activo
 * @property $tipo_id
 * @property $marca_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Compra[] $compras
 * @property HistorialCompra[] $historialCompras
 * @property Marca $marca
 * @property Tipo $tipo
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Producto extends Model
{
    
    static $rules = [
		'name' => 'required',
		'descripcion' => 'required',
		'URLimagen' => 'required',
		'precio' => 'required',
		'activo' => 'required',
		'tipo_id' => 'required',
		'marca_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','descripcion','URLimagen','precio','activo','tipo_id','marca_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function compras()
    {
        return $this->hasMany('App\Models\Compra', 'producto_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function historialCompras()
    {
        return $this->hasMany('App\Models\HistorialCompra', 'producto_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function marca()
    {
        return $this->hasOne('App\Models\Marca', 'id', 'marca_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipo()
    {
        return $this->hasOne('App\Models\Tipo', 'id', 'tipo_id');
    }
    

}
