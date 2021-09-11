<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\TicketLine;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::all(); 
       
        return view('ticket.index', [            
            'tickets'=>$tickets            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all()->pluck('designation', 'id'); 
        $customers = Customer::all()->pluck('name', 'id');  
         
        $customer_id = NULL;
        $ticket = NULL;
        return view('ticket.create',  [
            'products'=>$products,            
            'customers'=>$customers,
             
            'customer_id'=>$customer_id,  
            'ticket'=>$ticket
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::user()->can('isAdmin')) {  
            return redirect('/')->with('title_modal', __("Error"))->with('message', __("You do not have enough permissions"));
        }
       
        $validatedData = $request->validate([        
          'seller' => ['required', 'string', 'max:255'],          
          'caja' => ['required', 'string', 'max:255'],
          'product_id' => 'required|array|min:1',   
        ],
        [        
          'seller.required' => __('You must enter a seller'),
          'caja.required' => __('You must enter a cash register'),
          'product_id.required'=>__('You must enter one ticket line')
        ]);
        $data = $request->all();
         //dd($request->all());
        $newTicket = Ticket::create([
            'number' => $data['number'],
            'seller' => $data['seller'],
            'caja' => $data['caja'],
            'purchase_at' => $data['purchase_at'],  
            'customer_id' => $data['customer_id'],
        ]);
        $newTicket->save();
        $lines = $data['product_id'];
        foreach($lines as $product_id){//Almacenar lineas de ticket
            $newLine = TicketLine::create([
                'product_id'=>$product_id,
                'ticket_id'=>$newTicket->id
            ]);
            $newLine->save();
        }

        return redirect()->route('tickets.index')->with('title_modal', __("Success"))->with('message', __('Ticket successfully saved'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
         return $this->edit($ticket);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        if (!Auth::user()->can('isAdmin')) {  
            return redirect('/')->with('title_modal', __("Error"))->with('message', __("You do not have enough permissions"));
        }
        $products = Product::all()->pluck('designation', 'id'); 
        $customers = Customer::all()->pluck('name', 'id'); 
        return view('ticket.edit',[
            'ticket'=>$ticket,
            'products'=>$products,
            'customers'=>$customers,             
            'customer_id'=>$ticket->customer_id,  
            'ticket'=>$ticket         
                         
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        if (!Auth::user()->can('isAdmin')) {  
            return redirect('/')->with('title_modal', __("Error"))->with('message', __("You do not have enough permissions"));
        }
        $oldids = TicketLine::select('product_id')->where('ticket_id',$ticket->id)->pluck('product_id');
        
        $validatedData = $request->validate([        
          'seller' => ['required', 'string', 'max:255'],          
          'caja' => ['required', 'string', 'max:255'],   
        ],
        [        
          'seller.required' => __('You must enter a seller'),
          'caja.required' => __('You must enter a caja'),
        ]);
         
        $data = $request->all();
        $ticket->update([
            'number' => $data['number'],
            'seller' => $data['seller'],
            'caja' => $data['caja'],
            'purchase_at' => $data['purchase_at'],         
            'customer_id' => $data['customer_id'],
        ]);
        $lines = $data['product_id'];

        foreach($lines as $product_id){//Almacenar lineas de ticket
            if (!$oldids->contains($product_id)){//para que no se repita
                $newLine = TicketLine::create([
                    'product_id'=>$product_id,
                    'ticket_id'=>$ticket->id
                ]);
                $newLine->save();
            }
            
            
        }
        $ok = $ticket->save();
        return redirect()->route('tickets.show',['ticket'=>$ticket])->with('title_modal', __("Success"))->with('message', __("Ticket update successfully"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        if (!Auth::user()->can('isAdmin')) {  
            return redirect('/')->with('title_modal', __("Error"))->with('message', __("You do not have enough permissions"));
        }
        if ($ticket->ticketLines->count() == 0){//No se podrá borrar productos que esten en alguna linea
            $ticket->delete();
            
        }
        return response()->json($ticket, 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
          JSON_UNESCAPED_UNICODE); 
    }
}
