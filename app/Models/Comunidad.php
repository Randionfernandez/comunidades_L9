<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;

class Comunidad extends Model {

    use HasFactory;
    use SoftDeletes;

    protected $table = 'comunidades';
    protected $dates = ['deleted_at'];   // registramos la nueva columna ¿necesario en laravel 8?
    protected $fillable = [
        'cif',
        'fechalta',
        'activa',
        'gratuita',
        'partes',
        'denom',
        'direccion',
        'localidad',
        'provincia',
        'cp',
        'pais',
        'logo',
        'observaciones',
    ];

    public function propiedades() {
        return $this->hasMany(Propiedad::class);
    }

    public function cuentas() {
        return $this->hasMany(Cuenta::class);
    }

    public function usuarios() {
        return $this->belongsToMany(User::class, 'comunidad_user','comunidad_id','user_id')->withTimestamps();
    }

}
