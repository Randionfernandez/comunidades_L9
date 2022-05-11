<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comunidad_User extends Model {

    use HasFactory;
    use SoftDeletes;

    protected $table = 'comunidad_user';
//    protected $guard_name='web';

    protected $fillable = [
        'comunidad_id',
        'user_id',
        'role_name'   //  comprobar que es necesario en este modelo
        ];
}     