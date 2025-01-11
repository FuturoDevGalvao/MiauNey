@extends('layouts.auth')


@section('content')
    <div class="flex flex-col justify-center items-center">
        <div id="hs-doughnut-chart"></div>

        <!-- Legend Indicator -->
        <div class="flex justify-center sm:justify-end items-center gap-x-4 mt-3 sm:mt-6">
            <div class="inline-flex items-center">
                <span class="size-2.5 inline-block bg-blue-600 rounded-sm me-2"></span>
                <span class="text-[13px] text-gray-600 dark:text-neutral-400">
                    Income
                </span>
            </div>
            <div class="inline-flex items-center">
                <span class="size-2.5 inline-block bg-cyan-500 rounded-sm me-2"></span>
                <span class="text-[13px] text-gray-600 dark:text-neutral-400">
                    Outcome
                </span>
            </div>
            <div class="inline-flex items-center">
                <span class="size-2.5 inline-block bg-gray-300 rounded-sm me-2 dark:bg-neutral-700"></span>
                <span class="text-[13px] text-gray-600 dark:text-neutral-400">
                    Others
                </span>
            </div>
        </div>
        <!-- End Legend Indicator -->
    </div>
@endsection

@section('specific-scripts')
    @vite(['resources/js/dashboard/index.js'])
@endsection
