@props(['route', 'method', 'fields'])

<div class="min-w-[80%] max-w-4xl px-4 py-8 sm:px-6 lg:px-8 lg:py-10 mx-auto">
    <form action="{{ $route }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method($method)

        <div class="p-10 rounded-xl flex flex-col gap-4 border dark:bg-neutral-900">
            <!-- Form Group -->
            @foreach ($fields as $field)
                @php
                    $isCheckBox = strtolower($field['type']) === 'checkbox';
                    $isPassword = strtolower($field['type']) === 'password';
                    $isPhone = strtolower($field['type']) === 'tel';
                    $isTextArea = strtolower($field['type']) === 'textarea';
                    $isFile = strtolower($field['type']) === 'file';
                    $isDate = strtolower($field['type']) === 'date';
                    $isColor = strtolower($field['type']) === 'color';
                    $isRadio = strtolower($field['type']) === 'radio';
                    $isSelect = strtolower($field['type']) === 'select';
                @endphp

                <div class="{{ $isCheckBox ? 'flex gap-2 items-center' : '' }}">
                    <label for="{{ $field['id'] }}"
                        class="inline-flex items-center justify-center gap-2 text-sm font-bold text-gray-800 mt-2.5 dark:text-neutral-200 {{ $isCheckBox ? '' : 'mb-2' }}">
                        {!! $field['required'] ? "<span class='text-red-500 text-lg'>*</span>" : '' !!}
                        {{ $field['label'] }}
                    </label>
                    <div class="relative">
                        @if ($isPassword)
                            <div class="relative w-full">
                                <input value="{{ isset($field['value']) ? $field['value'] : old($field['name'], '') }}"
                                    {{ $field['required'] ? 'required' : '' }}
                                    id="hs-toggle-password-{{ $field['id'] }}" type="{{ $field['type'] }}"
                                    class="py-3 ps-4 pe-10 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                    @isset($field['placeholder']) placeholder="{{ $field['placeholder'] }}" @endisset
                                    name="{{ $field['name'] }}">

                                <button type="button"
                                    data-hs-toggle-password='{"target": "#hs-toggle-password-{{ $field['id'] }}"}'
                                    class="absolute inset-y-0 end-0 flex items-center z-20 px-3 cursor-pointer text-gray-400 rounded-e-md focus:outline-none focus:text-blue-600 dark:text-neutral-600 dark:focus:text-blue-500">
                                    <svg class="shrink-0 size-3.5" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path class="hs-password-active:hidden" d="M9.88 9.88a3 3 0 1 0 4.24 4.24">
                                        </path>
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
                                        <circle class="hidden hs-password-active:block" cx="12" cy="12"
                                            r="3"></circle>
                                    </svg>
                                </button>
                            </div>
                            @error($field['name'])
                                <x-alert-errors-request :errors="$errors->get($field['name'])"></x-alert-errors-request>
                            @enderror
                            <!-- End Form Group -->
                        @elseif ($isPhone)
                            <!-- Phone Field -->
                            <input value="{{ isset($field['value']) ? $field['value'] : old($field['name'], '') }}"
                                type="{{ $field['type'] }}" id="{{ $field['id'] }}" name="{{ $field['name'] }}"
                                class="w-full py-3 px-4 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                {{ $field['required'] ? 'required' : '' }}
                                placeholder="{{ $field['placeholder'] ?? 'Digite seu telefone' }}">
                            @error($field['name'])
                                <x-alert-errors-request :errors="$errors->get($field['name'])"></x-alert-errors-request>
                            @enderror
                        @elseif ($isCheckBox)
                            <!-- Checkbox Field -->
                            <input value="{{ isset($field['value']) ? $field['value'] : old($field['name'], '') }}"
                                type="{{ $field['type'] }}" {{ $field['required'] ? 'required' : '' }}
                                id="{{ $field['id'] }}" name="{{ $field['name'] }}" class=" text-blue-600">
                        @elseif ($isTextArea)
                            <textarea {{ $field['required'] ? 'required' : '' }} id="{{ $field['id'] }}"
                                class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                rows="6" placeholder="{{ $field['placeholder'] }}" name="{{ $field['name'] }}">{{ isset($field['value']) ? $field['value'] : old($field['name'], '') }}</textarea>
                            @error($field['name'])
                                <x-alert-errors-request :errors="$errors->get($field['name'])"></x-alert-errors-request>
                            @enderror
                        @elseif($isFile)
                            <input value="{{ old($field['name'], '') }}" type="{{ $field['type'] }}" id="file-input"
                                {{ $field['required'] ? 'required' : '' }}
                                class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400
                                  file:bg-gray-50 file:border-0
                                  file:me-4
                                  file:py-3 file:px-4
                                  dark:file:bg-neutral-700 dark:file:text-neutral-400"
                                name="{{ $field['name'] }}" placeholder="{{ $field['placeholder'] }}">
                            @error($field['name'])
                                <x-alert-errors-request :errors="$errors->get($field['name'])"></x-alert-errors-request>
                            @enderror
                        @elseif($isDate)
                            <input value="{{ isset($field['value']) ? $field['value'] : old($field['name'], '') }}"
                                type="text" id="{{ $field['id'] }}" name="{{ $field['name'] }}"
                                placeholder="{{ $field['placeholder'] }}" {{ $field['required'] ? 'required' : '' }}
                                class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400
                                file:bg-gray-50 file:border-0
                                file:me-4
                                file:py-3 file:px-4
                                dark:file:bg-neutral-700 dark:file:text-neutral-400">
                            @error($field['name'])
                                <x-alert-errors-request :errors="$errors->get($field['name'])"></x-alert-errors-request>
                            @enderror
                        @elseif($isColor)
                            <input type="{{ $field['type'] }}" name="{{ $field['name'] }}" id="{{ $field['id'] }}"
                                value="{{ old($field['name'], '#000000') }}"
                                class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400
                                file:bg-gray-50 file:border-0
                                file:me-4
                                file:py-3 file:px-4
                                dark:file:bg-neutral-700 dark:file:text-neutral-400"
                                title="Escolha sua cor">
                            @error($field['name'])
                                <x-alert-errors-request :errors="$errors->get($field['name'])"></x-alert-errors-request>
                            @enderror
                        @elseif($isRadio)
                            <div class="space-y-4 bg-red">
                                @foreach ($field['moneyReserves'] as $reserve)
                                    <div
                                        class="rounded-lg border border-gray-200 bg-gray-50 p-4 ps-4 dark:border-gray-700 dark:bg-gray-800">
                                        <div class="flex items-start">
                                            <div class="flex h-5 items-center">
                                                <input id="reserve-{{ $reserve->id }}"
                                                    aria-describedby="reserve-{{ $reserve->id }}-text" type="radio"
                                                    name="moneyReserve" value="{{ $reserve->id }}"
                                                    class="h-4 w-4 border-gray-300 bg-white text-primary-600 focus:ring-2 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600"
                                                    {{ $loop->first ? 'checked' : '' }} />
                                            </div>

                                            <div class="ms-4 text-sm">
                                                <label for="reserve-{{ $reserve->id }}"
                                                    class="font-medium leading-none text-gray-900 dark:text-white">
                                                    {{ $reserve->name }}
                                                </label>
                                                <p id="reserve-{{ $reserve->id }}-text"
                                                    class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">
                                                    Disponível:
                                                    <span class="font-semibold">
                                                        {{ 'R$ ' . number_format($reserve->goal, 2, ',', '.') ?? 'No description available' }}
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @elseif($isSelect)
                            <!-- Select Multiple -->
                            <select
                                data-hs-select='{
        "placeholder": "Select categories...",
        "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
        "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
        "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
        "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
        "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-blue-600 dark:text-blue-500 \" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
        "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
    }'
                                {{ $field['multiple'] ? 'multiple' : '' }} name="categories[]" class="hidden">
                                <option value="">Choose categories...</option>
                                @foreach ($field['categories'] as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <!-- End Select Multiple -->
                        @else
                            <!-- Regular Input Field (for other types like text, email, etc.) -->
                            <input value="{{ isset($field['value']) ? $field['value'] : old($field['name'], '') }}"
                                type="{{ $field['type'] }}" id="{{ $field['id'] }}" name="{{ $field['name'] }}"
                                class="w-full py-3 px-4 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                {{ $field['required'] ? 'required' : '' }}
                                @isset($field['placeholder']) placeholder="{{ $field['placeholder'] }}" @endisset>

                            @error($field['name'])
                                <x-alert-errors-request :errors="$errors->get($field['name'])"></x-alert-errors-request>
                            @enderror
                        @endif
                    </div>
                </div>
            @endforeach

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
