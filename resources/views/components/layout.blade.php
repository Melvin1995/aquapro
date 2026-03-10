<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" data-theme="lofi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($title) ? $title . ' - ' . config('app.name', 'Aquapro') : config('app.name', 'Aquapro') }}</title>
    <link rel="preconnect" href="<https://fonts.bunny.net>">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
</head>

  <body
    x-data="{ page: 'blank', 'loaded': true, 'darkMode': false, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }"
    x-init="
         darkMode = JSON.parse(localStorage.getItem('darkMode'));
         $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
    {{-- :class="{'dark bg-gray-900': darkMode === true}" --}}
    class="dark bg-gray-900"
  >

    <x-preloader></x-preloader>

    <div class="flex h-screen overflow-hidden">
      <x-sidebar></x-sidebar>

      <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
        <x-overlay></x-overlay>

        <x-header></x-header>

        <main>
          <div class="mx-auto max-w-(--breakpoint-2xl) p-4 md:p-6">

            @if (session('success'))
            <div class="toast toast-top toast-center">
                <div class="alert alert-success animate-fade-out">
                    <svg xmlns="<http://www.w3.org/2000/svg>" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            </div>
        @endif

            <div class="min-h-screen rounded-2xl border border-gray-200 bg-white px-5 py-7 dark:border-gray-800 dark:bg-white/[0.03] xl:px-10 xl:py-12">
                {{ $slot }}
            </div>
          </div>
        </main>
      </div>
    </div>
  </body>

</html>
