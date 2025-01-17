@extends('layouts.auth')

@section('content')
    @php
        $routes = [
            ['name' => 'Home', 'uri' => route('root')],
            ['name' => 'Cartões', 'uri' => '#'],
            ['name' => 'Meus cartões', 'uri' => route('credit-cards.index')],
            ['name' => 'Cartão', 'uri' => '#'],
        ];
    @endphp

    <x-header :resource="'Cartão de crédito'" :routesForBreadcrumb="$routes" :imagePath="'https://i.pinimg.com/originals/7c/f0/70/7cf070f4171c3b0d45fda333ff023f1a.gif'"></x-header>

    <div class="w-full p-10 flex items-center justify-center lg:gap-8">
        <div class="w-[80%] mx-auto bg-white rounded-lg shadow-md overflow-hidden">
            <div class="bg-gray-100 px-4 py-2">
                <h2 class="text-lg font-medium text-gray-800">Detales sobre o cartão: {{ $creditCard->name }}</h2>
            </div>
            <div class="px-4 py-5 sm:p-6">
                <div class="flex flex-col items-start justify-between mb-6">
                    <span class="text-sm font-medium text-gray-600">Nome do titular</span>
                    <span class="text-lg font-medium text-gray-800">{{ $creditCard->user->name }}</span>
                </div>
                <div class="flex flex-col items-start justify-between mb-6">
                    <span class="text-sm font-medium text-gray-600">Banco/Instituição</span>
                    <span class="text-lg font-medium text-gray-800">{{ $creditCard->institution }}</span>
                </div>
                <div class="flex flex-row items-center justify-between mb-6">
                    <div class="flex flex-col items-start">
                        <span class="text-sm font-medium text-gray-600">Data de expiração</span>
                        <span class="text-lg font-medium text-gray-800">{{ $creditCard->validity }}</span>
                    </div>
                    <div class="flex flex-col items-start">
                        <span class="text-sm font-medium text-gray-600">CVV</span>
                        <span class="text-lg font-medium text-gray-800">***</span>
                    </div>
                </div>
                <div class="flex flex-row items-center justify-between">
                    <div class="flex flex-col items-start">
                        <span class="text-sm font-medium text-gray-600">Limite de crédito</span>
                        <span
                            class="text-lg font-medium text-gray-800">{{ 'R$' . number_format($creditCard->limit, 2, ',', '.') }}</span>
                    </div>
                    <div class="flex flex-col items-start">
                        <span class="text-sm font-medium text-gray-600">Limite disponível</span>
                        <span class="text-lg font-medium text-gray-800">$500,00 /
                            {{ 'R$' . number_format($creditCard->limit, 2, ',', '.') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
