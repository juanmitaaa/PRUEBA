<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = ['number','seller','caja','purchase_at','customer_id'];
    //protected $primaryKey = 'id'; //NO ES NECESARIO YA QUE HEMOS SEGUIDO LAS CONVENCIONES DE NOMBRES
    //protected $table = 'manufacturers'; //NO ES NECESARIO YA QUE HEMOS SEGUIDO LAS CONVENCIONES DE NOMBRES
    
    public function ticketLines(){ //un ticket tiene muchas lineas
        return $this->hasMany(TicketLine::class);
    }

    public function customer(){ //una ticket tiene un cliente
        return $this->belongsTo(Customer::class);
    }

    public function setPurchaseAtAttribute( $value ) {
        $odate = \Carbon\Carbon::createFromFormat('d/m/Y', $value);
        if ($odate !== FALSE){
             $this->attributes['purchase_at'] = $odate->format('Y-m-d');
        }
       
    }
    /*public function getPurchaseAtAttribute() {
         
        $result = "";
        $odate = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['purchase_at']);
        if ($odate !== FALSE){
            $result = $odate->format('d/m/Y');
        } 
        return $result;      
    }*/
}
