<div class="grid grid-cols-4 gap-4 pt-2">
  <div> {{ Form::label('number',__('Ticket Number').':',['class'=>'block font-bold text-sm text-gray-700'])}} </div>
  <div class="col-span-3"> {{Form::text('number', null,['class' => 'form-input rounded-md shadow-sm w-full','maxlength' => 50,'placeholder'=>__('Ticket number'),'required'=>'required'])}} </div>
</div>
<div class="grid grid-cols-4 gap-4 pt-2">
  <div> {{ Form::label('seller',__('Seller').':',['class'=>'block font-bold text-sm text-gray-700'])}} </div>
  <div class="col-span-3"> {{Form::text('seller', null,['class' => 'form-input rounded-md shadow-sm w-full','maxlength' => 50,'placeholder'=>__('Seller'),'required'=>'required'])}} </div>
</div>
<div class="grid grid-cols-4 gap-4 pt-2">
  <div> {{ Form::label('caja',__('Cash register').':',['class'=>'block font-bold text-sm text-gray-700'])}} </div>
  <div class="col-span-3"> {{Form::text('caja', null,['class' => 'form-input rounded-md shadow-sm w-full','maxlength' => 50,'placeholder'=>__('Cash Register'),'required'=>'required'])}} </div>
</div>
<div class="grid grid-cols-4 gap-4 pt-2">
  <div> {{ Form::label('pursache_at',__('Purchase at').':',['class'=>'block font-bold text-sm text-gray-700'])}} </div>
  <div class="col-span-3"> {{Form::text('purchase_at', null,['class' => 'form-input rounded-md shadow-sm w-full datepicker','maxlength' => 50,'placeholder'=>__('Purchase at'),'required'=>'required','id'=>'purchase_at'])}} </div>
</div>
<div class="grid grid-cols-4 gap-4 pt-2">
  <div> {{ Form::label('customer_id',__('Customer').':',['class'=>'block font-bold text-sm text-gray-700'])}} </div>
  <div class="col-span-3"> {{ Form::select('customer_id',$customers, $customer_id, ['class' => 'form-select rounded-md shadow-sm w-full select2','maxlength' => 50,'placeholder'=>__('Select customer'),'required'=>'required'])}} </div>
</div>


<div class="flex flex-col  border-2 rounded mt-3 p-3 bg-white"> 
  <div class="font-semibold text-xl tracking-tight "><h4>{{__('Lineas')}}</h4></div>
  <livewire:ticketlines-form :ticket="$ticket"/>
</div>

