@extends('layouts.guest')

@section('content')
    @php
        $fields = [
            [
                'type' => 'text',
                'name' => 'name',
                'id' => 'name',
                'label' => 'Seu nome',
                'placeholder' => 'Informe seu nome',
            ],
            [
                'type' => 'text',
                'name' => 'phone',
                'id' => 'phone',
                'label' => 'Seu telefone',
                'placeholder' => 'Informe seu telefone - EX: (xx) xxxxx-xxxx',
            ],
            [
                'type' => 'email',
                'name' => 'email',
                'id' => 'email',
                'label' => 'Seu email',
                'placeholder' => 'Informe seu email - EX: seuemail@exemplo.com',
            ],
            [
                'type' => 'password',
                'name' => 'password',
                'id' => 'password',
                'label' => 'Sua senha',
                'placeholder' => 'Defina sua senha',
            ],
            [
                'type' => 'password',
                'name' => 'confirmPassword',
                'id' => 'confirmPassword',
                'label' => 'Confirme sua senha',
                'placeholder' => 'Confirme a senha definida',
            ],
        ];
    @endphp
    <x-form :action="'Cadastrar'" :route="route('register.store')" :method="'POST'" :fields="$fields" :authenticated="$authenticated" :errorOccurred="$errorOccurred"
        :newUserName="$newUserName"></x-form>
@endsection

@section('specific-scripts')
    @if ($authenticated)
        <script>
            setTimeout(() => {
                window.location.href = "{{ route('root') }}";
            }, 1000 * 10); // Tempo em milissegundos (3 segundos neste exemplo)
        </script>
    @endif
@endsection
