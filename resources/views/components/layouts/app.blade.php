<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>{{ $title ?? 'Techtonics' }} | Techtonics</title>
</head>

<body class="bg-gradient-to-t from-[#005477] to-[#009F9C] min-h-screen">
    <livewire:components.toast-notification />
    @if (request()->routeIs('login') === false)
        <livewire:components.navbar-admin />
    @endif
    <div class="container mx-auto px-4 my-8">
        {{ $slot }}
    </div>
    @if (request()->routeIs('login') === false)
        <livewire:components.footer />
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                let toast = document.getElementById('toast-notification');
                if (toast) {
                    toast.classList.add('opacity-0', 'transition-opacity', 'duration-300');
                    setTimeout(() => {
                        toast.remove();
                    }, 300);
                }
            }, 3000);
        });
    </script>
</body>

</html>
