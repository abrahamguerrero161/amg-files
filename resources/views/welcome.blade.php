{{--<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <!--<link rel="stylesheet" href="{{ asset('css/app.css') }}">-->
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">    
            
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>

    @php
        $color = 'red'; 
        $alert = 'alert2';  
    @endphp
    
    <body>
        
         <div class="container mx-auto">
            <x-alert :color="$color" message="Hello world" class="mb-4">
                <x-slot name="title">
                    Title 1
                </x-slot>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatibus quos ab autem officiis, sequi id voluptas corporis nemo voluptates. Fuga explicabo consequuntur non similique voluptas delectus perferendis impedit. Harum, minima!
            </x-alert>

             <x-alert2 color="blue" class="mb-4">
                 <x-slot name="title">
                     Titulo de prueba
                 </x-slot>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Labore doloremque eveniet velit neque sit reprehenderit ipsam consectetur. Impedit ipsum animi eius a culpa, alias reprehenderit. Vero perspiciatis dignissimos ut delectus?
             </x-alert2>

 
             <x-dynamic-component :component="$alert">
                <x-slot name="title">
                    Titulo de prueba
                </x-slot>
               Lorem ipsum dolor sit, amet consectetur adipisicing elit. Labore doloremque eveniet velit neque sit reprehenderit ipsam consectetur. Impedit ipsum animi eius a culpa, alias reprehenderit. Vero perspiciatis dignissimos ut delectus?
             </x-dynamic-component>

         </div>   

    </body>

</html> --}}

<x-app-layout>
    <x-home-banner>
        <x-slot name="banner">
            https://www.cmsnextech.com/wp-content/uploads/2022/03/Banner-2.png
        </x-slot>
        <x-slot name="footer_banner">
            All Rights Reserved © 2022 CMS Nextech
        </x-slot>
    </x-home-banner>
</x-app-layout>