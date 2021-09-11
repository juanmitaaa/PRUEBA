<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['ean','designation','price','warranty','manufacturer_id'];
    //protected $primaryKey = 'id'; //NO ES NECESARIO YA QUE HEMOS SEGUIDO LAS CONVENCIONES DE NOMBRES
    //protected $table = 'manufacturers'; //NO ES NECESARIO YA QUE HEMOS SEGUIDO LAS CONVENCIONES DE NOMBRES
    
    public function ticket_lines(){ //una producto puede estar en muchos lineas de ticket
        return $this->hasMany(TicketLine::class);
    }

    public function manufacturer(){ //una producto tiene un fabricante
        return $this->belongsTo(Manufacturer::class);
    }

    
    
}
