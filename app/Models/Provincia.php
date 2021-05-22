<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'codigo',
        'nombre',
    ];

    public function localidades()
    {
        return $this->hasMany(Localidad::class);
    }
}
