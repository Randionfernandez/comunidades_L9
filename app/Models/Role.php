<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model {

    use HasFactory;

    protected $fillable = [
        'role',
        'descripcion',
        'activo',
    ];

    public function usuarios() {
        return $this->belongsToMany(Comunidad_User::class, 'comunidad_user','user_id','comunidad_id')->withTimestamps();
    }
}
