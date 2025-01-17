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
                        Novo cartão de crédito criado com sucesso!
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
                'type' => 'text',
                'name' => 'limit',
                'id' => 'limit',
                'label' => 'Limite',
                'required' => true,
                'placeholder' => 'Informe o limite do seu novo cartão',
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
                'type' => 'date',
                'name' => 'due_date',
                'id' => 'due_date',
                'label' => 'Data de fechamento da fatura',
                'required' => true,
                'placeholder' => 'DD/MM',
            ],
            [
                'type' => 'color',
                'name' => 'color',
                'id' => 'color',
                'required' => true,
                'label' => 'Selecione uma cor para o seu novo cartão',
                'placeholder' => '',
            ],
        ];
    @endphp

    <x-header :resource="'Novo cartão de crédito'" :routesForBreadcrumb="$routes" :imagePath="'https://i.pinimg.com/originals/99/ea/36/99ea3646f45f3e0c86bc8d11b9bdcfb9.gif'"></x-header>

    <x-form-create-resource :route="route('credit-cards.store')" :method="'POST'" :fields="$fields"></x-form-create-resource>
@endsection
