@extends('layouts.auth')

@section('content')
    <div class="min-w-[100%] flex flex-col gap-3 max-w-4xl px-4 lg:px-8">
        <div class="flex flex-wrap items-center gap-4">
            <img class="w-16 sm:w-20 lg:w-24 rounded-full"
                src="https://i.pinimg.com/originals/39/02/a5/3902a5069854d277c0c0af28cadfbd71.gif" alt="Imagem de exemplo">
            <div>
                <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold">
                    Minhas reservas
                </h1>

                @php
                    $routes = [
                        ['name' => 'Home', 'uri' => route('root')],
                        ['name' => 'Reservas', 'uri' => '#'],
                        ['name' => 'Minhas reservas', 'uri' => route('money-reserves.index')],
                    ];

                @endphp
                <x-breadcrumb :routes="$routes"></x-breadcrumb>
            </div>
        </div>
    </div>
    <!-- Card Section -->
    <div class="min-w-[100%] max-w-4xl px-4 py-8 sm:px-6 lg:px-8 lg:py-10 mx-auto">


    </div>

    <!-- End Card Section -->
@endsection
