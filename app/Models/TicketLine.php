<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketLine extends Model
{
    use HasFactory;

    protected $fillable = ['ticket_id','product_id'];
    //protected $primaryKey = 'id'; //NO ES NECESARIO YA QUE HEMOS SEGUIDO LAS CONVENCIONES DE NOMBRES
    //protected $table = 'manufacturers'; //NO ES NECESARIO YA QUE HEMOS SEGUIDO LAS CONVENCIONES DE NOMBRES
    
    public function ticket(){ //una linea es de un ticket
        return $this->belongsTo(Ticket::class);
    }

    public function product(){ //una linea es de un producto
        return $this->belongsTo(Product::class);
    }

    public function incidence(){ //hasOne para que una linea de ticket solo pueda tener una incidencia
        return $this->hasOne(Incidence::class);
    }

    public function hasIncidence(){ //hasOne para que una linea de ticket solo pueda tener una incidencia
        return $this->hasOne(Incidence::class)->count() > 0;
    }
}
