@extends('layouts.auth')

@section('content')
    @if ($successOnCreate)
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
                        As informações da reserva foram devidamente atualizadas!
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
            ['name' => 'Reserva', 'uri' => '#'],
            ['name' => 'Editar reserva', 'uri' => route('money-reserves.edit', ['money_reserve' => $moneyReserve->id])],
        ];

        $fields = [
            [
                'type' => 'text',
                'name' => 'name',
                'id' => 'name',
                'required' => true,
                'value' => $moneyReserve->name,
                'label' => 'Nome',
                'placeholder' => 'Informe o nome da nova reserva',
            ],
            [
                'type' => 'textarea',
                'name' => 'description',
                'id' => 'description',
                'required' => true,
                'value' => $moneyReserve->description,
                'label' => 'Descrição',
                'placeholder' => 'Informe uma descrição para a sua nova reserva',
            ],
            [
                'type' => 'text',
                'name' => 'goal',
                'id' => 'goal',
                'required' => true,
                'value' => $moneyReserve->goal,
                'label' => 'Meta da reserva',
                'placeholder' => 'Informe a meta de dinheiro da nova reserva',
            ],
            [
                'type' => 'file',
                'name' => 'image',
                'id' => 'image',
                'required' => false,
                'value' => '',
                'label' => 'Selecione uma imagem para ser a cara da sua nova reserva',
                'placeholder' => 'selecione um arquivo',
            ],
        ];
    @endphp

    <x-header :resource="'Editar reserva'" :routesForBreadcrumb="$routes" :imagePath="'https://i.pinimg.com/originals/99/ea/36/99ea3646f45f3e0c86bc8d11b9bdcfb9.gif'">
    </x-header>

    <x-form-create-resource :route="route('money-reserves.update', ['money_reserve' => $moneyReserve->id])" :method="'PATCH'" :fields="$fields"></x-form-create-resource>
@endsection
