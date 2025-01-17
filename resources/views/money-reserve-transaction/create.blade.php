@extends('layouts.auth')

@section('content')
    @php
        $routes = [
            ['name' => 'Home', 'uri' => route('root')],
            ['name' => 'Transações', 'uri' => '#'],
            ['name' => 'Transações das reservas', 'uri' => '#'],
            ['name' => 'Nova transação', 'uri' => '#'],
        ];

        $fields = [
            [
                'type' => 'text',
                'name' => 'title',
                'id' => 'title',
                'required' => true,
                'label' => 'Titulo',
                'placeholder' => 'Informe um título para essa transação (Ex: Paguei a fatura da internet)',
            ],
            [
                'type' => 'textarea',
                'name' => 'description',
                'id' => 'description',
                'required' => true,
                'label' => 'Descrição',
                'placeholder' => 'Informe uma descrição para essa transação',
            ],
            [
                'type' => 'text',
                'name' => 'value',
                'id' => 'value',
                'required' => true,
                'label' => 'Valor',
                'placeholder' => 'Informe o valor de dinheiro para essa transação',
            ],
            /* [
                'type' => 'select',
                'name' => 'operation',
                'id' => 'operation',
                'required' => true,
                'label' => 'Operação',
                'placeholder' => '',
                'categories' => ['input', 'output'],
                'multiple' => false,
            ], */
            [
                'type' => 'select',
                'name' => 'category',
                'id' => 'category',
                'required' => true,
                'label' => 'Categorias de gastos',
                'placeholder' => '',
                'categories' => $categories,
                'multiple' => true,
            ],
            [
                'type' => 'radio',
                'name' => 'moneyReserves',
                'id' => 'moneyReserves',
                'required' => true,
                'label' => 'Selecione a reserva de dinheiro',
                'placeholder' => '',
                'moneyReserves' => $moneyReserves,
            ],
        ];
    @endphp

    <x-header :resource="'Nova transação de reserva'" :routesForBreadcrumb="$routes" :imagePath="'https://i.pinimg.com/originals/99/ea/36/99ea3646f45f3e0c86bc8d11b9bdcfb9.gif'">
    </x-header>

    <x-form-create-resource :route="route('money-reserves-transactions.store')" :method="'POST'" :fields="$fields"></x-form-create-resource>
@endsection
