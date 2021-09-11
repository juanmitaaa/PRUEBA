<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    //protected $primaryKey = 'id'; //NO ES NECESARIO YA QUE HEMOS SEGUIDO LAS CONVENCIONES DE NOMBRES
    //protected $table = 'manufacturers'; //NO ES NECESARIO YA QUE HEMOS SEGUIDO LAS CONVENCIONES DE NOMBRES
    
    public function incidences() //un rol puede tener muchos usuarios
    {
        return $this->hasMany(Incidence::class);
    }

    

}
