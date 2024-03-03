<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Authentication Module - {{ config('app.name', 'Laravel') }}</title>

    <meta name="description" content="{{ $description ?? '' }}">
    <meta name="keywords" content="{{ $keywords ?? '' }}">
    <meta name="author" content="{{ $author ?? '' }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />


    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Vite CSS --}}
    {{-- {{ module_vite('build-authentication', 'resources/assets/sass/app.scss') }} --}}
</head>

<body>

    <section class="bg-gray-50 dark:bg-gray-900">
    
        @if (session('status'))
        <div id="toast-status" class="absolute top-2 left-2 flex items-center w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
            @php
            $statusParts = explode(':', session('status'));
            $statusType = trim($statusParts[0]);
            $statusMessage = trim($statusParts[1]);
        @endphp

        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8
            @if ($statusType === 'Success') text-green-500 bg-green-100 dark:bg-green-800 dark:text-green-200
            @elseif ($statusType === 'Error') text-orange-500 bg-orange-100 dark:bg-orange-700 dark:text-orange-200
            @endif
            rounded-lg">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                @if ($statusType === 'Success')
                    <path d="M10 0C4.476 0 0 4.476 0 10s4.476 10 10 10 10-4.476 10-10S15.524 0 10 0zm5 7l-8 8-5-5 1.5-1.5L7 11l6.5-6.5L15 7z"/>
                @elseif ($statusType === 'Error')
                    <path fill-rule="evenodd" d="M10 0C4.477 0 0 4.477 0 10c0 5.524 4.477 10 10 10s10-4.476 10-10c0-5.523-4.477-10-10-10zm0 18.75A8.75 8.75 0 1 1 10 1.25a8.75 8.75 0 0 1 0 17.5zM10 5a1 1 0 0 1 1 1v5a1 1 0 1 1-2 0V6a1 1 0 0 1 1-1zm1 11a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                @endif
            </svg>
        </div>
        
        <div class="ms-3 text-sm font-normal">{{ $statusMessage }}</div>
            <button id="hide-toast-status" type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-status" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
        @endif
    @yield('content')

    </section>

    <script type="module">

    $(document).ready(function(){


    // target element that will be dismissed
    const $targetEl = document.getElementById('toast-status');

    if($targetEl){
    // optional trigger element
    const $triggerEl = document.getElementById('hide-toast-status');

    // options object
    const options = {
    transition: 'transition-opacity',
    duration: 100,
    timing: 'ease-out',

    // callback functions
    onHide: (context, targetEl) => {
        console.log('element has been dismissed')
        console.log(targetEl)
    }
    };

    // instance options object
    const instanceOptions = {
    id: 'toast-status',
    override: true
    };

    /*
    * $targetEl (required)
    * $triggerEl (optional)
    * options (optional)
    * instanceOptions (optional)
    */
    const dismiss = new Dismiss($targetEl, $triggerEl, options, instanceOptions);

    setTimeout(function(){
        dismiss.hide();
    }, 2000)

    }

    const $targetEls = $('.alert-error-form'); // Memilih semua elemen dengan kelas 'alert-error-form'

$targetEls.each(function() {
    const $targetEl = $(this); // Memilih elemen saat ini dalam iterasi
    const $triggerEl = $targetEl.find('.trigger-alert-error-form'); // Mencari elemen '.trigger-alert-error-form' di dalam elemen '.alert-error-form' saat ini

    const options = {
        transition: 'transition-opacity',
        duration: 100,
        timing: 'ease-out',
        onHide: (context, targetEl) => {
            // Logika callback onHide Anda di sini
        }
    };

    const dismiss = new Dismiss($targetEl[0], $triggerEl[0], options);

      setTimeout(function(){
            dismiss.hide();
        }, 10000);
    });



    })

    
    </script>
    {{-- Vite JS --}}
    {{-- {{ module_vite('build-authentication', 'resources/assets/js/app.js') }} --}}
</body>
