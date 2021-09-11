<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    use HasFactory; 
    protected $table = 'roles_users';
    protected $fillable = ['user_id','rol_id'];

    public function rol(){ 
        return $this->belongsTo(Role::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
