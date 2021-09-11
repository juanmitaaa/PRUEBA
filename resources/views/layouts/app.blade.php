<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <link rel="icon" href="{{ asset('favicon.ico') }}">

        <link href="{{ asset('vendor/select2/select2.min.css')}}" rel="stylesheet" />    
        <link href="{{ asset('vendor/DataTables/DataTables-1.10.24/css/jquery.dataTables.min.css')}}" rel="stylesheet" />   
        <link href="{{ asset('vendor/DataTables/Buttons-1.7.0/css/buttons.dataTables.min.css')}}" rel="stylesheet" />  
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/jquery-ui/jquery-ui.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/jquery-ui/jquery-ui.structure.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/jquery-ui/jquery-ui.theme.min.css') }}"> 
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/chosen/css/chosen.min.css') }}">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css" >

        <script src="{{ asset('vendor/jquery/jquery.min.js')}}"></script>   
        <script src="{{ asset('vendor/moment/moment.min.js')}}"></script>   

        <script src="{{ asset('vendor/select2/select2.min.js')}}"></script> 
        <script src="{{ asset('vendor/DataTables/DataTables-1.10.24/js/jquery.dataTables.min.js')}}"></script> 
        <script src="{{ asset('vendor/DataTables/Buttons-1.7.0/js/dataTables.buttons.min.js')}}"></script> 
         
        <script src="{{ asset('vendor/DataTables/Select-1.3.3/js/dataTables.select.min.js')}}"></script> 
        
        <script src="{{ asset('vendor/DataTables/render/datetime.js')}}"></script>   
        <script src="{{ asset('vendor/DataTables/sorting/datetime-moment.js')}}"></script>       

        <script src="{{ asset('vendor/jquery-ui/jquery-ui.min.js')}}"></script>
        <script src="{{ asset('vendor/chosen/js/chosen.jquery.min.js')}}"></script> 
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 py-6 px-4">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
        <script type="text/javascript">
            var _token = "{{ csrf_token() }}";
            var current_language = "{{App::currentLocale()}}"; 
            var baseurl = "{{ url('/') }}";
            var baseurl2 = baseurl.replace("index.php","");
            baseurl = baseurl.replace("public//","public/");
            baseurl2 = baseurl2.replace("public//","public/");
            var jsurl = "{{ asset('js') }}";
            var langDatatable = baseurl2+"/js/"+current_language+".json";
        </script>
        <script src="{{ asset('js/custom.js') }}"></script>
        <footer class="sticky-footer">
            <div class="my-auto">
              <div class="copyright text-center my-auto">
                <span>Proyecto Fin Grado UNIR © Juan Manuel Medina Romero {{date("Y")}}</span>
              </div>
            </div>
        </footer>  
        @include('layouts.message')
        <script type="text/javascript">
            var showmessage = "{{empty($message) && !$errors->any() && empty(session('message'))?0:1}}";
            var errors = "{{$errors}}";
            console.log(errors);
        </script>      
    </body>
</html>
