<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidence extends Model
{
    use HasFactory;

    protected $fillable = ['warranty_period','components','complete_products','reason','repair_cost','state_id','ticket_line_id'];
    //protected $primaryKey = 'id'; //NO ES NECESARIO YA QUE HEMOS SEGUIDO LAS CONVENCIONES DE NOMBRES
    //protected $table = 'incidences'; //NO ES NECESARIO YA QUE HEMOS SEGUIDO LAS CONVENCIONES DE NOMBRES
    
    public function state(){ //una incidencia tiene un estado
        return $this->belongsTo(State::class);
    }

    public function ticketLine(){ //una incidencia es sobre un linea de ticketener
        return $this->belongsTo(TicketLine::class);
    }
    public function hasProductWarranty(){
        
    }
}
