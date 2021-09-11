<div class="grid grid-cols-4 gap-4 pt-2">
  <div> {{ Form::label('name',__('Name').':',['class'=>'block font-bold text-sm text-gray-700'])}} </div>
  <div class="col-span-3"> {{Form::text('name', null,['class' => 'form-input rounded-md shadow-sm w-full','maxlength' => 50,'placeholder'=>__('Username'),'required'=>'required'])}} </div>
</div>
<div class="grid grid-cols-4 gap-4 pt-2">
  <div> {{ Form::label('name',__('Email').':',['class'=>'block font-bold text-sm text-gray-700'])}} </div>
  <div class="col-span-3"> {{Form::email('email', null,['class' => 'form-input rounded-md shadow-sm w-full','maxlength' => 50,'placeholder'=>__('Email'),'required'=>'required'])}} </div>
</div>
<div class="grid grid-cols-4 gap-4 pt-2">
  <div> {{ Form::label('role_id',__('Role').':',['class'=>'block font-bold text-sm text-gray-700'])}} </div>
  <div class="col-span-3"> {{ Form::select('role_id',$roles, $role_id, ['class' => 'form-select rounded-md shadow-sm w-full select2','maxlength' => 50,'placeholder'=>__('Seleccionar rol'),'required'=>'required'])}} </div>
</div>