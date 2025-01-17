@extends('layouts.auth')

@section('content')
    @if (false)
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
                        Perfil atualizado com sucesso!
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
            ['name' => 'Meu perfil', 'uri' => '#'],
            ['name' => 'Editar meu perfil', 'uri' => '#'],
        ];
    @endphp

    <x-header :resource="'Editar meu perfil'" :routesForBreadcrumb="$routes" :imagePath="'https://i.pinimg.com/originals/99/ea/36/99ea3646f45f3e0c86bc8d11b9bdcfb9.gif'">
    </x-header>

    <!-- Card Section -->
    <div class="w-[80%] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <!-- Card -->
            <div class="bg-white rounded-xl shadow dark:bg-neutral-900">
                <div id="banner-image" class="relative h-40 rounded-t-xl bg-no-repeat bg-cover bg-center"
                    style="background-image: url('{{ $user->banner_image_path ? asset('storage/' . $user->banner_image_path) : asset('images/banner-default.svg') }}')">
                    <div class="absolute top-0 end-0 p-4">
                        <input class="sr-only" type="file" name="bannerImage" id="banner-image-input">
                        <label for="banner-image-input"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                                <polyline points="17 8 12 3 7 8" />
                                <line x1="12" x2="12" y1="3" y2="15" />
                            </svg>
                            Carregar banner
                        </label>
                    </div>
                </div>

                <div class="pt-0 p-4 sm:pt-0 sm:p-7">
                    <!-- Grid -->
                    <div class="space-y-4 sm:space-y-6">
                        <div>
                            <label class="sr-only">
                                Product photo
                            </label>

                            <div class="flex flex-col sm:flex-row sm:items-center sm:gap-x-5">
                                @if ($user->profile_image_path)
                                    <img id="profile-image"
                                        class="-mt-8 relative z-10 inline-block size-24 mx-auto sm:mx-0 object-cover rounded-full ring-4 ring-white dark:ring-neutral-900"
                                        src="{{ isset($user->profile_image_path) ? asset('storage/' . $user->profile_image_path) : asset('images/user-default.jpg') }}">
                                @else
                                    <img id="profile-image"
                                        class="-mt-8 relative z-10 inline-block size-24 mx-auto sm:mx-0 object-cover rounded-full ring-4 ring-white dark:ring-neutral-900"
                                        src="{{ asset('images/user-default.jpg') }}" alt="Avatar">
                                @endif

                                <div class="mt-4 sm:mt-auto sm:mb-1.5 flex justify-center sm:justify-start gap-2">
                                    <label for="profile-image-input"
                                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                                            <polyline points="17 8 12 3 7 8" />
                                            <line x1="12" x2="12" y1="3" y2="15" />
                                        </svg>
                                        Carregar foto de perfil
                                    </label>
                                    <input class="sr-only" type="file" name="profileImage" id="profile-image-input">
                                    <button type="button"
                                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-red-500 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-2">
                            @error('profileImage')
                                <x-alert-errors-request :errors="$errors->get('bannerImage')"></x-alert-errors-request>
                            @enderror
                            @error('bannerImage')
                                <x-alert-errors-request :errors="$errors->get('bannerImage')"></x-alert-errors-request>
                            @enderror

                            <label for="name"
                                class="inline-flex items-center justify-center gap-2 text-sm font-bold text-gray-800 mt-2.5 dark:text-neutral-200">
                                <span class='text-red-500 text-lg'>*</span>
                                Nome </label>

                            <input value="{{ $user->name }}" name="name" id="name" type="text" required
                                class="py-3 ps-4 pe-10 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                placeholder="Informe seu novo nome de usuário">


                            @error('name')
                                <x-alert-errors-request :errors="$errors->get('name')"></x-alert-errors-request>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="email"
                                class="inline-flex items-center justify-center gap-2 text-sm font-bold text-gray-800 mt-2.5 dark:text-neutral-200">
                                <span class='text-red-500 text-lg'>*</span>
                                Email
                            </label>

                            <input value="{{ $user->email }}" name="email" id="email" type="email" required
                                class="py-3 ps-4 pe-10 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                placeholder="Informe seu novo email">


                            @error('email')
                                <x-alert-errors-request :errors="$errors->get('email')"></x-alert-errors-request>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="phone"
                                class="inline-flex items-center justify-center gap-2 text-sm font-bold text-gray-800 mt-2.5 dark:text-neutral-200">
                                <span class='text-red-500 text-lg'>*</span>
                                Telefone
                            </label>

                            <input value="{{ $user->phone }}" name="phone" id="phone" type="tel" required
                                class="py-3 ps-4 pe-10 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                placeholder="Informe seu novo telefone">


                            @error('phone')
                                <x-alert-errors-request :errors="$errors->get('phone')"></x-alert-errors-request>
                            @enderror
                        </div>
                    </div>
                    <!-- End Grid -->

                    <div class="mt-8 flex gap-x-2">
                        <button type="submit"
                            class="font-semibold py-3 px-4 inline-flex items-center gap-x-2 text-sm rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                            Atualizar perfil
                        </button>
                    </div>
                </div>
            </div>
            <!-- End Card -->
        </form>
    </div>
    <!-- End Card Section -->
@endsection

@section('specific-scripts')
    <script>
        const showPreview = (inputElement, targetElement, isBackground = false) => {
            const file = inputElement.files[0]; // Obtém o arquivo selecionado no input
            const fileReader = new FileReader();

            fileReader.onloadend = () => {
                if (isBackground) {
                    // Define o background-image no elemento alvo
                    targetElement.style.backgroundImage = `url('${fileReader.result}')`;
                } else {
                    // Define o src no elemento de imagem
                    targetElement.src = fileReader.result;
                }
            };

            if (file) {
                fileReader.readAsDataURL(file); // Lê o arquivo e gera um Data URL
            } else {
                if (isBackground) {
                    // Remove o background-image caso nenhum arquivo seja selecionado
                    targetElement.style.backgroundImage = "";
                } else {
                    // Restaura a imagem padrão caso nenhum arquivo seja selecionado
                    targetElement.src = targetElement.dataset.defaultImage || "";
                }
            }
        };

        // Exemplo de uso
        const profileImageInput = document.getElementById('profile-image-input');
        const profileImage = document.getElementById('profile-image');
        const bannerImageInput = document.getElementById('banner-image-input');
        const bannerImage = document.getElementById('banner-image');

        // Preview para um <img>
        profileImageInput.addEventListener('change', () => {
            showPreview(profileImageInput, profileImage);
        });

        // Preview para background-image
        bannerImageInput.addEventListener('change', () => {
            showPreview(bannerImageInput, bannerImage, true);
        });
    </script>
@endsection
