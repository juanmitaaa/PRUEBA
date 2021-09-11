<?php

namespace App\Http\Controllers;

use App\Models\Incidence;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Ticket;
use App\Models\State;
use App\Mail\StateChangeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
class IncidenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $incidences = Incidence::all(); 
       
        return view('incidence.index', [            
            'incidences'=>$incidences            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $incidence = NULL;
        return view('incidence.create',  [  

            
            'incidence'=>$incidence
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
          'ticket_line_id' => ['required'],         
           
        ],
        [        
          'ticket_line_id.required' => __('You must select a product'),          
        ]);
        $data = $request->all();
         //dd($request->all());
        $newIncidence = Incidence::create([
            'ticket_line_id' => $data['ticket_line_id'],
            'warranty_period' => $data['warranty_period'],
            'components' => $data['components'],  
            'complete_products' => $data['complete_products'],
            'reason' => $data['reason'],
            'repair_cost' => $data['repair_cost'],
            'state_id'=>'1'//Estado inicial.
        ]);
        $newIncidence->save();
        return redirect()->route('incidences.index')->with('title_modal', __("Success"))->with('message', __('Incidence successfully saved'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Incidence  $incidence
     * @return \Illuminate\Http\Response
     */
    public function show(Incidence $incidence)
    {
        return $this->edit($ticket);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Incidence  $incidence
     * @return \Illuminate\Http\Response
     */
    public function edit(Incidence $incidence)
    {
        
        return view('incidence.edit',  [             
            'incidence'=>$incidence
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Incidence  $incidence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Incidence $incidence)
    {
        if (!Auth::user()->can('isAdmin')) {  
            return redirect('/')->with('title_modal', __("Error"))->with('message', __("You do not have enough permissions"));
        }
       
        $validatedData = $request->validate([        
          'ticket_line_id' => ['required'],         
           
        ],
        [        
          'ticket_line_id.required' => __('You must select a product'),          
        ]);
        $data = $request->all();
         //dd($request->all());
        $incidence->update([
            'ticket_line_id' => $data['ticket_line_id'],
            'warranty_period' => $data['warranty_period'],
            'components' => $data['components'],  
            'complete_products' => $data['complete_products'],
            'reason' => $data['reason'],
            'repair_cost' => $data['repair_cost'],
            //'state_id'=>'5'//Estado inicial.
        ]);
        $incidence->save();
        return redirect()->route('incidences.index')->with('title_modal', __("Success"))->with('message', __('Incidence successfully updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Incidence  $incidence
     * @return \Illuminate\Http\Response
     */
    public function destroy(Incidence $incidence)
    {
         if (!Auth::user()->can('isAdmin')) {  
            return redirect('/')->with('title_modal', __("Error"))->with('message', __("You do not have enough permissions"));
        }
         
        $incidence->delete();
            
         
        return response()->json($incidence, 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
          JSON_UNESCAPED_UNICODE); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Incidence  $incidence
     * @return \Illuminate\Http\Response
     */
    public function showState(Incidence $incidence)
    {

        $states = State::all()->pluck('name','id'); 
        $rowConGarantia = 'hidden';
        $rowSinGarantia = 'hidden';
        if ($incidence->ticketLine->product->warranty == 1){//con garantia
            $rowConGarantia = 'block';
            $rowSinGarantia = 'hidden';
        }
        else{
            $rowConGarantia = 'hidden';
            $rowSinGarantia = 'block'; 
        }
        return view('incidence.show',  [             
            'incidence'=>$incidence,
            'rowConGarantia'=>$rowConGarantia,
            'rowSinGarantia'=>$rowSinGarantia,
            'states'=>$states,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Incidence  $incidence
     * @return \Illuminate\Http\Response
     */
    public function changeState(Request $request)
    {              
        
        $incidence = Incidence::find($request->incidence_id);
        $data = $request->all();
        $data['state_id'];


         //dd($request->all());
        $incidence->update([
            'state_id' => $data['state_id'],
            
        ]);
        $incidence->save();
        return redirect()->route('incidences.index')->with('title_modal', __("Success"))->with('message', __('Incidence successfully updated'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Incidence  $incidence
     * @return \Illuminate\Http\Response
     */
    public function notifyCustomer(Request $request)
    {  
        $incidence = Incidence::find($request->incidence_id);
        $email = $incidence->ticketLine->ticket->customer->email;  
      
        Mail::to($email)->send(new StateChangeMail($incidence));
        return redirect()->route('incidences.index')->with('title_modal', __("Success"))->with('message', __('Notify send to customer'));
    }
    
}
