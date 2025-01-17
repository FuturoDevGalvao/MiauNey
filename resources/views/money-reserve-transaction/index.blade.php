@extends('layouts.auth')

@section('content')
    @php
        $routes = [
            ['name' => 'Home', 'uri' => route('root')],
            ['name' => 'Transações', 'uri' => '#'],
            ['name' => 'Transações das reservas', 'uri' => '#'],
        ];

    @endphp

    <x-header :resource="'Transações das reservas'" :routesForBreadcrumb="$routes" :imagePath="'https://i.pinimg.com/originals/39/02/a5/3902a5069854d277c0c0af28cadfbd71.gif'"></x-header>

    <a href="{{ route('money-reserves-transactions.create') }}"
        class="hover:bg-gray-100 px-4 gap-2 text-sm flex items-center border p-2 rounded-xl mt-4">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
            class="size-6 rounded-full">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
        </svg>
        <div class="flex flex-col">
            <span class="font-semibold text-lg">Nova</span>
            <span class="text-sm text-gray-500">Fazer uma nova transferência</span>
        </div>
    </a>

    <!-- Timeline -->
    <div class="w-full border p-10">
        @foreach ($allMoneyReservesTransactions as $transaction)
            <!-- Heading -->
            <div class="ps-2 my-2 first:mt-0">
                <h3 class="text-xs font-medium uppercase text-gray-500 dark:text-neutral-400">
                    {{ $transaction->created_at->format('d M, Y') }} <!-- Formatação da data -->
                </h3>
            </div>
            <!-- End Heading -->

            <!-- Item -->
            <a class="flex gap-x-3" href="{{ route('money-reserves.show', [$transaction->moneyReserve->id]) }}">
                <!-- Icon -->
                <div
                    class="relative last:after:hidden after:absolute after:top-7 after:bottom-0 after:start-3.5 after:w-px after:-translate-x-[0.5px] after:bg-gray-200 dark:after:bg-neutral-700">
                    <div class="relative z-10 size-7 flex justify-center items-center">
                        <!-- Aqui você pode colocar um ícone ou inicial, conforme a operação -->
                        @if ($transaction->operation == 'input')
                            <span
                                class="flex shrink-0 justify-center items-center size-9 bg-green-500 text-white rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="12"
                                    stroke="currentColor" class="size-5 font-bold">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
                                </svg>

                            </span>
                        @else
                            <span
                                class="flex shrink-0 justify-center items-center size-9 bg-red-500 text-white rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" class="size-5 font-bold">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m19.5 4.5-15 15m0 0h11.25m-11.25 0V8.25" />
                                </svg>
                            </span>
                        @endif
                    </div>
                </div>
                <!-- End Icon -->

                <!-- Right Content -->
                <div class="grow pt-0.5 pb-8">
                    <h3 class="flex gap-x-1.5 font-semibold text-gray-800 dark:text-white">
                        {{ $transaction->title }} <!-- Título da transação -->
                    </h3>
                    @if ($transaction->description)
                        <p class="mt-1 text-sm text-gray-600 dark:text-neutral-400">
                            {{ $transaction->description }} <!-- Descrição da transação -->
                        </p>
                    @endif
                    <p class="mt-1 text-sm text-gray-600 dark:text-neutral-400">
                        {{ 'R$ ' . number_format($transaction->value, 2, ',', '.') }} <!-- Valor da transação -->
                    </p>
                    <p class="mt-1 text-sm text-gray-600 dark:text-neutral-400">
                        {{ $transaction->moneyReserve->name }} <!-- Valor da transação -->
                    </p>
                    <p class="mt-1 text-sm text-gray-600 dark:text-neutral-400">
                        @foreach ($transaction->categories as $category)
                            <!-- Supondo que a transação tenha várias categorias -->
                            <span
                                class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-800/30 dark:text-yellow-500">
                                {{ $category->name }} <!-- Nome da categoria -->
                            </span>
                        @endforeach
                    </p>
                </div>
                <!-- End Right Content -->
            </a>
            <!-- End Item -->
        @endforeach
    </div>
    <!-- End Timeline -->
@endsection
