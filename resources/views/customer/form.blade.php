<div class="grid grid-cols-4 gap-4 pt-2">
  <div> {{ Form::label('name',__('Name').':',['class'=>'block font-bold text-sm text-gray-700'])}} </div>
  <div class="col-span-3"> {{Form::text('name', null,['class' => 'form-input rounded-md shadow-sm w-full','maxlength' => 50,'placeholder'=>__('Name'),'required'=>'required'])}} </div>
</div>
<div class="grid grid-cols-4 gap-4 pt-2">
  <div> {{ Form::label('lastname',__('Lastname').':',['class'=>'block font-bold text-sm text-gray-700'])}} </div>
  <div class="col-span-3"> {{Form::text('lastname', null,['class' => 'form-input rounded-md shadow-sm w-full','maxlength' => 50,'placeholder'=>__('Lastname'),'required'=>'required'])}} </div>
</div>
<div class="grid grid-cols-4 gap-4 pt-2">
  <div> {{ Form::label('phone',__('Phone').':',['class'=>'block font-bold text-sm text-gray-700'])}} </div>
  <div class="col-span-3"> {{Form::text('phone', null,['class' => 'form-input rounded-md shadow-sm w-full','maxlength' => 50,'placeholder'=>__('Phone'),'required'=>'required'])}} </div>
</div>
<div class="grid grid-cols-4 gap-4 pt-2">
  <div> {{ Form::label('dni',__('Dni').':',['class'=>'block font-bold text-sm text-gray-700'])}} </div>
  <div class="col-span-3"> {{Form::text('dni', null,['class' => 'form-input rounded-md shadow-sm w-full','maxlength' => 50,'placeholder'=>__('Dni'),'required'=>'required'])}} </div>
</div>  
<div class="grid grid-cols-4 gap-4 pt-2">
  <div> {{ Form::label('name',__('Email').':',['class'=>'block font-bold text-sm text-gray-700'])}} </div>
  <div class="col-span-3"> {{Form::email('email', null,['class' => 'form-input rounded-md shadow-sm w-full','maxlength' => 50,'placeholder'=>__('Email'),'required'=>'required'])}} </div>
</div> 