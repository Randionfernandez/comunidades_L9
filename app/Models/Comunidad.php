<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;

class Comunidad extends Model {

    use HasFactory;
    use SoftDeletes;

    protected $table = 'comunidades';

//    protected $guarded = [];
//    protedcted $hidden= [];
    protected $fillable = [
        'cif',
        'fechalta',
        'denom',
//        'activa',
//        'gratuita',
        'partes',
        'email',
        'direccion',
        'cp',
        'municipio',
        'localidad',
        'provincia',
        'pais',
        'logo',
        'observaciones',
        'presidente',
        'secretario',
        'administrador',
    ];

    public function propiedades() {
        return $this->hasMany(Propiedad::class);
    }

    public function cuentas() {
        return $this->hasMany(Cuenta::class);
    }

    public function proveedores() {
        return $this->belongsToMany(Proveedor::class, 'comunidad_proveedor', 'comunidad_id', 'proveedor_id')->withTimestamps();
    }

    public function usuarios() {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function documentos() {
        return $this->hasMany(Documento::class);
    }

}
