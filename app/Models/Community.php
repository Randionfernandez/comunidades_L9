<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    use HasFactory;
    
    protected $table = 'comunidades';
    
    protected $guarded = ['id', 'updated_at', 'created_at', 'delete_at'];
    
    public function getRouteKeyName() {
        return 'id';
    }
    public function propietary() {
        return $this->belongsTo('usuario');
    }
    public function contar(){
    	$numero=$this->count('id');
    	//select('id')->distinct('id')->
    	return $numero;
    }
     /*public function usuarios() {
        return $this->belongsToMany(User::class, 'comunidad_user','comunidad_id','user_id')->withTimestamps();
    }*/
}