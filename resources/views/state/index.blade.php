<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight"> {{ __('States') }} </h2>
  </x-slot>
  <div class="py-12">
    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8">
        <div>
          <div class="grid grid-cols-1 gap-4">             
            <div class="flex flex-col  border-2 rounded p-3 bg-white">
              <div class="font-semibold text-xl tracking-tight border-b">
                <h3>{{__('States')}} <span class="float-right"><a  href="{{ route('dashboard') }}" class="text-indigo-700"> {{ __('Dashboard') }}</a> > {{ __('States') }} </span></h3>
              </div>
              <div class="py-5">
                {!! link_to_route('states.create', __('Add state'),null,['class'=>'bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded']) !!}
              </div>
              <table class="table table-bordered" id="listado-estados" style="max-width: 100% !important; width: 100% !important">
                <thead>
                  <tr>
                    <th>{{__('Name')}}</th> 
                    <th>{{__('Number of incidents')}}</th>                    
                    <th>{{__('Created at')}}</th>
                    <th>{{__('Updated at')}}</th> 
                    <th>{{__('Actions')}}</th>
                  </tr>
                </thead>
                <tbody>                
                @foreach($states as $i=>$state)
                <tr>
                  <td> 
                    {!! link_to_route('states.show', $state->name,['state'=>$state]) !!}
                  </td>
                  <td>{{$state->incidences->count()}}</td>
                  <td>{{!empty($state->created_at)?$state->created_at:""}}</td>
                  <td>{{!empty($state->updated_at)?$state->updated_at:""}}</td>
                                   
                  <td> <a href="{{route('states.edit',['state'=>$state])}}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded editar mr-2">  <x-icon name="pencil" class="h-4 w-4 inline"/>
                    </a>
                    @if($state->incidences->count() == 0)
                    <button value="{{$state->id}}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded destroy" data-state="{{$state->id}}"> <x-icon name="trash" class="h-4 w-4 inline"/>
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
  <script type="text/javascript" src="{{ asset('js/state.js') }}"></script>
</x-app-layout>