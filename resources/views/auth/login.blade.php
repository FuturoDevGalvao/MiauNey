@extends('layouts.guest')

@section('content')
    @php
        $fields = [
            [
                'type' => 'email',
                'name' => 'email',
                'id' => 'email',
                'label' => 'Seu email',
                'placeholder' => 'seuemail@exemplo.com',
            ],
            [
                'type' => 'password',
                'name' => 'password',
                'id' => 'password',
                'label' => 'Sua senha',
                'placeholder' => 'Informe sua senha',
            ],
            ['type' => 'checkbox', 'name' => 'remember', 'id' => 'remember', 'label' => 'Lembrar-me'],
        ];
    @endphp

    <x-form :action="'Entrar'" :route="route('login.auth')" :method="'POST'" :fields="$fields" :authenticated="$authenticated"
        :errorOccurred="$errorOccurred"></x-form>
@endsection

@if ($authenticated)
    <script>
        setTimeout(() => {
            window.location.href = "{{ route('root') }}";
        }, 3000); // Tempo em milissegundos (3 segundos neste exemplo)
    </script>
@endif
