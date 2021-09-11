<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all(); 
       
        return view('user.index', [            
            'users'=>$users            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all()->pluck('description', 'id'); 
         
        $role_id = NULL;
        return view('user.create',  [
            'roles'=>$roles,            
            'role_id'=>$role_id,
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
          'name' => ['required', 'string', 'max:255', 'unique:users'],
          'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
          'password' => ['required', 'string', 'min:8'], 
          'role_id' => ['required', 'numeric','not_in:0']

        ],
        [        
          'name.required' => __('You must enter a name'),
          
        ]);
        $data = $request->all();      

        $newUser = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            
        ]);

        $newUser->roles()->attach($data['role_id']);
        $newUser->save();

        return redirect()->route('users.index')->with('title_modal', __("Success"))->with('message', __('User successfully saved'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
         return $this->edit($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if (!Auth::user()->can('isAdmin')) {  
            return redirect('/')->with('title_modal', __("Error"))->with('message', __("You do not have enough permissions"));
        }
        $roles = Role::all()->pluck('description', 'id');          
        $role_id = $user->roleFirst()->id;
         
        
        return view('user.edit',[
            'user'=>$user,
            'roles'=>$roles,
            'role_id'=>$role_id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if (!Auth::user()->can('isAdmin')) {  
            return redirect('/')->with('title_modal', __("Error"))->with('message', __("You do not have enough permissions"));
        }
        


        if (isset($request->canchange)){
            $validatedData = $request->validate([        
              'name' => ['required', 'string', 'max:255'],
              //'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
              'password' => ['required', 'string', 'min:8'], 
              'role_id' => ['required', 'numeric','not_in:0']
            ],
            [        
              'name.required' => __('You must enter a name'),
              
            ]);
            $user->fill($request->except('password'));
            $user->password = Hash::make($request->password);
        }
        else{

            $validatedData = $request->validate([        
              'name' => ['required', 'string', 'max:255'],               
              'role_id' => ['required', 'numeric','not_in:0']
            ],
            [        
              'name.required' => __('You must enter a name'),
              
            ]);
            
            $user->fill($request->except('password'));
           

        }
        
        if(!empty($user->roleFirst())){
            $user->roles()->detach($user->roleFirst()->id);
        }
        $user->roles()->attach($request->role_id);
        
        $ok = $user->save();
        
        
         
        return redirect()->route('users.show',['user'=>$user])->with('title_modal', __("Success"))->with('message', __("User update successfully"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (!Auth::user()->can('isAdmin')) {  
            return redirect('/')->with('title_modal', __("Error"))->with('message', __("You do not have enough permissions"));
        }
        if ($user->id != 1){
            
            $user->roles()->detach($user->roleFirst()->id);
            $user->delete();
            
        }       
        
        //return redirect()->route('users.index')->with('title_modal', __("Success"))->with('message', __("User delete successfully"));
         return response()->json($user, 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
          JSON_UNESCAPED_UNICODE); 
    }
}
