<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
// use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
//use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable {

    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
//    use HasRoles;
    use TwoFactorAuthenticatable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'apellidos',
        'fechalta',
        'email',
        'password',
        'tratamiento',
        'tipo',
        'doi',
        'telefono1',
        'telefono2',
        'direccion',
        'cp',
        'municipio',
        'localidad',
        'pais',
        'comentario',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function comunidades(): BelongsToMany {
        return $this->belongsToMany(Comunidad::class, 'comunidad_user', 'user_id', 'comunidad_id')->withPivot('role_name')->withTimestamps();
    }

    public function propiedades(): HasMany {
        return $this->hasMany(Propiedad::class);
    }
    // Instalado paquete Spatie/laravel-permission que es incompatible con el método roles().
    // Tampoco puede haber una propiedad role o roles en este modelo ni en la tabla correspondiente de la B.D.
    // Lo mismo sucede con las propiedades permission, permissions, y el método permissions()
//    public function roles() {
//        return $this->belongsToMany(Role::class, 'comunidad_user', 'user_id', 'role_id')->withTimestamps();
//    }

}
