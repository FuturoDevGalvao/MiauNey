@extends('layouts.auth')

@section('content')
    <div class="min-w-[100%] flex flex-col gap-3 max-w-4xl px-4 lg:px-8 sticky top-0 backdrop-blur-sm bg-white/95 z-20">
        <div class="flex flex-wrap items-center gap-4">
            <img class="w-16 sm:w-20 lg:w-24 rounded-full"
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
    <div class="mt-16 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4 p-4">
        <div
            class="rounded-xl relative bg-red-100  text-white shadow-2xl transition-transform transform hover:scale-110 overflow-hidden w-auto h-auto">
            <img class="absolute object-cover w-full h-full" src="https://i.imgur.com/kGkSg1v.png" alt="Card background" />

            <div class="relative w-full h-full px-8 py-4">
                <!-- Header -->
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm font-light">Name</p>
                        <p class="font-medium tracking-widest">Karthik P</p>
                    </div>
                    <img class="w-14 h-14" src="https://i.imgur.com/bbPHJVe.png" alt="Card logo" />
                </div>

                <!-- Card Number -->
                <div class="mt-6">
                    <p class="text-sm font-light">Card Number</p>
                    <p class="font-medium tracking-widest text-lg">4642 3489 9867 7632</p>
                </div>

                <!-- Footer -->
                <div class="mt-6 flex justify-between">
                    <div>
                        <p class="text-xs font-light">Valid</p>
                        <p class="font-medium tracking-wider text-sm">11/15</p>
                    </div>
                    <div>
                        <p class="text-xs font-light">Expiry</p>
                        <p class="font-medium tracking-wider text-sm">03/25</p>
                    </div>
                    <div>
                        <p class="text-xs font-light">CVV</p>
                        <p class="font-bold tracking-wider text-sm">···</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
