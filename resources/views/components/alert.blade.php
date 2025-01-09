@props(['authenticated', 'title', 'message', 'user'])

@php
    $styles = [
        'error' => [
            'bgClass' => 'bg-red-50 dark:bg-red-800/30',
            'borderClass' => 'border-s-4 border-red-500',
            'iconBgClass' => 'bg-red-200 dark:bg-red-800',
            'iconBorderClass' => 'border-red-100 dark:border-red-900',
            'iconTextClass' => 'text-red-800 dark:text-red-400',
            'iconPath' => '<path d="M18 6 6 18"></path><path d="m6 6 12 12"></path>',
        ],
        'success' => [
            'bgClass' => 'bg-teal-50 dark:bg-teal-800/30',
            'borderClass' => 'border-t-2 border-teal-500',
            'iconBgClass' => 'bg-teal-200 dark:bg-teal-800',
            'iconBorderClass' => 'border-teal-100 dark:border-teal-900',
            'iconTextClass' => 'text-teal-800 dark:text-teal-400',
            'iconPath' =>
                '<path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path><path d="m9 12 2 2 4-4"></path>',
        ],
    ];

    $styleToUse = $authenticated ? $styles['success'] : $styles['error'];
@endphp

<!-- Alerta Dinâmico -->
<div class="{{ $styleToUse['bgClass'] }} {{ $styleToUse['borderClass'] }} rounded-lg p-3 mb-4" role="alert">
    <div class="flex">
        <div class="shrink-0">
            <!-- Ícone -->
            <span
                class="inline-flex justify-center items-center size-8 rounded-full border-4 {{ $styleToUse['iconBorderClass'] }} {{ $styleToUse['iconBgClass'] }} {{ $styleToUse['iconTextClass'] }}">
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    {!! $styleToUse['iconPath'] !!}
                </svg>
            </span>
            <!-- Fim do Ícone -->
        </div>
        <div class="ms-3">
            <h3 class="text-gray-800 font-semibold dark:text-white">{{ $title }}</h3>
            <p class="text-sm text-gray-700 dark:text-neutral-400">{{ $message }}</p>
        </div>
    </div>
</div>
