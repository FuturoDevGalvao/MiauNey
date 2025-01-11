@props(['resource', 'routesForBreadcrumb', 'imagePath'])

<div class="min-w-[100%] flex flex-col gap-3 max-w-4xl px-4 lg:px-8 sticky top-0 z-10 backdrop-blur-lg bg-white/70">
    <div class="flex flex-wrap items-center gap-4">
        <img class="sm:size-20 size-24 rounded-full" src="{{ $imagePath }}" alt="">
        <div>
            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold">
                {{ $resource }}
            </h1>

            <x-breadcrumb :routes="$routesForBreadcrumb"></x-breadcrumb>
        </div>
    </div>
</div>
