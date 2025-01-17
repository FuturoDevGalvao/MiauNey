@extends('layouts.auth')

@section('content')
    @php
        $routes = [
            ['name' => 'Home', 'uri' => route('root')],
            ['name' => 'Reservas', 'uri' => '#'],
            ['name' => 'Minhas reservas', 'uri' => route('money-reserves.index')],
            ['name' => 'Reserva', 'uri' => '#'],
        ];
    @endphp

    <x-header :resource="'Reserva de dinheiro'" :routesForBreadcrumb="$routes" :imagePath="'https://i.pinimg.com/originals/7c/f0/70/7cf070f4171c3b0d45fda333ff023f1a.gif'"></x-header>

    <div class="w-full p-10 flex items-center justify-center lg:gap-8 border">
        <img src="" alt="">
        <div
            class="w-[50%] min-h-[50vh] mx-auto border border-blue-300 rounded-lg shadow-md p-6 bg-white dark:bg-neutral-800">
            <div class="hs-dropdown [--strategy:absolute] [--flip:false] hs-dropdown-example relative inline-flex">
                <button id="hs-dropdown-example" type="button"
                    class="hs-dropdown-toggle py-3 px-4 inline-flex items-center gap-x-2 text-[0.9rem] font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                    aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                    <svg class="hs-dropdown-open:rotate-180 size-4 text-gray-600 dark:text-neutral-600"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m6 9 6 6 6-6"></path>
                    </svg>
                </button>

                <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 w-56 hidden z-10 mt-2 min-w-60 bg-white shadow-md rounded-lg p-2 dark:bg-neutral-800 dark:border dark:border-neutral-700 dark:divide-neutral-700"
                    role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-example">
                    <a class="flex items-center gap-x-2 py-2 px-3 rounded-lg text-sm text-red-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-red-500 dark:hover:bg-neutral-700 dark:hover:text-red-300 dark:focus:bg-neutral-700"
                        aria-haspopup="dialog" aria-expanded="true" aria-controls="hs-scale-animation-modal"
                        data-hs-overlay="#hs-scale-animation-modal" href="#">
                        <svg class="w-5 h-5 text-red-500 dark:text-red-500" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                        </svg>
                        Excluir
                    </a>
                    <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700"
                        href="{{ route('money-reserves.edit', ['money_reserve' => $moneyReserve->id]) }}">
                        <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                        </svg>
                        Editar
                    </a>
                </div>
                <div id="hs-scale-animation-modal"
                    class="hs-overlay hidden size-full fixed top-0 start-0 z-[100] overflow-x-hidden overflow-y-auto pointer-events-none"
                    role="dialog" tabindex="-1" aria-labelledby="hs-scale-animation-modal-label">
                    <div
                        class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
                        <div
                            class="w-full flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
                            <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
                                <h3 id="hs-scale-animation-modal-label" class="font-bold text-gray-800 dark:text-white">
                                    Excluir a reserva <span class="text-red-600"> {{ $moneyReserve->name }}</span>?
                                </h3>
                                <button type="button"
                                    class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600"
                                    aria-label="Close" data-hs-overlay="#hs-scale-animation-modal">
                                    <span class="sr-only">Close</span>
                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M18 6 6 18"></path>
                                        <path d="m6 6 12 12"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="p-4 overflow-y-auto">
                                <p class="mt-1 text-gray-800 dark:text-neutral-400">
                                    Essa ação não poderá ser desfeita.
                                </p>
                            </div>
                            <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
                                <button type="button"
                                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                                    data-hs-overlay="#hs-scale-animation-modal">
                                    Cancelar
                                </button>
                                <form action="{{ route('money-reserves.destroy', ['money_reserve' => $moneyReserve->id]) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 focus:outline-none focus:bg--700 disabled:opacity-50 disabled:pointer-events-none">
                                        Excluir
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Título e descrição da reserva -->
            <div class="mb-6">
                <h1 class="text-2xl sm:text-3xl font-bold text-blue-600 dark:text-blue-400">
                    {{ $moneyReserve->name }}
                </h1>
                <p class="mt-2 text-gray-700 dark:text-gray-300">
                    {{ $moneyReserve->description }}
                </p>
            </div>

            <div class="p-6 bg-gray-50 dark:bg-neutral-700 rounded-lg shadow-inner">
                <!-- Informações principais -->
                <div class="flex flex-col items-center gap-6">
                    <!-- Meta da Reserva -->
                    <div class="text-center">
                        <h4 class="text-lg sm:text-xl font-semibold text-gray-800 dark:text-neutral-200">
                            Meta da Reserva
                        </h4>
                        <p class="mt-2 text-3xl sm:text-4xl font-bold text-blue-600">
                            {{ 'R$ ' . number_format($moneyReserve->goal, 2, ',', '.') }}
                        </p>
                    </div>

                    <!-- Valor acumulado -->
                    <p class="text-center text-gray-500 dark:text-neutral-400">
                        <span class="font-medium">Quanto você tem:</span>
                        {{ 'R$ ' . number_format($moneyReserve->amount_achieved, 2, ',', '.') }}
                        <span class="font-medium">/</span>
                        {{ 'R$ ' . number_format($moneyReserve->goal, 2, ',', '.') }}
                    </p>

                    <!-- Barra de progresso -->
                    <div class="w-[200px] bg-gray-200 rounded-full dark:bg-gray-700 overflow-hidden">
                        <div class="bg-blue-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full"
                            style="width: calc(200px * {{ $moneyReserve->amount_achieved / 1000 }})">
                            {{ number_format(($moneyReserve->amount_achieved / $moneyReserve->goal) * 100, 2, ',', '.') }}%
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-[50%]  flex flex-col justify-center items-center pt-4">
            <div
                class="relative flex flex-col items-center rounded-[10px] border-[1px] border-gray-200 mx-auto p-4 bg-white bg-clip-border shadow-md shadow-[#F3F3F3] dark:border-[#ffffff33] dark:!bg-navy-800 dark:text-white dark:shadow-none">

                <div class="flex items-center justify-between rounded-t-3xl p-3 w-full">
                    <div class="text-lg font-bold text-navy-700 dark:text-white">
                        Histórico de transações
                    </div>
                    <button
                        class="linear rounded-[20px] bg-lightPrimary px-4 py-2 text-base font-medium text-brand-500 transition duration-200 hover:bg-gray-100 active:bg-gray-200 dark:bg-white/5 dark:text-white dark:hover:bg-white/10 dark:active:bg-white/20">
                        Ver todas
                    </button>
                </div>

                @foreach ($allMoneyReservesTransactions as $transaction)
                    <div
                        class="flex h-full w-full items-start justify-between rounded-md border-[1px] border-[transparent] dark:hover:border-white/20 bg-white  transition-all duration-150 hover:border-gray-200 dark:!bg-navy-800 dark:hover:!bg-navy-700">
                        <div class="flex items-center gap-3">
                            <div class="flex h-16 w-16 items-center justify-center">
                                <div
                                    class="relative last:after:hidden after:absolute after:top-7 after:bottom-0 after:start-3.5 after:w-px after:-translate-x-[0.5px] after:bg-gray-200 dark:after:bg-neutral-700">
                                    <div class="relative z-10 size-7 flex justify-center items-center">
                                        <!-- Aqui você pode colocar um ícone ou inicial, conforme a operação -->
                                        @if ($transaction->operation == 'input')
                                            <span
                                                class="flex shrink-0 justify-center items-center size-9 bg-green-500 text-white rounded-full">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="12" stroke="currentColor"
                                                    class="size-5 font-bold">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
                                                </svg>

                                            </span>
                                        @else
                                            <span
                                                class="flex shrink-0 justify-center items-center size-9 bg-red-500 text-white rounded-full">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                    class="size-5 font-bold">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m19.5 4.5-15 15m0 0h11.25m-11.25 0V8.25" />
                                                </svg>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col">
                                <h5 class="text-base font-bold text-navy-700 dark:text-white">
                                    {{ $transaction->moneyReserve->name }}
                                </h5>
                                <p class="mt-1 text-sm font-normal text-gray-600">
                                    {{ $transaction->created_at->diffForHumans() }}

                                </p>
                            </div>
                            <div class="flex items-center gap-3 text-sm font-bold text-navy-700 dark:text-white">
                                <p>R$ {{ number_format($transaction->value, 2, ',', '.') }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
                <a href="{{ route('money-reserves-transactions.create') }}"
                    class="hover:bg-gray-100 px-4 gap-2 w-full text-sm flex items-center border p-2 rounded-xl mt-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="size-6 rounded-full">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    <div class="flex flex-col">
                        <span class="font-semibold text-lg">Nova</span>
                        <span class="text-sm text-gray-500">Fazer uma nova transferência</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection


@section('specific-scripts')
    @vite(['resources/js/money-reserve/show.js'])
@endsection
