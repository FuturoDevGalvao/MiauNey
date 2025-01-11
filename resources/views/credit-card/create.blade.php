@extends('layouts.auth')

@section('content')
    @php
        $routes = [
            ['name' => 'Home', 'uri' => route('root')],
            ['name' => 'Cartões', 'uri' => '#'],
            ['name' => 'Nova cartão de crédito', 'uri' => route('credit-cards.create')],
        ];

        $fields = [
            [
                'type' => 'text',
                'name' => 'name',
                'id' => 'name',
                'label' => 'Nome',
                'required' => true,
                'placeholder' => 'Dê um nome para o seu novo cartão',
            ],
            [
                'type' => 'text',
                'name' => 'institution',
                'id' => 'institution',
                'label' => 'Banco / Instituição',
                'required' => true,
                'placeholder' => 'Informe o Banco / Instituição do cartão',
            ],
            [
                'type' => 'date',
                'name' => 'validity',
                'id' => 'validity',
                'label' => 'Data de validade',
                'required' => true,
                'placeholder' => 'MM/YY',
            ],
            [
                'type' => 'color',
                'name' => 'color_picker',
                'id' => 'color_picker',
                'required' => true,
                'label' => 'Selecione uma cor para o seu novo cartão',
                'placeholder' => '',
            ],
        ];
    @endphp

    <x-header :resource="'Novo cartão de crédito'" :routesForBreadcrumb="$routes" :imagePath="'https://i.pinimg.com/originals/99/ea/36/99ea3646f45f3e0c86bc8d11b9bdcfb9.gif'"></x-header>

    <x-form-create-resource :route="route('credit-cards.store')" :method="'POST'" :fields="$fields"></x-form-create-resource>
@endsection
