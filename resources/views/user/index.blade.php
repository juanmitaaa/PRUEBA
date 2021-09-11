<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight"> {{ __('Users') }} </h2>
  </x-slot>
  <div class="py-12">
    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8">
        <div>
          <div class="grid grid-cols-1 gap-4">             
            <div class="flex flex-col  border-2 rounded p-3 bg-white">
              <div class="font-semibold text-xl tracking-tight border-b">
                <h3>{{__('Users')}}  <span class="float-right"><a  href="{{ route('dashboard') }}" class="text-indigo-700"> {{ __('Dashboard') }}</a> > {{ __('Users') }} </span></h3>
              </div>
              <div class="py-5">
                {!! link_to_route('users.create', __('Add user'),null,['class'=>'bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded']) !!}
              </div>
              <table class="table table-bordered" id="listado-usuarios" style="max-width: 100% !important; width: 100% !important">
                <thead>
                  <tr>
                    <th>{{__('Name')}}</th>
                    <th>{{__('Email')}}</th>
                    <th>{{__('Created at')}}</th>
                    <th>{{__('Updated at')}}</th>
                    <th>{{__('Role')}}</th>
                    <th>{{__('Actions')}}</th>
                  </tr>
                </thead>
                <tbody>                
                @foreach($users as $i=>$user)
                <tr>
                  <td>@if($user->id != 1)
                    {!! link_to_route('users.show', $user->name,['user'=>$user]) !!}
                    @else
                    {{$user->name}}
                    @endif </td>
                  <td>{{$user->email}} </td>
                  <td>{{!empty($user->created_at)?$user->created_at:""}}</td>
                  <td>{{!empty($user->updated_at)?$user->updated_at:""}}</td>
                  <td>{{$user->roleFirst()->description}}</td>                  
                  <td> @if($user->id != 1)<a href="{{route('users.edit',['user'=>$user])}}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded editar mr-2">  <x-icon name="pencil" class="h-4 w-4 inline"/>
                    </a>
                    <button value="{{$user->id}}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded destroy" data-user="{{$user->id}}"> <x-icon name="trash" class="h-4 w-4 inline"/>
                    </button> @endif </td>
                </tr>
                @endforeach
                </tbody>
                
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="{{ asset('js/user.js') }}"></script>
</x-app-layout>