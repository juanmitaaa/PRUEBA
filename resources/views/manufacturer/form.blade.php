<div class="grid grid-cols-4 gap-4 pt-2"> 
  <div> {{ Form::label('name',__('Name').':',['class'=>'block font-bold text-sm text-gray-700'])}} </div>
  <div class="col-span-3"> {{Form::text('name', null,['class' => 'form-input rounded-md shadow-sm w-full','maxlength' => 50,'placeholder'=>__('Name'),'required'=>'required'])}} </div>
</div>
<div class="grid grid-cols-4 gap-4 pt-2">
  <div> {{ Form::label('cif',__('cif').':',['class'=>'block font-bold text-sm text-gray-700'])}} </div>
  <div class="col-span-3"> {{Form::text('cif', null,['class' => 'form-input rounded-md shadow-sm w-full','maxlength' => 50,'placeholder'=>__('cif'),'required'=>'required'])}} </div>
</div>
<div class="grid grid-cols-4 gap-4 pt-2">
  <div> {{ Form::label('address',__('address').':',['class'=>'block font-bold text-sm text-gray-700'])}} </div>
  <div class="col-span-3"> {{Form::text('address', null,['class' => 'form-input rounded-md shadow-sm w-full','maxlength' => 50,'placeholder'=>__('address'),'required'=>'required'])}} </div>
</div>
<div class="grid grid-cols-4 gap-4 pt-2">
  <div> {{ Form::label('email',__('Email').':',['class'=>'block font-bold text-sm text-gray-700'])}} </div>
  <div class="col-span-3"> {{Form::email('email', null,['class' => 'form-input rounded-md shadow-sm w-full','maxlength' => 50,'placeholder'=>__('Email'),'required'=>'required'])}} </div>
</div>