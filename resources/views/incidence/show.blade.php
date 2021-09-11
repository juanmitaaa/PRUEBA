<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight"> {{ __('Edit incidence') }} {{$incidence->name}} </h2>
  </x-slot>
  <div class="py-12 max-w-8xl mx-auto sm:px-6 lg:px-8"> 
    <div class="flex flex-col  border-2 rounded p-3 bg-white"> 
       <div class="font-semibold text-xl tracking-tight border-b">
        <h3>{{__('Incidences')}} <span class="float-right"><a  href="{{ route('dashboard') }}" class="text-indigo-700"> {{ __('Dashboard') }}</a> > <a  href="{{ route('incidences.index') }}" class="text-indigo-700">{{ __('Incidences') }} </a> > {{ __('State incidence') }}</span></h3>
      </div>
      <div class="grid grid-cols-4 gap-4 pt-2">
        <div> {{ Form::label('customer_id',__('Customer').':',['class'=>'block font-bold text-sm text-gray-700'])}} </div>
        <div class="col-span-3"><span class="block font-bold text-sm text-gray-700"> {{$incidence->ticketLine->ticket->customer->name}}</span> </div>
      </div>
      <div class="grid grid-cols-4 gap-4 pt-2">
        <div> {{ Form::label('ticket_id',__('Ticket').':',['class'=>'block font-bold text-sm text-gray-700'])}} </div>
        <div class="col-span-3"> <span class="block font-bold text-sm text-gray-700">{{$incidence->ticketLine->ticket->id}}</span> </div>
      </div>
      <div class="grid grid-cols-4 gap-4 pt-2">
        <div>{{ Form::label('ticket_line_id',__('Product').':',['class'=>'block font-bold text-sm text-gray-700'])}} </div>
        <div class="col-span-3"><span class="block font-bold text-sm text-gray-700"> {{$incidence->ticketLine->product->designation}}</span> </div>
      </div>
      <div class="grid grid-cols-4 gap-4 pt-2 ">
       <div>{{ Form::label('ticket_line_id',__('State').':',['class'=>'block font-bold text-sm text-gray-700'])}} </div>
        <div class="col-span-3"><span class="block font-bold text-sm text-gray-700">{{$incidence->state->name}}</span> </div>
      </div>
      <div class="grid grid-cols-4 gap-4 pt-2 ">
        <div>{{ Form::label('ticket_line_id',__('Product under warranty').':',['class'=>'block font-bold text-sm text-gray-700'])}} </div>
        <div class="col-span-3"><span class="block font-bold text-sm text-gray-700">{{$incidence->ticketLine->product->warranty==1?__('Yes'):__('No')}} </span></div>
      </div>

      <div class="grid grid-cols-4 gap-4 pt-2 {{$rowConGarantia}}">
        <div> {{ Form::label('warranty_period',__('Warranty period').':',['class'=>'block font-bold text-sm text-gray-700'])}} </div>
        <div class="col-span-3"><span class="block font-bold text-sm text-gray-700"> {{$incidence->warranty_period}}</span> </div>
      </div>
      <div class="grid grid-cols-4 gap-4 pt-2 {{$rowConGarantia}}">
        <div> {{ Form::label('warranty_period',__('Components').':',['class'=>'block font-bold text-sm text-gray-700'])}} </div>
        <div class="col-span-3"><span class="block font-bold text-sm text-gray-700"> {{$incidence->components}}</span> </div>
      </div>
      <div class="grid grid-cols-4 gap-4 pt-2 {{$rowConGarantia}}">
        <div> {{ Form::label('warranty_period',__('Complete products').':',['class'=>'block font-bold text-sm text-gray-700'])}} </div>
        <div class="col-span-3"><span class="block font-bold text-sm text-gray-700"> {{$incidence->complete_products==1?__('Yes'):__('No')}}</span>  </div>
      </div>
      <div class="grid grid-cols-4 gap-4 pt-2 {{$rowSinGarantia}}">
        <div> {{ Form::label('reason',__('Reason').':',['class'=>'block font-bold text-sm text-gray-700'])}} </div>
        <div class="col-span-3"><span class="block font-bold text-sm text-gray-700"> {{$incidence->reason}} </span></div>
      </div>
      <div class="grid grid-cols-4 gap-4 pt-2 {{$rowSinGarantia}}">
        <div> {{ Form::label('repair_cost',__('Repair cost').':',['class'=>'block font-bold text-sm text-gray-700'])}} </div>
        <div class="col-span-3"><span class="block font-bold text-sm text-gray-700"> {{$incidence->repair_cost}}</span> </div>
      </div>
       
    </div>
     {!!Form::open(['route'=>'incidences.changestate', 'method'=>'POST'])!!}
      <div class="flex flex-col  border-2 rounded p-3 bg-white"> 
        {{Form::hidden('incidence_id', $incidence->id,['id'=>"incidence_id"]) }}
        <div class="grid grid-cols-4 gap-4 pt-2">
          <div> {{ Form::label('state_id',__('State').':',['class'=>'block font-bold text-sm text-gray-700'])}} </div>
          <div class="col-span-2"> {{ Form::select('state_id',$states, $incidence->state_id, ['class' => 'form-select rounded-md shadow-sm w-full select2','maxlength' => 50,'placeholder'=>__('Select state'),'required'=>'required'])}} </div>
           <div class="col-span">{{Form::button(__('Change State'),['type'=>'submit','class'=>'w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm','name'=>'btnBrand','id'=>'btnBrand'])}}</div>

        </div>
        
    </div>
     {!!Form::close()!!}
    @if($incidence->state_id == 5)
     {!!Form::open(['route'=>'incidences.notifycustomer', 'method'=>'POST'])!!}
      <div class="flex flex-col  border-2 rounded p-3 bg-white">  
        {{Form::hidden('incidence_id', $incidence->id,['id'=>"incidence_id2"]) }}      
        <div class="grid grid-cols-4 gap-4 pt-2">
        <div> {{ Form::label('state_id',__('State').':',['class'=>'block font-bold text-sm text-gray-700'])}} </div>
        <div class="col-span-2"> {{$incidence->state->name}} </div>
         <div class="col-span">{{Form::button(__('Notify customer'),['type'=>'submit','class'=>'w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm','name'=>'btnBrand','id'=>'btnBrand'])}}</div>
      </div>      
    </div>
     {!!Form::close()!!}
    @endif
    <div class="grid grid-cols-12 border-2 mt-4 rounded bg-white p-2">
      <div class="col-span-5">
        <p>&nbsp;</p>
      </div>
      <div class="col-span-3">
        <div> 
        {!! link_to_route('incidences.index', __('Cancel'),null,['class'=>'bg-gray-500 hover:bg-gray-800 text-white font-bold py-2 px-4 rounded inline']) !!} </div>
      </div>
      <div class="col-span-4"> </div>
    </div>
    
  </div>
    <script type="text/javascript" src="{{ asset('js/incidence.js') }}"></script>
</x-app-layout>