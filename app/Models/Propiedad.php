<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Propiedad extends Model {

    use HasFactory;
    use SoftDeletes;

    protected $table = "propiedades";
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'denominacion',
        'parte',
        'coeficiente',
        'domiciliada',
        'iban',
        'tipo',
        'observaciones',
    ];

    public function comunidad() {
        return $this->belongsTo(Comunidad::class);
    }

}