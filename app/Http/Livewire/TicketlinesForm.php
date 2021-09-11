<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\TicketLine;
class TicketlinesForm extends Component
{
    public $lines;  
    public $products;  
    public $numlines;
    public $sig_product_id;
    public $ticket_id;
    private $ticket;

    public function mount($ticket){
        $this->lines = [];
        $this->sig_product = 0;
        $this->ticket = $ticket;
        $this->ticket_id = 0;
        if (!empty($ticket)){
            $this->ticket = $ticket;
            $this->ticket_id = $ticket->id;
            $this->loadLines();
        }
         
        $this->numlines = count($this->lines);
        $this->products = Product::all()->pluck('designation','id');
    }
    public function loadLines(){
        $this->lines = [];
        foreach ($this->ticket->ticketLines as $line){//livewire se entiende mejor con arrays
            $newLine = [];  
            $newLine['product_id'] = $line->product_id;
            $newLine['designation'] = $line->product->designation;
            $newLine['hasIncidence'] = $line->hasIncidence();
            $this->lines[] = $newLine;
        }
        
    }
    public function addLine(){
        
        if (!empty($this->sig_product_id)){// && $this->ticket_id == 0 crendo ticket            
            $producto = Product::find($this->sig_product_id);
            $newLine = []; //Ya que puede que el ticket aún esté creado y los ticketlines necesita un ticket_id, liveware se entiende mejor con arrays que con objetos
            $newLine['product_id'] = $producto->id;
            $newLine['designation'] = $producto->designation;
            $newLine['hasIncidence'] = false;
            $this->lines[] = $newLine;
            $this->sig_product_id = 0;//limpiar form
        }
        
        
        
    }
    public function render()
    {
        return view('livewire.ticketlines-form');
    }
}
