<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pais extends Model
{

    use HasFactory;

    protected $table = 'paises';

    protected $keyType = 'string';
    protected $primaryKey = 'codigoISO3';
    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'codigoISO3',
        'codigoISO2',
        'cod_numerico',
        'nombre',
    ];

    public function comunidades(): HasMany
    {
        return $this->hasMany(Comunidad::class, 'pais');
    }

}
