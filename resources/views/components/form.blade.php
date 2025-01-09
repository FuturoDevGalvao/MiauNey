@props(['action', 'route', 'method', 'fields', 'authenticated', 'errorOccurred', 'newUserName'])

<div
    class="lg:w-[500px] mt-7 bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-neutral-900 dark:border-neutral-700">
    <div class="p-4 sm:p-7">
        <div class="text-center flex-col items-center justify-center">
            <x-aplication-logo></x-aplication-logo>
            <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400">
                @if (Route::is('login'))
                    Novo no {{ config('app.name') }}?
                    <a class="text-blue-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-blue-500"
                        href="{{ route('register.register') }}">
                        Crie uma conta aqui
                    </a>
                @else
                    Já possui uma conta no {{ config('app.name') }}?
                    <a class="text-blue-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-blue-500"
                        href="{{ route('login') }}">
                        Entre aqui
                    </a>
                @endif
            </p>
        </div>

        <div class="mt-5">
            <!-- Form -->
            @php
                $title = '';
                $message = '';

                if ($errorOccurred) {
                    $title =
                        $action == 'Entrar'
                            ? 'Falha na tentativa de autenticação.'
                            : 'Falha na tentativa de cadastrar-se';

                    $message =
                        $action == 'Entrar'
                            ? 'Por favor, reveja as credenciais fornecidas e tente novamente.'
                            : 'Estamos enfrentando problemas internos, tente novamente mais tarde.';
                } elseif ($authenticated) {
                    $title =
                        $action == 'Entrar'
                            ? "Login realizado com sucesso, $newUserNames!"
                            : "Cadastro realizado com sucesso, $newUserName!";

                    $message =
                        $action == 'Entrar'
                            ? 'Bem-vindo de volta! Aguarde enquanto redirecionamos você.'
                            : 'Bem-vindo! Aguarde enquanto redirecionamos você.';
                }
            @endphp

            @if ($errorOccurred or $authenticated)
                <x-alert :authenticated="$authenticated" :title="$title" :message="$message"></x-alert>
            @endif

            <form action="{{ $route }}" method="{{ $method }}">
                @csrf
                @method($method)
                <div class="grid gap-y-4">
                    <!-- Form Group -->
                    @foreach ($fields as $field)
                        @php
                            $isCheckBox = $field['type'] === 'checkbox';
                            $isPassword = $field['type'] === 'password';
                            $isPhone = $field['type'] === 'tel';
                        @endphp

                        <div class="{{ $isCheckBox ? 'flex gap-2 items-center' : '' }}">
                            <label for="{{ $field['id'] }}"
                                class="block text-sm {{ $isCheckBox ? '' : 'mb-2' }} dark:text-white">{{ $field['label'] }}</label>
                            <div class="relative">
                                @if ($isPassword)
                                    <div class="relative w-full">
                                        <input value="{{ old($field['name'], '') }}" required
                                            id="hs-toggle-password-{{ $field['id'] }}" type="{{ $field['type'] }}"
                                            class="py-3 ps-4 pe-10 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                            @isset($field['placeholder']) placeholder="{{ $field['placeholder'] }}" @endisset
                                            name="{{ $field['name'] }}">

                                        <button type="button"
                                            data-hs-toggle-password='{"target": "#hs-toggle-password-{{ $field['id'] }}"}'
                                            class="absolute inset-y-0 end-0 flex items-center z-20 px-3 cursor-pointer text-gray-400 rounded-e-md focus:outline-none focus:text-blue-600 dark:text-neutral-600 dark:focus:text-blue-500">
                                            <svg class="shrink-0 size-3.5" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path class="hs-password-active:hidden"
                                                    d="M9.88 9.88a3 3 0 1 0 4.24 4.24"></path>
                                                <path class="hs-password-active:hidden"
                                                    d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68">
                                                </path>
                                                <path class="hs-password-active:hidden"
                                                    d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61">
                                                </path>
                                                <line class="hs-password-active:hidden" x1="2" x2="22"
                                                    y1="2" y2="22"></line>
                                                <path class="hidden hs-password-active:block"
                                                    d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                                                <circle class="hidden hs-password-active:block" cx="12"
                                                    cy="12" r="3"></circle>
                                            </svg>
                                        </button>
                                    </div>
                                    @error($field['name'])
                                        <x-alert-errors-request :errors="$errors->get($field['name'])"></x-alert-errors-request>
                                    @enderror
                                    <!-- End Form Group -->
                                @elseif ($isPhone)
                                    <!-- Phone Field -->
                                    <input value="{{ old($field['name'], '') }}" type="{{ $field['type'] }}"
                                        id="{{ $field['id'] }}" name="{{ $field['name'] }}"
                                        class="w-full py-3 px-4 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        required placeholder="{{ $field['placeholder'] ?? 'Digite seu telefone' }}">
                                    @error($field['name'])
                                        <x-alert-errors-request :errors="$errors->get($field['name'])"></x-alert-errors-request>
                                    @enderror
                                @elseif ($isCheckBox)
                                    <!-- Checkbox Field -->
                                    <input value="{{ old($field['name'], '') }}" type="{{ $field['type'] }}"
                                        id="{{ $field['id'] }}" name="{{ $field['name'] }}" class=" text-blue-600">
                                @else
                                    <!-- Regular Input Field (for other types like text, email, etc.) -->
                                    <input value="{{ old($field['name'], '') }}" type="{{ $field['type'] }}"
                                        id="{{ $field['id'] }}" name="{{ $field['name'] }}"
                                        class="w-full py-3 px-4 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        required
                                        @isset($field['placeholder']) placeholder="{{ $field['placeholder'] }}" @endisset>

                                    @error($field['name'])
                                        <x-alert-errors-request :errors="$errors->get($field['name'])"></x-alert-errors-request>
                                    @enderror
                                @endif
                            </div>
                        </div>
                    @endforeach

                    <button type="submit"
                        class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">{{ $action }}</button>
                </div>
            </form>
            <!-- End Form -->
        </div>
    </div>
</div>
