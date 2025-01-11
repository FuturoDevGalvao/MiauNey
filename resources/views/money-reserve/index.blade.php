@extends('layouts.auth')

@section('content')
    @php
        $routes = [
            ['name' => 'Home', 'uri' => route('root')],
            ['name' => 'Reservas', 'uri' => '#'],
            ['name' => 'Minhas reservas', 'uri' => route('money-reserves.index')],
        ];

    @endphp

    <x-header :resource="'Minhas reservas'" :routesForBreadcrumb="$routes" :imagePath="'https://i.pinimg.com/originals/39/02/a5/3902a5069854d277c0c0af28cadfbd71.gif'"></x-header>

    <!-- Card Section -->
    <div class="min-w-[100%] max-w-4xl px-4 py-8 sm:px-6 lg:px-8 lg:py-10 mx-auto">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-4">
            @forelse ($allMoneyReserves as $moneyReserve)
                <a class="group flex flex-col focus:outline-none"
                    href="{{ route('money-reserves.show', [$moneyReserve->id]) }}">
                    <div class="aspect-w-16 aspect-h-12 bg-gray-100 rounded-2xl dark:bg-neutral-800 overflow-hidden">
                        <img class="w-full h-full object-cover rounded-2xl group-hover:scale-105 group-focus:scale-105 transition-transform duration-500 ease-in-out"
                            src="{{ asset('storage/' . $moneyReserve['image_path']) }}" alt="Blog Image">
                    </div>

                    <div class="pt-4">
                        <h3
                            class="relative inline-block font-medium text-lg text-black before:absolute before:bottom-0.5 before:start-0 before:-z-[1] before:w-full before:h-1 before:bg-lime-400 before:transition before:origin-left before:scale-x-0 group-hover:before:scale-x-100 dark:text-white">
                            {{ $moneyReserve['name'] }}
                        </h3>
                        <p class="mt-1 text-gray-600 dark:text-neutral-400">
                            {{ $moneyReserve['description'] }}
                        </p>

                        <div class="mt-3 flex flex-wrap gap-2">
                            <span
                                class="py-1.5 px-3 bg-white text-gray-600 border border-gray-200 text-xs sm:text-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
                                Discovery
                            </span>
                            <span
                                class="py-1.5 px-3 bg-white text-gray-600 border border-gray-200 text-xs sm:text-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
                                Brand Guidelines
                            </span>
                            <span
                                class="py-1.5 px-3 bg-white text-gray-600 border border-gray-200 text-xs sm:text-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
                                Yoga
                            </span>
                        </div>
                    </div>
                </a>
            @empty
                <p class="text-gray-600 dark:text-neutral-400">Nenhuma reserva encontrada.</p>
            @endforelse
        </div>
    </div>

    <div class="flex flex-col">
        {{ $allMoneyReserves->links() }}
    </div>
    <!-- End Card Section -->
@endsection
