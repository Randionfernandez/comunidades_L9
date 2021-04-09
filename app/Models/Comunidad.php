<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;

class Comunidad extends Model {

    use HasFactory;
    use SoftDeletes;

    protected $table = 'comunidades';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'cif',
        'fechalta',
        'activa',
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

}
