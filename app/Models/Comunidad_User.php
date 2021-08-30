<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comunidad_User extends Model {

    use HasFactory;
    use SoftDeletes;
    use \Spatie\Permission\Traits\HasRoles;

    protected $table = 'comunidad_user';
    protected $guard_name='web';

    protected $fillable = [
        'comunidad_id',
        'user_id',
    ];
}     