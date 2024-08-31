<div>
    <nav class="bg-[#40C08C] p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            @if (request()->routeIs('dashboard-admin') === true)
                <ul class="text-white text-md font-semibold">
                    Hi, {{ auth()->user()->nama }}
                </ul>
            @endif
            @if (request()->routeIs('users', 'create-users', 'update-users') === true)
                <ul class="text-white text-md font-semibold">
                    {{ $title }}
                </ul>
            @endif
            {{--  --}}
            @if (request()->routeIs('users'))
                <button href="{{ route('dashboard-admin') }}" wire:navigate
                    class="text-white hover:bg-[#39ad7e] hover:text-white px-3 py-2 rounded-md font-medium">
                    <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 17l-5-5m0 0l5-5m-5 5h12"></path>
                    </svg>
                </button>
            @elseif (request()->routeIs('create-users', 'update-users'))
                <button href="{{ route('users') }}" wire:navigate
                    class="text-white hover:bg-[#39ad7e] hover:text-white px-3 py-2 rounded-md font-medium">
                    <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 17l-5-5m0 0l5-5m-5 5h12"></path>
                    </svg>
                </button>
            @endif

            @if (request()->routeIs('dashboard-admin') === true)
                <button wire:click='logout'
                    class="text-white hover:bg-[#39ad7e] hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                    Logout
                </button>
            @endif
        </div>
    </nav>
    {{-- <div class="flex space-x-4">
                <button href="{{ route('users') }}" wire:navigate
                    class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                    User
                </button>
                <button href="{{ route('users') }}" wire:navigate
                    class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                    Barang
                </button> --}}
</div>
