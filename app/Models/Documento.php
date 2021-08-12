<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;

class Documento extends Model {

    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];   // registramos la nueva columna ¿necesario en laravel 8
    protected $fillable = [
        'name',
        'hash_name',
    ];

    public function comunidad() {
        return $this->belongsTo(Comunidad::class);
    }

}
