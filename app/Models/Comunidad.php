<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comunidad extends Model {

    use HasFactory;
    use SoftDeletes;

    protected $table = 'comunidades';

//    protected $guarded = [];
//    protected $hidden= [];
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

//    protected $casts = [
//        'fechalta' => 'datetime:Y-m-d',
//    ];

    /**
     * Función definida en la documentación oficial: Eloquent: Mutators & Casting
     *
     * @param DateTimeInterface $date
     * @return type
     */
//    protected function serializeDate(DateTimeInterface $date){
//        return $date->format('Y-m-d');
//    }

    public function propiedades(): HasMany {
        return $this->hasMany(Propiedad::class);
    }

    public function cuentas(): HasMany {
        return $this->hasMany(Cuenta::class);
    }

    public function proveedores(): BelongsToMany {
        return $this->belongsToMany(Proveedor::class, 'comunidad_proveedor', 'comunidad_id', 'proveedor_id')->withTimestamps();
    }

    public function users(): BelongsToMany {
        return $this->belongsToMany(User::class, 'comunidad_user','comunidad_id', 'user_id')->withTimestamps();
    }

    public function documentos(): HasMany {
        return $this->hasMany(Documento::class);
    }

}
