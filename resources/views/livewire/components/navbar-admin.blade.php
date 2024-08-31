<div class="w-full">
    <nav class="bg-[#40C08C] p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            @if (request()->routeIs('dashboard-admin') === true)
                <ul class="text-white text-md font-semibold">
                    Hi, {{ auth()->user()->name }}
                </ul>
            @endif
            @if (request()->routeIs('users', 'create-users', 'update-users', 'items', 'create-items', 'update-items') === true)
                <ul class="text-white text-md font-semibold">
                    {{ $title }}
                </ul>
            @endif
            @if (request()->routeIs('users'))
                <a href="{{ route('dashboard-admin') }}" wire:navigate
                    class="text-white hover:bg-[#39ad7e] hover:text-white px-3 py-2 rounded-md font-medium">
                    <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 17l-5-5m0 0l5-5m-5 5h12"></path>
                    </svg>
                </a>
            @elseif (request()->routeIs('create-users', 'update-users'))
                <a href="{{ route('users') }}" wire:navigate
                    class="text-white hover:bg-[#39ad7e] hover:text-white px-3 py-2 rounded-md font-medium">
                    <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 17l-5-5m0 0l5-5m-5 5h12"></path>
                    </svg>
                </a>
            @elseif (request()->routeIs('items'))
                <a href="{{ route('dashboard-admin') }}" wire:navigate
                    class="text-white hover:bg-[#39ad7e] hover:text-white px-3 py-2 rounded-md font-medium">
                    <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 17l-5-5m0 0l5-5m-5 5h12"></path>
                    </svg>
                </a>
            @elseif (request()->routeIs('create-items', 'update-items'))
                <a href="{{ route('items') }}" wire:navigate
                    class="text-white hover:bg-[#39ad7e] hover:text-white px-3 py-2 rounded-md font-medium">
                    <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 17l-5-5m0 0l5-5m-5 5h12"></path>
                    </svg>
                </a>
            @endif

            @if (request()->routeIs('dashboard-admin') === true)
                <button wire:click='logout'
                    class="text-white hover:bg-[#39ad7e] hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                    Logout
                </button>
            @endif
        </div>
    </nav>
</div>
