<div class="grid grid-cols-4 gap-4 pt-2">
  <div> {{ Form::label('name',__('Name').':',['class'=>'block font-bold text-sm text-gray-700'])}} </div>
  <div class="col-span-3"> {{Form::text('name', null,['class' => 'form-input rounded-md shadow-sm w-full','maxlength' => 50,'placeholder'=>__('Name'),'required'=>'required'])}} </div>
</div>
