<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $title ?? 'Panel' }}</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
</head>

<body class="min-h-screen flex flex-col w-full overflow-x-hidden bg-slate-100 font-inter antialiased">
    @persist('nav')
        <x-layout.navbar />
    @endpersist
    <main class="mx-[3%] mt-4 md:mx-[6%] md:mt-8 mb-7 md:mb-14">
        {{ $slot }}
    </main>
    <div class="mt-auto">
        @persist('footer')
            <x-layout.footer />
            <x-toaster-hub />
        @endpersist
    </div>
    @livewireScriptConfig
</body>

</html>
