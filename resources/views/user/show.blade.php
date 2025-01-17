@extends('layouts.auth')


@section('content')
    @php
        $routes = [['name' => 'Home', 'uri' => route('root')], ['name' => 'Meu perfil', 'uri' => '#']];
    @endphp

    <x-header :resource="'Meu perfil'" :routesForBreadcrumb="$routes" :imagePath="'https://i.pinimg.com/originals/99/ea/36/99ea3646f45f3e0c86bc8d11b9bdcfb9.gif'">
    </x-header>

    <!-- Card Section -->
    <div class="w-[80%] max-w-4xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Card -->
        <div class="bg-white rounded-xl shadow dark:bg-neutral-900">
            <div class="relative h-40 rounded-t-xl bg-no-repeat bg-cover bg-center"
                style="background-image: url('{{ $user->banner_image_path ? asset('storage/' . $user->banner_image_path) : asset('images/banner-default.svg') }}')">

                <div class="absolute top-0 end-0 p-4">
                    <a href="{{ route('users.edit', ['user' => $user->id]) }}"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                        <svg class="size-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                        </svg>
                        Editar perfil
                    </a>
                </div>
            </div>

            <div class="pt-0 p-4 sm:pt-0 sm:p-7">
                <!-- Grid -->
                <div class="space-y-4 sm:space-y-6">
                    <div class="mb-8">
                        <label class="sr-only">
                            Product photo
                        </label>

                        <div class="flex flex-col sm:flex-row sm:items-center sm:gap-x-5">
                            @if ($user->profile_image_path)
                                <img class="-mt-8 relative z-10 inline-block size-24 mx-auto sm:mx-0 object-cover rounded-full ring-4 ring-white dark:ring-neutral-900"
                                    src="{{ isset($user->profile_image_path) ? asset('storage/' . $user->profile_image_path) : asset('images/user-default.jpg') }}">
                            @else
                                <img class="-mt-8 relative z-10 inline-block size-24 mx-auto sm:mx-0 object-cover rounded-full ring-4 ring-white dark:ring-neutral-900"
                                    src="{{ asset('images/user-default.jpg') }}" alt="Avatar">
                            @endif
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <span class="inline-block text-sm font-medium text-gray-800 dark:text-neutral-200">
                            Nome
                        </span>

                        <span class="text-lg font-semibold">
                            {{ $user->name }}
                        </span>
                    </div>

                    <div class="flex flex-col">
                        <span class="inline-block text-sm font-medium text-gray-800 dark:text-neutral-200">
                            Endereço de email
                        </span>

                        <span class="text-lg font-semibold">
                            {{ $user->email }}
                        </span>
                    </div>

                    <div class="flex flex-col">
                        <span class="inline-block text-sm font-medium text-gray-800 dark:text-neutral-200">
                            Telefone
                        </span>

                        <span class="text-lg font-semibold">
                            {{ $user->phone }}
                        </span>
                    </div>
                </div>
                <!-- End Grid -->
            </div>
        </div>
    </div>
    <!-- End Card Section -->
@endsection
