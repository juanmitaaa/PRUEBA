<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all(); 
       
        return view('customer.index', [            
            'customers'=>$customers            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create',  [
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
          'name' => ['required', 'string', 'max:255'],          
          'dni' => ['required', 'string', 'max:255'],   
        ],
        [        
          'name.required' => __('You must enter a name'),
          'dni.required' => __('You must enter a dni'),
        ]);
        $data = $request->all();

        $newCustomer = Customer::create([
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'phone' => $data['phone'],
            'dni' => $data['dni'],
            'email' => $data['email'],
        ]);
        $newCustomer->save();

        return redirect()->route('customers.index')->with('title_modal', __("Success"))->with('message', __('Customer successfully saved'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return $this->edit($customer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        if (!Auth::user()->can('isAdmin')) {  
            return redirect('/')->with('title_modal', __("Error"))->with('message', __("You do not have enough permissions"));
        }
        return view('customer.edit',[
            'customer'=>$customer,            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        if (!Auth::user()->can('isAdmin')) {  
            return redirect('/')->with('title_modal', __("Error"))->with('message', __("You do not have enough permissions"));
        }
        
        $validatedData = $request->validate([        
          'name' => ['required', 'string', 'max:255'],          
          'dni' => ['required', 'string', 'max:255'],   
        ],
        [        
          'name.required' => __('You must enter a name'),
          'dni.required' => __('You must enter a dni'),
        ]);
         
        $customer->fill($request->all());
        $ok = $customer->save();
        return redirect()->route('customers.show',['customer'=>$customer])->with('title_modal', __("Success"))->with('message', __("Customer update successfully"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        if (!Auth::user()->can('isAdmin')) {  
            return redirect('/')->with('title_modal', __("Error"))->with('message', __("You do not have enough permissions"));
        }
        if ($customer->tickets->count() == 0){//No se podrá borrar clientes que tengan algún ticket
            $customer->delete();
            
        }
        return response()->json($customer, 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
          JSON_UNESCAPED_UNICODE); 
    }
}
