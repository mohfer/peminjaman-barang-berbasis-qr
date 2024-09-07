<div class="sticky bottom-0 left-0 w-full">
    @can('admin')
        <h1 class="text-center bg-[#40C08C] text-white py-1">Copyright © Informatika 2024</h1>
    @endcan
    @can('admin')
        <div
            class="md:hidden fixed bottom-0 left-0 w-full bg-[#40C08C] flex justify-between items-center px-4 py-2 shadow-lg">
            <a href="{{ route('dashboard') }}" wire:navigate class="text-white hover:text-white bg-[#009F9C] rounded-full">
                <svg class="w-8 h-8 shadow-md rounded-full text-gray-800 dark:text-white" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9.143 4H4.857A.857.857 0 0 0 4 4.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 10 9.143V4.857A.857.857 0 0 0 9.143 4Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 20 9.143V4.857A.857.857 0 0 0 19.143 4Zm-10 10H4.857a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286A.857.857 0 0 0 9.143 14Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286a.857.857 0 0 0-.857-.857Z" />
                </svg>
            </a>
            <a href="{{ route('users') }}" wire:navigate class="text-white hover:text-white bg-[#009F9C] rounded-full">
                <svg class="w-8 h-8 shadow-md rounded-full text-gray-800 dark:text-white" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z"
                        clip-rule="evenodd" />
                </svg>
            </a>
            <a href="{{ route('items') }}" wire:navigate class="text-white hover:text-white bg-[#009F9C] rounded-full">
                <svg class="w-8 h-8 shadow-md rounded-full text-gray-800 dark:text-white" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M12.013 6.175 7.006 9.369l5.007 3.194-5.007 3.193L2 12.545l5.006-3.193L2 6.175l5.006-3.194 5.007 3.194ZM6.981 17.806l5.006-3.193 5.006 3.193L11.987 21l-5.006-3.194Z" />
                    <path
                        d="m12.013 12.545 5.006-3.194-5.006-3.176 4.98-3.194L22 6.175l-5.007 3.194L22 12.562l-5.007 3.194-4.98-3.211Z" />
                </svg>
            </a>
            <a href="{{ route('status') }}" wire:navigate class="text-white hover:text-white bg-[#009F9C] rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 16V5a2 2 0 012-2h6a2 2 0 012 2v11M7 16l2 2h6l2-2M5 20h14" />
                </svg>
            </a>
            <a href="{{ route('histories') }}" wire:navigate class="text-white hover:text-white bg-[#009F9C] rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="w-8 h-8 shadow-md rounded-full">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </a>
        </div>
    @endcan
    @can('user')
        <h1 class="text-center bg-[#40C08C] text-white py-1">Copyright © Informatika 2024</h1>
    @endcan
    @can('user')
        <div
            class="md:hidden fixed bottom-0 left-0 w-full bg-[#40C08C] flex justify-between items-center px-4 py-2 shadow-lg">
            <a href="{{ route('dashboard') }}" class="text-white hover:text-white bg-[#009F9C] rounded-full">
                <svg class="w-8 h-8 shadow-md rounded-full text-gray-800 dark:text-white" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9.143 4H4.857A.857.857 0 0 0 4 4.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 10 9.143V4.857A.857.857 0 0 0 9.143 4Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 20 9.143V4.857A.857.857 0 0 0 19.143 4Zm-10 10H4.857a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286A.857.857 0 0 0 9.143 14Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286a.857.857 0 0 0-.857-.857Z" />
                </svg>
            </a>
            <a href="{{ route('item-lists') }}" class="text-white hover:text-white bg-[#009F9C] rounded-full">
                <svg class="w-8 h-8 shadow-md rounded-full text-gray-800 dark:text-white" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                        d="M9 8h10M9 12h10M9 16h10M4.99 8H5m-.02 4h.01m0 4H5" />
                </svg>

            </a>
            <a href="{{ route('scan') }}" class="bg-[#009F9C] mt-[-40px] rounded-full p-2 shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-white" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2">
                    <path d="M4 4h4v4H4z" />
                    <path d="M16 4h4v4h-4z" />
                    <path d="M4 16h4v4H4z" />
                    <path d="M2 12h20" stroke-dasharray="2 2" />
                    <path d="M12 2v20" stroke-dasharray="2 2" />
                </svg>
            </a>
            <a href="{{ route('status') }}" class="text-white hover:text-white bg-[#009F9C] rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 16V5a2 2 0 012-2h6a2 2 0 012 2v11M7 16l2 2h6l2-2M5 20h14" />
                </svg>
            </a>
            <a href="{{ route('histories') }}" class="text-white hover:text-white bg-[#009F9C] rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="w-8 h-8 shadow-md rounded-full">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </a>
        </div>
    @endcan
</div>
