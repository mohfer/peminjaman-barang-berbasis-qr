<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>{{ $title ?? 'Techtonics' }} | Techtonics</title>
    @notifyCss
</head>

<body class="bg-gradient-to-t from-[#005477] to-[#009F9C] min-h-screen">
    <x-notify::notify />
    @if (request()->routeIs('login') === false)
        <livewire:components.navbar-admin />
    @endif
    <div class="container mx-auto px-4">
        {{ $slot }}
    </div>
    @if (request()->routeIs('login') === false)
        <livewire:components.footer />
    @endif
    @notifyJs
</body>

</html>
