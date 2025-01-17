@props(['name', 'validity', 'color'])

<div class="w-full p-5 rounded-lg shadow-lg text-white" style="background-color: {{ $color }};">
    <!-- Ícone de chip e wireless -->
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center">
            <div class="w-8 h-6 bg-yellow-500 rounded-sm mr-2"></div>
            <div class="w-5 h-5 bg-gray-300 rounded-full flex items-center justify-center">
                <i class="fa fa-wifi text-blue-900"></i>
            </div>
        </div>
    </div>
    <!-- Número do cartão -->
    <div class="text-xl font-mono tracking-wider mb-4">{{ $name }}</div>
    <!-- Detalhes do cartão -->
    <div class="flex justify-between items-center">
        <div>
            <div class="text-sm text-gray-400">Expires</div>
            <div class="text-lg font-semibold">{{ $validity }}</div>
        </div>
        <div class="w-12 h-8 bg-red-500 rounded-full flex items-center justify-center">
            <div class="w-8 h-8 bg-yellow-400 rounded-full"></div>
        </div>
    </div>
</div>
