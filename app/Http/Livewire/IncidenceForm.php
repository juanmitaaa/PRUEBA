<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Collection;
use App\Models\Customer;
use App\Models\Ticket;
use App\Models\Product;
use App\Models\TicketLine;
class IncidenceForm extends Component
{

    public $tickets = [];
    public $lines = [];
    public $customers;
    public $customer_id;
    public $ticket_id = "";
    public $ticket_line_id = "";
    public $disabledTicket = 'disabled';
    public $disabledProduct = 'disabled';
    public $rowConGarantia = 'hidden';
    public $rowSinGarantia = 'hidden';
    public $rowProduct = 'hidden';
    public $textProduct = '';
    public $mode = 'create';
    
    public function mount($incidence){
        $this->customers = Customer::all()->pluck('name','id');
        if (!empty($incidence)){
            $this->customer_id = $incidence->ticketLine->ticket->customer_id;            
            $this->ticket_id = $incidence->ticketLine->ticket_id;
            $this->ticket_line_id = $incidence->ticket_line_id; 
            $this->tickets = $this->loadTickets();            
            $this->lines = $this->loadLines();
            //$this->emit('select2');
            $this->mode = 'update';
        }

    }
    public function hydrate()
    {
        $this->emit('select2');
    }

    public function render()
    {
        $this->tickets = $this->loadTickets();
        
        $this->lines = $this->loadLines();
        $this->loadSelectLine();
        return view('livewire.incidence-form');
    }

    public function loadTickets(){
        $obj = new \StdClass();
        $obj->id = "0";
        $obj->id = __("Select ticket");
        $tickets = new Collection();
        $this->disabledTicket = 'disabled'; 
        if (!empty($this->customer_id)){    
            $tickets = Ticket::where('customer_id',$this->customer_id)->get();

            $this->disabledTicket = 'custom';
        }   
        //$tickets->prepend($obj);
        return $tickets->pluck('number','id');
    }

    public function loadLines(){
        $obj = new \StdClass();
        $obj->id = "0";
        $obj->designation = __("Select product");
        $lines = new Collection();
        $this->disabledProduct = 'disabled';

        if (!empty($this->ticket_id)){    
            /*dd(TicketLine::select('ticket_lines.id','products.designation')              
              ->join('products', 'products.id', '=', 'ticket_lines.product_id')
              ->where('ticket_id',$this->ticket_id)->toSql());*/
            $lines = TicketLine::select('ticket_lines.id','products.designation')              
              ->join('products', 'products.id', '=', 'ticket_lines.product_id')
              ->where('ticket_id',$this->ticket_id)
              ->get();
            $this->disabledProduct = 'custom';   
                
        } 
        //$lines->prepend($obj);
        return $lines->pluck('designation','id');
    }
    public function loadSelectLine(){
        if(!empty($this->ticket_line_id)){
            $ticketLine = TicketLine::find($this->ticket_line_id);
            $this->rowProduct = 'block';
            $this->textProduct = $ticketLine->product->warranty?__('Product under warranty'):__('Product without warranty');
            if ($ticketLine->product->warranty == 1){//con garantia
                $this->rowConGarantia = 'block';
                $this->rowSinGarantia = 'hidden';
            }
            else{
                $this->rowConGarantia = 'hidden';
                $this->rowSinGarantia = 'block'; 
            }
        }
    }

}
