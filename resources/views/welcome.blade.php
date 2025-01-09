@extends('layouts.auth')

@section('content')
    <div class="min-w-[100%] flex flex-col gap-3 max-w-4xl px-4 lg:px-8 border">
        <div class="flex flex-wrap items-center gap-4">
            <img class="sm:size-20 size-24 rounded-full"
                src="https://i.pinimg.com/originals/4b/26/87/4b2687b20a079d25995fef5193a2f12f.gif" alt="">
            <div>
                <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold">
                    Olá, {{ mb_split(' ', Auth::user()->name)[0] }}!
                </h1>
            </div>
        </div>
    </div>
@endsection
