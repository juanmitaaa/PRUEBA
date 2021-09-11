<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
class ManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manufacturers = Manufacturer::all(); 
       
        return view('manufacturer.index', [            
            'manufacturers'=>$manufacturers            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manufacturer.create',  [
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
          'cif' => ['required', 'string', 'max:255'],   
        ],
        [        
          'name.required' => __('You must enter a name'),
          'cif.required' => __('You must enter a dni'),
        ]);
        $data = $request->all();

        $newManufacturer = Manufacturer::create([
            'name' => $data['name'],
            'cif' => $data['cif'],
            'address' => $data['address'],             
            'email' => $data['email'],
        ]);
        $newManufacturer->save();

        return redirect()->route('manufacturers.index')->with('title_modal', __("Success"))->with('message', __('Manufacturer successfully saved'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function show(Manufacturer $manufacturer)
    {
        return $this->edit($manufacturer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function edit(Manufacturer $manufacturer)
    {
        if (!Auth::user()->can('isAdmin')) {  
            return redirect('/')->with('title_modal', __("Error"))->with('message', __("You do not have enough permissions"));
        }
        return view('manufacturer.edit',[
            'manufacturer'=>$manufacturer,            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manufacturer $manufacturer)
    {
        if (!Auth::user()->can('isAdmin')) {  
            return redirect('/')->with('title_modal', __("Error"))->with('message', __("You do not have enough permissions"));
        }
        
        $validatedData = $request->validate([        
          'name' => ['required', 'string', 'max:255'],          
          'cif' => ['required', 'string', 'max:255'],   
        ],
        [        
          'name.required' => __('You must enter a name'),
          'cif.required' => __('You must enter a cif'),
        ]);
         
        $manufacturer->fill($request->all());
        $ok = $manufacturer->save();
        return redirect()->route('manufacturers.show',['manufacturer'=>$manufacturer])->with('title_modal', __("Success"))->with('message', __("manufacturer update successfully"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manufacturer $manufacturer)
    {
        if (!Auth::user()->can('isAdmin')) {  
            return redirect('/')->with('title_modal', __("Error"))->with('message', __("You do not have enough permissions"));
        }
        if ($manufacturer->products->count() == 0){//No se podrá borrar fabricantes que tengan algún producto
            $manufacturer->delete();
            
        }
        return response()->json($manufacturer, 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
          JSON_UNESCAPED_UNICODE); 
    }
}
