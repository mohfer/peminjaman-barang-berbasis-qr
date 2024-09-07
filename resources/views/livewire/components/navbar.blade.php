<div class="w-full fixed top-0 right-0 z-[999]">
    <nav class="bg-[#40C08C] p-4 shadow-md ">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-white text-md font-semibold">
                @can('admin')
                    {{ $title }}
                @endcan
                @can('user')
                    {{ $title }}
                @endcan
            </div>

            <div class="flex items-center">
                @can('admin')
                    <div class="hidden md:flex">
                        <a href="{{ route('dashboard') }}" wire:navigate
                            class="text-white hover:bg-[#39ad7e] @if (request()->routeIs('dashboard')) bg-[#39ad7e] @endif hover:text-white px-3 py-2 rounded-lg text-sm">
                            Dashboard
                        </a>
                        <a href="{{ route('users') }}" wire:navigate
                            class="text-white hover:bg-[#39ad7e] @if (request()->routeIs('users', 'create-users', 'update-users', 'detail')) bg-[#39ad7e] @endif hover:text-white px-3 py-2 rounded-lg text-sm">
                            User
                        </a>
                        <a href="{{ route('items') }}" wire:navigate
                            class="text-white hover:bg-[#39ad7e] @if (request()->routeIs('items', 'create-items', 'update-items')) bg-[#39ad7e] @endif hover:text-white px-3 py-2 rounded-lg text-sm">
                            Item
                        </a>
                        <a href="{{ route('status') }}" wire:navigate
                            class="text-white hover:bg-[#39ad7e] @if (request()->routeIs('status')) bg-[#39ad7e] @endif hover:text-white px-3 py-2 rounded-lg text-sm">
                            Status
                        </a>
                        <a href="{{ route('histories') }}" wire:navigate
                            class="text-white hover:bg-[#39ad7e] @if (request()->routeIs('histories')) bg-[#39ad7e] @endif hover:text-white px-3 py-2 rounded-lg text-sm">
                            History
                        </a>
                        <a href="{{ route('profile') }}" wire:navigate
                            class="text-white hover:bg-[#39ad7e] @if (request()->routeIs('profile')) bg-[#39ad7e] @endif hover:text-white px-3 py-2 rounded-lg text-sm">
                            Profile
                        </a>
                        <button wire:click='logout' wire:confirm="Are you sure you want to logout?"
                            class="text-white hover:bg-[#39ad7e] hover:text-white px-3 py-2 rounded-lg text-sm">
                            Logout
                        </button>
                    </div>
                    <div class="flex md:hidden">
                        <a href="{{ route('profile') }}" wire:navigate
                            class="text-white hover:text-white bg-[#009F9C] rounded-full">
                            @if ($this->image)
                                <img src="{{ asset('storage/images/users/' . $this->image) }}" alt="Profile Picture"
                                    class="rounded-full w-8 h-8 object-cover">
                            @else
                                <img src="https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg"
                                    alt="No Image Available" class="rounded-full w-8 h-8 object-cover">
                            @endif
                        </a>
                    </div>
                @endcan
                @can('user')
                    <div class="hidden md:flex">
                        <a href="{{ route('dashboard') }}"
                            class="text-white hover:bg-[#39ad7e] @if (request()->routeIs('dashboard')) bg-[#39ad7e] @endif hover:text-white px-3 py-2 rounded-lg text-sm">
                            Dashboard
                        </a>
                        <a href="{{ route('item-lists') }}"
                            class="text-white hover:bg-[#39ad7e] @if (request()->routeIs('item-lists')) bg-[#39ad7e] @endif hover:text-white px-3 py-2 rounded-lg text-sm">
                            Item List
                        </a>
                        <a href="{{ route('status') }}"
                            class="text-white hover:bg-[#39ad7e] @if (request()->routeIs('status')) bg-[#39ad7e] @endif hover:text-white px-3 py-2 rounded-lg text-sm">
                            Status
                        </a>
                        <a href="{{ route('histories') }}"
                            class="text-white hover:bg-[#39ad7e] @if (request()->routeIs('histories')) bg-[#39ad7e] @endif hover:text-white px-3 py-2 rounded-lg text-sm">
                            History
                        </a>
                        <a href="{{ route('profile') }}"
                            class="text-white hover:bg-[#39ad7e] @if (request()->routeIs('profile')) bg-[#39ad7e] @endif hover:text-white px-3 py-2 rounded-lg text-sm">
                            Profile
                        </a>
                    </div>
                    <div class="hidden md:block">
                        <button wire:click='logout' wire:confirm="Are you sure you want to logout?"
                            class="text-white hover:bg-[#39ad7e] hover:text-white px-3 py-2 rounded-lg text-sm">
                            Logout
                        </button>
                    </div>
                    <div class="flex md:hidden">
                        <a href="{{ route('profile') }}" wire:navigate
                            class="text-white hover:text-white bg-[#009F9C] rounded-full">
                            @if ($this->image)
                                <img src="{{ asset('storage/images/users/' . $this->image) }}" alt="Profile Picture"
                                    class="rounded-full w-8 h-8 object-cover">
                            @else
                                <img src="https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg"
                                    alt="No Image Available" class="rounded-full w-8 h-8 object-cover">
                            @endif
                        </a>
                    </div>
                @endcan
            </div>
        </div>
    </nav>
</div>
