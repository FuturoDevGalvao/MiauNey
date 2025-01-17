@extends('layouts.auth')

@section('content')
    <div class="min-w-[100%] mb-8 flex flex-col gap-3 max-w-4xl px-4 lg:px-8 sticky top-0 z-30 backdrop-blur-lg bg-white/70">
        <div class="flex flex-wrap items-center gap-4">
            <img class="sm:size-20 size-24 rounded-full"
                src="https://i.pinimg.com/originals/4b/26/87/4b2687b20a079d25995fef5193a2f12f.gif" alt="">
            <div>
                <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold">
                    Olá, {{ mb_split(' ', Auth::user()->name)[0] }}!
                </h1>
            </div>
        </div>
    </div>

    <div class="flex flex-wrap w-full gap-3 p-4 flex-1">
        <div class="flex-1 row-span-3 flex flex-col border rounded-xl">
            <h1 class="font-bold text-2xl divide-y p-6">Reservas de dinheiro</h1>
            <ul class="p-2 max-w-md divide-y divide-gray-200 dark:divide-gray-700">
                @forelse ($moneyReserves as $moneyReserve)
                    <li class="p-4">
                        <a href="{{ route('money-reserves.show', [$moneyReserve->id]) }}"
                            class="flex items-center space-x-4 rtl:space-x-reverse">
                            <div class="flex-shrink-0">
                                <img class="object-cover w-8 h-8 rounded-full"
                                    src="{{ isset($moneyReserve['image_path']) && file_exists(public_path('storage/' . $moneyReserve['image_path'])) ? asset('storage/' . $moneyReserve['image_path']) : asset('images/porquinho.jpeg') }}">
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    {{ $moneyReserve->name }}
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    {{ $moneyReserve->description }}
                                </p>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                {{ 'R$' . number_format($moneyReserve->goal, 2, ',', '.') }}
                            </div>
                        </a>
                    </li>

                @empty
                    <div class="col-span-full flex flex-col items-center">
                        <img src="https://i.pinimg.com/originals/60/2b/75/602b75e8895eb4f0cd1e105c5e2045f1.gif"
                            alt="" srcset="" width="200">
                        <h1 class="text-2xl font-bold dark:text-white">Sem reservas por aqui</h1>
                        <p class="text-[0.8rem] text-gray-600 dark:text-neutral-400">
                            Nenhuma reserva de dinheiro encontrada.
                        </p>
                        <a href="{{ route('money-reserves.create') }}"
                            class="mt-4 inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-blue-500"
                            href="#">
                            Nova reserva
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="m9 18 6-6-6-6" />
                            </svg>
                        </a>
                    </div>
                @endforelse
            </ul>

            <a href="{{ route('money-reserves.index') }}"
                class="p-4 inline-flex items-center justify-center gap-x-1 text-sm text-blue-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-blue-500"
                href="#">
                Ver todas
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="m9 18 6-6-6-6" />
                </svg>
            </a>
        </div>
        <div class="flex-1 border rounded-xl">
            <h1 class="font-bold text-2xl divide-y p-6">Reservas de dinheiro</h1>
        </div>
        <div class="flex-1 border rounded-xl">
            <h1 class="font-bold text-2xl divide-y p-6">Reservas de dinheiro</h1>
        </div>
    </div>
@endsection
