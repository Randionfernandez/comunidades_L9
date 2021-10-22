<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;

class Documento extends Model {

    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'model',
        'carpeta',
        'titulo',
        'descripcion',
        'name',
        'hash_name',
    ];

    public function comunidad() {
        return $this->belongsTo(Comunidad::class);
    }

}
