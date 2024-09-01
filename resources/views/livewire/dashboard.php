<div class="min-h-screen">
    <livewire:components.toast-notification />
    <div class="flex flex-wrap justify-center items-center gap-3 my-5 lg:my-0">
        <div class="md:w-1/2 xl:w-1/3 bg-[#D4EAE6] hover:bg-[#b6dbd4] p-4 mb-4 rounded-md">
            <a href="{{ route('users') }}" wire:navigate>
                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-4 w-60 h-60" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
                <h2 class="text-lg font-semibold text-center">Kelola User</h2>
            </a>
        </div>
        <div class="md:w-1/2 xl:w-1/3 bg-[#D4EAE6] hover:bg-[#b6dbd4] p-4 mb-4 rounded-md">
            <a href="{{ route('items') }}" wire:navigate>
                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-4 w-60 h-60" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line>
                    <path
                        d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                    </path>
                    <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                    <line x1="12" y1="22.08" x2="12" y2="12"></line>
                </svg>
                <h2 class="text-lg font-semibold text-center">Kelola Barang</h2>
            </a>
        </div>
    </div>
</div>
