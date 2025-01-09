@extends('layouts.auth')

@section('content')
    <div id="dismiss-alert"
        class="absolute bottom-5 right-5 shadow-xl  hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 bg-teal-50 border border-teal-200 text-sm text-teal-800 rounded-lg p-4 dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500"
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
                    File has been successfully uploaded.
                </h3>
            </div>
            <div class="ps-3 ms-auto">
                <div class="-mx-1.5 -my-1.5">
                    <button type="button"
                        class="inline-flex bg-teal-50 rounded-lg p-1.5 text-teal-500 hover:bg-teal-100 focus:outline-none focus:bg-teal-100 dark:bg-transparent dark:text-teal-600 dark:hover:bg-teal-800/50 dark:focus:bg-teal-800/50"
                        data-hs-remove-element="#dismiss-alert">
                        <span class="sr-only">Dismiss</span>
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="min-w-[100%] flex flex-col gap-3 max-w-4xl px-4 lg:px-8">
        <div class="flex flex-wrap items-center gap-4">
            <img class="sm:size-20 size-24 rounded-full"
                src="https://i.pinimg.com/originals/99/ea/36/99ea3646f45f3e0c86bc8d11b9bdcfb9.gif" alt="">
            <div>
                <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold">
                    Nova reserva de dinheiro
                </h1>

                @php
                    $routes = [
                        ['name' => 'Home', 'uri' => route('root')],
                        ['name' => 'Reservas', 'uri' => '#'],
                        ['name' => 'Nova reserva', 'uri' => route('money-reserves.create')],
                    ];
                @endphp
                <x-breadcrumb :routes="$routes"></x-breadcrumb>
            </div>
        </div>
    </div>

    <!-- Card Section -->
    <div class="min-w-[100%] max-w-4xl px-4 py-8 sm:px-6 lg:px-8 lg:py-10 mx-auto">
        <form action="{{ route('money-reserves.store') }}" method="POST">
            @csrf
            @method('POST')
            <!-- Card -->
            <div class="p-10 rounded-xl shadow dark:bg-neutral-900">
                <!-- Grid -->
                <div class="space-y-4 sm:space-y-6">
                    <div class="space-y-2">
                        <label for="af-submit-app-project-name"
                            class="inline-block text-sm font-bold text-gray-800 mt-2.5 dark:text-neutral-200">
                            * Nome
                        </label>

                        <input value="{{ old('name', '') }}" required id="af-submit-app-project-name" type="text"
                            class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            placeholder="Informe o nome da nova reserva" name="name">

                        @error('name')
                            <x-alert-errors-request :errors="$errors->get('name')"></x-alert-errors-request>
                        @enderror
                    </div>
                    <div class="space-y-2">
                        <label for="af-submit-app-description"
                            class="inline-block text-sm font-bold text-gray-800 mt-2.5 dark:text-neutral-200">
                            * Descrição
                        </label>

                        <textarea value="{{ old('description', '') }}" required id="af-submit-app-description"
                            class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            rows="6" placeholder="Informe uma descrição para a sua nova reserva" name="description"></textarea>

                        @error('description')
                            <x-alert-errors-request :errors="$errors->get('description')"></x-alert-errors-request>
                        @enderror

                    </div>

                    <div class="space-y-2">
                        <label for="af-submit-project-url"
                            class="inline-block text-sm font-bold text-gray-800 mt-2.5 dark:text-neutral-200">
                            Saldo inicial
                        </label>

                        <input value="{{ old('balance', '') }}" id="af-submit-app-project-name" type="text"
                            class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            placeholder="Informe o saldo inicial da nova reserva" name="balance">

                        @error('balance')
                            <x-alert-errors-request :errors="$errors->get('balance')"></x-alert-errors-request>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label for="af-submit-app-upload-images"
                            class="inline-block text-sm font-bold text-gray-800 mt-2.5 dark:text-neutral-200">
                            Selecione uma imagem para ser a cara da sua nova reserva
                        </label>
                        <input value="{{ old('image', '') }}" type="file" id="file-input"
                            class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400
                                  file:bg-gray-50 file:border-0
                                  file:me-4
                                  file:py-3 file:px-4
                                  dark:file:bg-neutral-700 dark:file:text-neutral-400"
                            name="image">
                        @error('image')
                            <x-alert-errors-request :errors="$errors->get('image')"></x-alert-errors-request>
                        @enderror
                    </div>
                </div>
                <!-- End Grid -->

                <div class="mt-8 flex items-center gap-x-2 sticky">
                    <button type="submit"
                        class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                        Registrar nova reserva
                    </button>
                </div>
            </div>
            <!-- End Card -->
        </form>
    </div>
    <!-- End Card Section -->
@endsection

@section('specific-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
@endsection
