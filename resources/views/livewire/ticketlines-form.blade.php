<div>
  @foreach($lines as $i=>$line)

  <div class="grid grid-cols-4 gap-4 pt-2">
    <div class="grid grid-cols-4 gap-4 pt-2">
        <div> {{ Form::label('product_id',__('Product').':',['class'=>'block font-bold text-sm text-gray-700'])}} </div>
        <div class="col-span-2"> {{Form::hidden('product_id[]', $line['product_id'],['id'=>"product_id$i"]) }}  {{$line['designation']}} </div>
        <div>@if($line['hasIncidence']) {{__('Has incidence')}}@endif </div>
    </div>
  </div>
  @endforeach
  <div class="grid grid-cols-4 gap-4 pt-2" id="siguientelinea">
    <div> {{ Form::label('product_id',__('Product').':',['class'=>'block font-bold text-sm text-gray-700'])}} </div>
    <div class="col-span-2" wire:ignore> {{ Form::select('sig_product',$products, null, ['class' => 'form-select rounded-md shadow-sm w-full select2 sig_producto','maxlength' => 50,'placeholder'=>__('Select product'),"id"=>"product_id$numlines",])}} </div>
    <div>
       <button type="button" value="" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded " wire:click="addLine"> <x-icon name="plus-circle" class="h-4 w-4 inline" />
       </button>
    </div>
  </div>
</div>
<script type="text/javascript">
    
    $(document).ready(function () {
        $(document).on('change','.sig_producto',function(e){
            @this.set('sig_product_id',$(this).val());
        });
       
    });
</script>