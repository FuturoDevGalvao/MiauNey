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

    <div class="w-full px-4 py-8 sm:px-6 lg:px-8 lg:py-10 mx-auto">
        <div class="w-full grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-4">
            @forelse ($allCreditCards as $creditCard)
                <a class="w-[300px] group flex flex-col focus:outline-none borde border rounded-lg hover:border-blue-600 duration-500"
                    href="{{ route('credit-cards.show', ['credit_card' => $creditCard->id]) }}">
                    <x-credit-card :name="$creditCard->name" :color="$creditCard->color" :validity="$creditCard->validity"></x-credit-card>
                </a>
            @empty
                <div class="col-span-full flex flex-col items-center">
                    <img src="https://i.pinimg.com/originals/60/2b/75/602b75e8895eb4f0cd1e105c5e2045f1.gif" alt=""
                        srcset="" width="200">
                    <h1 class="text-2xl font-bold dark:text-white">Sem cartões por aqui</h1>
                    <p class="text-[0.8rem] text-gray-600 dark:text-neutral-400">
                        Nenhum cartão de crédito encontrado.
                    </p>
                    <a href="{{ route('credit-cards.create') }}"
                        class="mt-4 inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-blue-500"
                        href="#">
                        Nova cartão
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
        {{ $allCreditCards->links() }}
    </div>
    <!-- End Card Section -->
@endsection
