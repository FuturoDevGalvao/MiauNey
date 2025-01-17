@extends('layouts.auth')

@section('content')
    @if ($successOnDelete)
        <div id="dismiss-alert"
            class="absolute z-20 bottom-5 right-5 shadow-xl  hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 bg-teal-50 border border-teal-200 text-sm text-teal-800 rounded-lg p-4 dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500"
            role="alert" tabindex="-1" aria-labelledby="hs-dismiss-button-label">
            <div class="flex">
                <div class="shrink-0">
                    <svg class="shrink-0 size-4 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path>
                        <path d="m9 12 2 2 4-4"></path>
                    </svg>
                </div>
                <div class="ms-2">
                    <h3 id="hs-dismiss-button-label" class="text-sm font-medium">
                        A reserva <span class="font-semibold">{{ $nameOfReserveDeleted }}</span> foi excluído(a) com
                        sucesso!
                    </h3>
                </div>
                <div class="ps-3 ms-auto">
                    <div class="-mx-1.5 -my-1.5">
                        <button type="button"
                            class="inline-flex bg-teal-50 rounded-lg p-1.5 text-teal-500 hover:bg-teal-100 focus:outline-none focus:bg-teal-100 dark:bg-transparent dark:text-teal-600 dark:hover:bg-teal-800/50 dark:focus:bg-teal-800/50"
                            data-hs-remove-element="#dismiss-alert">
                            <span class="sr-only">Dismiss</span>
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 6 6 18"></path>
                                <path d="m6 6 12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif


    @php
        $routes = [
            ['name' => 'Home', 'uri' => route('root')],
            ['name' => 'Reservas', 'uri' => '#'],
            ['name' => 'Minhas reservas', 'uri' => route('money-reserves.index')],
        ];

    @endphp

    <x-header :resource="'Minhas reservas'" :routesForBreadcrumb="$routes" :imagePath="'https://i.pinimg.com/originals/39/02/a5/3902a5069854d277c0c0af28cadfbd71.gif'"></x-header>

    <!-- Card Section -->
    <div class="w-full px-4 py-8 sm:px-6 lg:px-8 lg:py-10 mx-auto">
        <div class="w-full grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-4">
            @forelse ($allMoneyReserves as $moneyReserve)
                <a class="group flex flex-col focus:outline-none borde border rounded-lg hover:border-blue-600 duration-500"
                    href="{{ route('money-reserves.show', [$moneyReserve->id]) }}">
                    <div
                        class="relative w-full h-[200px] bg-gray-100 rounded-tr-lg rounded-tl-lg dark:bg-neutral-800 overflow-hidden">
                        <img class="w-full h-full object-cover group-hover:scale-105 group-focus:scale-105 transition-transform duration-500 ease-in-out"
                            src="{{ isset($moneyReserve['image_path']) && file_exists(public_path('storage/' . $moneyReserve['image_path'])) ? asset('storage/' . $moneyReserve['image_path']) : asset('images/porquinho.jpeg') }}"
                            alt="Foto da reserva">
                    </div>

                    <div class="pt-4 p-5">
                        <h3
                            class="relative inline-block font-medium text-lg text-black before:absolute before:bottom-0.5 before:start-0 before:-z-[1] before:w-full before:h-1 before:bg-blue-600 before:transition before:origin-left before:scale-x-0 group-hover:before:scale-x-100 dark:text-white">
                            {{ $moneyReserve['name'] }}
                        </h3>
                        <p class="mt-1 text-gray-600 dark:text-neutral-400">
                            {{ $moneyReserve['description'] }}
                        </p>
                    </div>
                </a>
            @empty

                <div class="col-span-full flex flex-col items-center">
                    <img src="https://i.pinimg.com/originals/60/2b/75/602b75e8895eb4f0cd1e105c5e2045f1.gif" alt=""
                        srcset="" width="200">
                    <h1 class="text-2xl font-bold dark:text-white">Sem reservas por aqui</h1>
                    <p class="text-[0.8rem] text-gray-600 dark:text-neutral-400">
                        Nenhuma reserva de dinheiro encontrada.
                    </p>
                    <a href="{{ route('money-reserves.create') }}"
                        class="mt-4 inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-blue-500"
                        href="#">
                        Nova reserva
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6" />
                        </svg>
                    </a>
                </div>
            @endforelse
        </div>
    </div>

    <div class="flex flex-col">
        {{ $allMoneyReserves->links() }}
    </div>
    <!-- End Card Section -->
@endsection
