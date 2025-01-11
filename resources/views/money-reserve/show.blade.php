@extends('layouts.auth')

@section('content')
    @php
        $routes = [
            ['name' => 'Home', 'uri' => route('root')],
            ['name' => 'Reservas', 'uri' => '#'],
            ['name' => 'Minhas reservas', 'uri' => route('money-reserves.create')],
            ['name' => 'Reserva', 'uri' => '#'],
        ];
    @endphp

    <x-header :resource="'Reserva de dinheiro'" :routesForBreadcrumb="$routes" :imagePath="' ?>'"></x-header>

    <div class="w-full p-10 flex items-center justify-center lg:gap-8 border">
        <div class="w-[50%] min-h-[50vh] border border-blue-300">
            <h1>Nome da reserva</h1>
        </div>
        <div class="w-[50%] border-red-300">
            <div>
                <h2>Últimas transações</h2>
            </div>
            <div>
                <h2>Gastos por categoria</h2>
            </div>
        </div>
    </div>
@endsection


@section('specific-scripts')
@endsection
