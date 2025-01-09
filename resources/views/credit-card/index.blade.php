@extends('layouts.auth')

@section('content')
    <div class="border min-w-[100%] flex flex-col gap-3 max-w-4xl px-4 lg:px-8">
        <div class="flex flex-wrap items-center gap-4">
            <img class="w-16 sm:w-20 lg:w-24 rounded-full border-2 border-pink-400"
                src="https://i.pinimg.com/originals/39/02/a5/3902a5069854d277c0c0af28cadfbd71.gif" alt="Imagem de exemplo">
            <div>
                <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold">
                    Meus cartões
                </h1>

                @php
                    $routes = [
                        ['name' => 'Home', 'uri' => route('root')],
                        ['name' => 'Cartões', 'uri' => '#'],
                        ['name' => 'Meus cartões', 'uri' => route('credit-cards.index')],
                    ];

                @endphp
                <x-breadcrumb :routes="$routes"></x-breadcrumb>
            </div>
        </div>
    </div>
    <!-- Card Section -->
    <x-credit-card></x-credit-card>


    <!-- End Card Section -->
@endsection
