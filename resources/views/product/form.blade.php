
<div class="grid grid-cols-4 gap-4 pt-2">
  <div> {{ Form::label('ean',__('EAN').':',['class'=>'block font-bold text-sm text-gray-700'])}} </div>
  <div class="col-span-3"> {{Form::text('ean', null,['class' => 'form-input rounded-md shadow-sm w-full','maxlength' => 50,'placeholder'=>__('EAN'),'required'=>'required'])}} </div>
</div>
<div class="grid grid-cols-4 gap-4 pt-2">
  <div> {{ Form::label('designation',__('Designation').':',['class'=>'block font-bold text-sm text-gray-700'])}} </div>
  <div class="col-span-3"> {{Form::text('designation', null,['class' => 'form-input rounded-md shadow-sm w-full','maxlength' => 50,'placeholder'=>__('Designation'),'required'=>'required'])}} </div>
</div>
<div class="grid grid-cols-4 gap-4 pt-2">
  <div> {{ Form::label('price',__('Price').':',['class'=>'block font-bold text-sm text-gray-700'])}} </div>
  <div class="col-span-3"> {{Form::text('price', null,['class' => 'form-input rounded-md shadow-sm w-full','maxlength' => 50,'placeholder'=>__('Price'),'required'=>'required'])}} </div>
</div>
<div class="grid grid-cols-4 gap-4 pt-2">
  <div> {{ Form::label(',
    "Warranty":"Garantía"',__('Manufacturer').':',['class'=>'block font-bold text-sm text-gray-700'])}} </div>
  <div class="col-span-3"> {{ Form::select('manufacturer_id',$manufacturers, $manufacturer_id, ['class' => 'form-select rounded-md shadow-sm w-full select2','maxlength' => 50,'placeholder'=>__('Select manufacturer'),'required'=>'required'])}} </div>
</div>
<div class="grid grid-cols-4 gap-4 pt-2">
  <div> {{ Form::label('warranty',__('Warranty').':',['class'=>'block font-bold text-sm text-gray-700'])}} </div>
  <div class="col-span-3">  
    {{Form::checkbox('warranty',1,$warranty_checked,['id'=>'warranty'])}}
   </div>
</div>
