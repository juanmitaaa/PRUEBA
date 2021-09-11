<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name','lastname','phone','dni','email'];
    //protected $primaryKey = 'id'; //NO ES NECESARIO YA QUE HEMOS SEGUIDO LAS CONVENCIONES DE NOMBRES
    //protected $table = 'customers'; //NO ES NECESARIO YA QUE HEMOS SEGUIDO LAS CONVENCIONES DE NOMBRES
    
    public function tickets(){ //un cliente puede tener muchos tickets
        return $this->hasMany(Ticket::class);
    }
   
}
