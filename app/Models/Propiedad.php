<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Propiedad extends Model {

    use HasFactory;
    use SoftDeletes;

    protected $table = "propiedades";
    protected $fillable = [
        'denominacion',
        'user_id',
        'parte',
        'coeficiente',
        'domiciliada',
        'iban',
        'bic',
        'tipo',
        'valor_catastral',
        'observaciones',
    ];

    public function comunidad() {
        return $this->belongsTo(Comunidad::class);
    }
    
    public function user() {
        return $this->belongsTo(User::class);
    }

}