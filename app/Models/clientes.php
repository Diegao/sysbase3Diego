<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes;
 use Illuminate\Database\Eloquent\Factories\HasFactory;

class clientes extends Model
{

    use SoftDeletes;
    use HasFactory;

    public $table = 'soporte_clientes';

    public $fillable = [
        'nombres',
        'apeliidos',
        'dpi',
        'telefono',
        'direccion',
        'correo'
    ];

    protected $casts = [
        'nombres' => 'string',
        'apeliidos' => 'string',
        'dpi' => 'string',
        'telefono' => 'string',
        'direccion' => 'string',
        'correo' => 'string'
    ];

    public static $rules = [
        'nombres' => 'required|string|max:255',
        'apeliidos' => 'required|string|max:255',
        'dpi' => 'required|string|max:13',
        'telefono' => 'required|string|max:20',
        'direccion' => 'nullable|string|max:255',
        'correo' => 'nullable|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public static $messages = [

    ];

    public function soporteEquipos(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(\App\Models\equipo::class, 'soporte_equipo_has_cliente');
    }

    public function soporteServicios(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\servicios::class, 'cliente_id');
    }
}
