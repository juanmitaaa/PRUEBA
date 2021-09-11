<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
               <div>
                    <div class="grid grid-cols-3 gap-4">
                       <div><x-dashboard-section link="{{ route('incidences.index') }}" text="{{__('Incidences')}}" type="incidence" icon="inbox" color="bg-purple-300" /></div>                    
                      <div><x-dashboard-section link="{{ route('states.index') }}" text="{{__('States')}}" icon="calculator" color="bg-blue-300" /></div>
                      <div><x-dashboard-section link="{{ route('customers.index') }}" text="{{__('Customers')}}" icon="clipboard" color="bg-green-300"/></div>
                      <div><x-dashboard-section link="{{ route('manufacturers.index') }}" text="{{__('Manufacturers')}}" icon="truck" color="bg-red-300"/></div>
                      <div><x-dashboard-section link="{{ route('products.index') }}" text="{{__('Products')}}" icon="document-report" color="bg-indigo-300" /></div>
                      <div><x-dashboard-section link="{{ route('tickets.index') }}" text="{{__('Tickets')}}" icon="document" color="bg-orange-300" /></div>
                     
                      <div><x-dashboard-section link="{{ route('users.index') }}" text="{{__('Users')}}" type="" icon="user-group" color="bg-purple-300" /></div>                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
