<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight"> {{ __('Customers') }} </h2>
  </x-slot>
  <div class="py-12">
    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8">
        <div>
          <div class="grid grid-cols-1 gap-4">             
            <div class="flex flex-col  border-2 rounded p-3 bg-white">
              <div class="font-semibold text-xl tracking-tight border-b">
                <h3>{{__('Customers')}} <span class="float-right"><a  href="{{ route('dashboard') }}" class="text-indigo-700"> {{ __('Dashboard') }}</a> > {{ __('Customers') }} </span></h3>
              </div>
              <div class="py-5">
                {!! link_to_route('customers.create', __('Add customer'),null,['class'=>'bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded']) !!}
              </div>
               
              <table class="table table-bordered" id="listado-clientes" style="max-width: 100% !important; width: 100% !important">
                <thead>
                  <tr>
                    <th>{{__('Name')}}</th>
                    <th>{{__('Lastname')}}</th>
                    <th>{{__('Phone')}}</th>
                    <th>{{__('Dni')}}</th>
                    <th>{{__('Email')}}</th>
                    <th>{{__('Number of tickets')}}</th>
                    <th>{{__('Created at')}}</th>
                    <th>{{__('Updated at')}}</th>                    
                    <th>{{__('Actions')}}</th>
                  </tr>
                </thead>
                <tbody>     
                         
                @foreach($customers as $i=>$customer)
                <tr>
                  <td> 
                    {!! link_to_route('customers.show', $customer->name,['customer'=>$customer]) !!}
                  </td>
                  <td>{{$customer->lastname}} </td>
                  <td>{{$customer->phone}} </td>
                  <td>{{$customer->dni}} </td>
                  <td>{{$customer->email}} </td>
                  <td>{{$customer->tickets->count()}} </td>
                  <td>{{!empty($customer->created_at)?$customer->created_at:""}}</td>
                  <td>{{!empty($customer->updated_at)?$customer->updated_at:""}}</td>
                  <td> <a href="{{route('customers.edit',['customer'=>$customer])}}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded editar mr-2">  <x-icon name="pencil" class="h-4 w-4 inline"/>
                    </a>
                    @if($customer->tickets->count() == 0)
                    <button value="{{$customer->id}}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded destroy" data-customer="{{$customer->id}}"> <x-icon name="trash" class="h-4 w-4 inline"/>
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
  <script type="text/javascript" src="{{ asset('js/customer.js') }}"></script>
</x-app-layout>