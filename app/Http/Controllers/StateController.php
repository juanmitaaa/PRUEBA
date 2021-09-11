<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = State::all(); 
       
        return view('state.index', [            
            'states'=>$states            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('state.create',  [
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
          'name' => ['required', 'string', 'max:255', 'unique:states'],          

        ],
        [        
          'name.required' => __('You must enter a state'),
          
        ]);
        $data = $request->all();

        $newState = State::create([
            'name' => $data['name'],
        ]);
        $newState->save();

        return redirect()->route('states.index')->with('title_modal', __("Success"))->with('message', __('State successfully saved'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function show(State $state)
    {
        return $this->edit($state);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function edit(State $state)
    {
        if (!Auth::user()->can('isAdmin')) {  
            return redirect('/')->with('title_modal', __("Error"))->with('message', __("You do not have enough permissions"));
        }
        return view('state.edit',[
            'state'=>$state,            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, State $state)
    {
        if (!Auth::user()->can('isAdmin')) {  
            return redirect('/')->with('title_modal', __("Error"))->with('message', __("You do not have enough permissions"));
        }
        
        $validatedData = $request->validate([        
          'name' => ['required', 'string', 'max:255'],              
        ],
        [        
          'name.required' => __('You must enter a sate'),
          
        ]);
        $state->fill($request->all());
        $ok = $state->save();
        return redirect()->route('states.show',['state'=>$state])->with('title_modal', __("Success"))->with('message', __("State update successfully"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state)
    {
        if (!Auth::user()->can('isAdmin')) {  
            return redirect('/')->with('title_modal', __("Error"))->with('message', __("You do not have enough permissions"));
        }
        if ($state->incidences->count() == 0){//No se podrá borrar estados que tengan alguna incidencia
            $state->delete();
            
        }
        return response()->json($state, 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
          JSON_UNESCAPED_UNICODE); 
    }
}
