<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight"> {{ __('Create Products') }} </h2>
  </x-slot>
  <div class="py-12 max-w-8xl mx-auto sm:px-6 lg:px-8"> 
    {!!Form::open(['route'=>'products.store', 'method'=>'POST'])!!}
    <div class="flex flex-col  border-2 rounded p-3 bg-white"> 
       <div class="flex flex-col  border-2 rounded p-3 bg-white"> 
      <div class="font-semibold text-xl tracking-tight border-b">
          <h3>{{__('Products')}} <span class="float-right"><a  href="{{ route('dashboard') }}" class="text-indigo-700"> {{ __('Dashboard') }}</a> > <a  href="{{ route('products.index') }}" class="text-indigo-700">{{ __('Products') }} </a> > {{ __('Create products') }}</span></h3>
        </div>
      @include('manufacturer.form')
      
    </div>
      @include('product.form')
       
    </div>
    <div class="grid grid-cols-12 border-2 mt-4 rounded bg-white p-2">
      <div class="col-span-5">
        <p>&nbsp;</p>
      </div>
      <div class="col-span-3">
        <div> {{Form::button(__('Create'),['type'=>'submit','class'=>'w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm','name'=>'btnBrand','id'=>'btnBrand'])}}
        {!! link_to_route('products.index', __('Cancel'),null,['class'=>'bg-gray-500 hover:bg-gray-800 text-white font-bold py-2 px-4 rounded inline']) !!} </div>
      </div>
      <div class="col-span-4"> </div>
    </div>
    {!!Form::close()!!} </div>
</x-app-layout>