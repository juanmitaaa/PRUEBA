<div>
    <div class="grid grid-cols-4 gap-4 pt-2" wire:ignore>
      <div> {{ Form::label('customer_id',__('Customer').':',['class'=>'block font-bold text-sm text-gray-700'])}} </div>
      <div class="col-span-3"> {{ Form::select('customer_id',$customers, $customer_id, ['class' => 'form-select rounded-md shadow-sm w-full select2','maxlength' => 50,'placeholder'=>__('Select customer'),'required'=>'required','id'=>'customer_id'])}} </div>
    </div>
    <div class="grid grid-cols-4 gap-4 pt-2">
      <div> {{ Form::label('ticket_id',__('Ticket').':',['class'=>'block font-bold text-sm text-gray-700'])}} </div>
      <div class="col-span-3"> {{ Form::select('ticket_id',$tickets, $ticket_id, ['class' => 'form-select rounded-md shadow-sm w-full','maxlength' => 50,'placeholder'=>__('Select ticket'),'required'=>'required','id'=>'ticket_id'])}} </div>
    </div>
    <div class="grid grid-cols-4 gap-4 pt-2">
      <div>{{ Form::label('ticket_line_id',__('Ticket Line').':',['class'=>'block font-bold text-sm text-gray-700'])}} </div>
      <div class="col-span-3"> {{ Form::select('ticket_line_id',$lines, $ticket_line_id, ['class' => 'form-select rounded-md shadow-sm w-full','maxlength' => 50,'placeholder'=>__('Select product'),'required'=>'required','id'=>'ticket_line_id'])}} </div>
    </div>
    <div class="grid grid-cols-1 gap-4 pt-2 {{$rowProduct}} ">
        <span class="block font-bold text-sm text-gray-700">{{$textProduct}}</span>
    </div>
    <div class="grid grid-cols-4 gap-4 pt-2 {{$rowConGarantia}}">
      <div> {{ Form::label('warranty_period',__('Warranty period').':',['class'=>'block font-bold text-sm text-gray-700'])}} </div>
      <div class="col-span-3"> {{Form::text('warranty_period', null,['class' => 'form-input rounded-md shadow-sm w-full','maxlength' => 50,'placeholder'=>__('Warranty period')])}} </div>
    </div>
    <div class="grid grid-cols-4 gap-4 pt-2 {{$rowConGarantia}}">
      <div> {{ Form::label('warranty_period',__('Components').':',['class'=>'block font-bold text-sm text-gray-700'])}} </div>
      <div class="col-span-3"> {{Form::text('components', null,['class' => 'form-input rounded-md shadow-sm w-full','maxlength' => 50,'placeholder'=>__('Components')])}} </div>
    </div>
    <div class="grid grid-cols-4 gap-4 pt-2 {{$rowConGarantia}}">
      <div> {{ Form::label('warranty_period',__('Complete products').':',['class'=>'block font-bold text-sm text-gray-700'])}} </div>
      <div class="col-span-3"> {{Form::radio('complete_products', 1,true,['class'=>'form-radio'])}} {{__('Yes')}} {{Form::radio('complete_products', 0,false,['class'=>'form-radio'])}} {{__('No')}}  </div>
    </div>
    <div class="grid grid-cols-4 gap-4 pt-2 {{$rowSinGarantia}}">
      <div> {{ Form::label('reason',__('Reason').':',['class'=>'block font-bold text-sm text-gray-700'])}} </div>
      <div class="col-span-3"> {{Form::text('reason', null,['class' => 'form-input rounded-md shadow-sm w-full','maxlength' => 50,'placeholder'=>__('Reason')])}} </div>
    </div>
    <div class="grid grid-cols-4 gap-4 pt-2 {{$rowSinGarantia}}">
      <div> {{ Form::label('repair_cost',__('Repair cost').':',['class'=>'block font-bold text-sm text-gray-700'])}} </div>
      <div class="col-span-3"> {{Form::text('repair_cost', null,['class' => 'form-input rounded-md shadow-sm w-full','maxlength' => 50,'placeholder'=>__('Repair cost')])}} </div>
    </div>
    
</div>

<script type="text/javascript">   
    var sticket = "{{__('Select ticket')}}"; 
    var sproduct = "{{__('Select product')}}";
    var mode = "{{$mode}}"; 
    $(document).ready(function () {
        $(document).on('change','#customer_id',function(e){
            @this.set('customer_id',$(this).val());
        });

        $(document).on('change','#ticket_id',function(e){
            var ticket_id = @this.get('ticket_id');
            
            if (e.target.value != ticket_id){
                @this.set('ticket_id',$(this).val());    
            }
        });

        $(document).on('change','#ticket_line_id',function(e){
            var ticket_line_id = @this.get('ticket_line_id');
            if (e.target.value != ticket_line_id){
                @this.set('ticket_line_id',$(this).val());    
            }
            
        });


        window.markTicket=()=>{ //se pierde la opción marcada al renderizar             
            var ticket_id = @this.get('ticket_id');            
            if (ticket_id != ""){
                $('#ticket_id').val(ticket_id).trigger('change');
            }               
        }
        window.markTicketLine=()=>{ //se pierde la opción marcada al renderizar             
            var ticket_line_id = @this.get('ticket_line_id');            
            if (ticket_line_id != ""){
               $('#ticket_line_id').val(ticket_line_id).trigger('change');
            }               
        }
        window.initSelectSecundarios=()=>{
            if (mode == 'create'){
                $('#ticket_id').select2({
                placeholder: sticket,
                allowClear: true});

                $('#ticket_line_id').select2({
                    placeholder: sproduct,
                    allowClear: true});
            }
            
        }
        initSelectSecundarios();
        markTicket(); 
        markTicketLine(); 
        window.livewire.on('select2',()=>{ //cuando se renderiza el componente los select2 hay que volver a "pintarlos"
           
            initSelectSecundarios();
            markTicket(); 
            markTicketLine(); 
            
        });


       
    });
</script>
