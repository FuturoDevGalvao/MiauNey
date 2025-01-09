@props(['errors'])

<div class="bg-red-50 border mt-2 border-red-200 text-sm text-red-800 rounded-lg p-4 dark:bg-red-800/10 dark:border-red-900 dark:text-red-500"
    role="alert" tabindex="-1" aria-labelledby="hs-with-list-label">
    <div class="flex">
        <div class="shrink-0">
            <svg class="shrink-0 size-4 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"></circle>
                <path d="m15 9-6 6"></path>
                <path d="m9 9 6 6"></path>
            </svg>
        </div>
        <div class="ms-4">
            <h3 id="hs-with-list-label" class="text-sm font-semibold">
                Ocorreu um problema ao enviar seus dados.
            </h3>
            <div class="mt-2 text-sm text-red-700 dark:text-red-400">
                <ul class="list-disc space-y-1 ps-5">
                    @foreach ($errors as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
