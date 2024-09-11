<div class="min-h-screen">
    <livewire:components.toast-notification />
    @session('success')
        <div aria-live="assertive" id="toast-notification" x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
            class="pointer-events-none fixed inset-x-0 bottom-0 px-4 pb-4 sm:px-6 sm:pb-6 mb-20 md:mb-4">
            <div class="flex justify-center sm:justify-end">
                <div
                    class="pointer-events-auto w-full max-w-sm overflow-hidden rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5">
                    <div class="p-4">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <svg class="h-6 w-6 text-green-400" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="ml-3 w-0 flex-1 pt-0.5">
                                <p class="text-sm font-medium text-gray-900">{{ Session::get('success') }}</p>
                            </div>
                            <div class="ml-4 flex flex-shrink-0">
                                <button type="button" @click="show = false"
                                    class="inline-flex rounded-lg bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                    <span class="sr-only">Close</span>
                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path
                                            d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsession
    @session('error')
        <div aria-live="assertive" id="toast-notification" x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)"
            x-show="show" class="pointer-events-none fixed inset-x-0 bottom-0 px-4 pb-4 sm:px-6 sm:pb-6 mb-20 md:mb-4">
            <div class="flex justify-center sm:justify-end">
                <div
                    class="pointer-events-auto w-full max-w-sm overflow-hidden rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5">
                    <div class="p-4">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <svg class="h-6 w-6 text-red-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </div>
                            <div class="ml-3 w-0 flex-1 pt-0.5">
                                <p class="text-sm font-medium text-gray-900">{{ Session::get('error') }}</p>
                            </div>
                            <div class="ml-4 flex flex-shrink-0">
                                <button type="button" @click="show = false"
                                    class="inline-flex rounded-lg bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                    <span class="sr-only">Close</span>
                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path
                                            d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsession
    <div class="flex flex-wrap justify-center items-center gap-3 my-5 lg:my-0">
        @can('admin')
            <div class="container mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                    <a href="{{ route('users') }}" wire:navigate
                        class="bg-[#D4EAE6] hover:shadow-lg transition-shadow duration-300 rounded-lg border border-gray-200 p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-xl font-bold text-gray-800">Jumlah Pengguna</h2>
                        </div>
                        <p class="text-4xl text-gray-800 text-center sm:text-start">{{ $this->users }}</p>
                    </a>

                    <a href="{{ route('items') }}" wire:navigate
                        class="bg-[#D4EAE6] hover:shadow-lg transition-shadow duration-300 rounded-lg border border-gray-200 p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-xl font-bold text-gray-800">Jumlah Barang</h2>
                        </div>
                        <p class="text-4xl text-gray-800 text-center sm:text-start">{{ $this->items }}</p>
                    </a>

                    <div
                        class="bg-[#D4EAE6] hover:shadow-lg transition-shadow duration-300 rounded-lg border border-gray-200 p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-xl font-bold text-gray-800">Sisa Stok Barang</h2>
                        </div>
                        <ul class="space-y-2">
                            @foreach ($stock as $item)
                                <li class="flex justify-between items-center bg-[#D4EAE6] rounded-lg">
                                    <span class="text-gray-800">{{ $item->name }}</span>
                                    <span class="text-gray-800">{{ $item->qty }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <a href="{{ route('status') }}" wire:navigate
                        class="bg-[#D4EAE6] hover:shadow-lg transition-shadow duration-300 rounded-lg border border-gray-200 p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-xl font-bold text-gray-800">Peminjaman Aktif</h2>
                        </div>
                        <p class="text-4xl text-gray-800 text-center sm:text-start">{{ $this->stillBorrowed }}</p>
                    </a>

                    <a href="{{ route('histories') }}" wire:navigate
                        class="bg-[#D4EAE6] hover:shadow-lg transition-shadow duration-300 rounded-lg border border-gray-200 p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-xl font-bold text-gray-800">Peminjaman Hari Ini</h2>
                        </div>
                        <p class="text-4xl text-gray-800 text-center sm:text-start">{{ $this->borrowed }}</p>
                    </a>
                    <a href="{{ route('histories') }}" wire:navigate
                        class="bg-[#D4EAE6] hover:shadow-lg transition-shadow duration-300 rounded-lg border border-gray-200 p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-xl font-bold text-gray-800">Pengembalian Hari Ini</h2>
                        </div>
                        <p class="text-4xl text-gray-800 text-center sm:text-start">{{ $this->returned }}</p>
                    </a>
                </div>
            </div>
        @endcan
        @can('user')
            <div class="md:grid md:grid-cols-2 flex flex-col-reverse gap-4 sm:mx-0 lg:mx-32 md:mx-12">
                <div class="bg-[#D4EAE6] rounded-lg p-4 shadow-md">
                    <h2 class="text-xl font-bold mb-4">Record</h2>
                    <ul class="space-y-2">
                        <div class="flex flex-col space-y-4">
                            @if ($this->allZero)
                                <div class="flex justify-center items-center h-64">
                                    <h1 class="text-2xl font-bold text-gray-800">No data found!</h1>
                                </div>
                            @else
                                @foreach ($stillBorrowedItems as $borrowedItem)
                                    <div class="bg-[#D4EAE6] border border-gray-500 rounded-lg p-4 flex flex-col">
                                        <h3 class="text-lg font-bold mb-2">{{ $borrowedItem['item']->name }}</h3>
                                        <div class="flex justify-between mb-2">
                                            <span class="text-gray-600">Code</span>
                                            <span class="font-medium">{{ $borrowedItem['item']->code }}</span>
                                        </div>
                                        <div class="flex justify-between mb-2">
                                            <span class="text-gray-600">Type</span>
                                            <span class="font-medium">{{ $borrowedItem['item']->type }}</span>
                                        </div>
                                        <div class="flex justify-between mb-2">
                                            <span class="text-gray-600">Quantity Borrowed</span>
                                            <span class="font-medium">{{ $borrowedItem['final'] }}</span>
                                        </div>
                                        <div class="flex justify-between mb-2">
                                            <span class="text-gray-600">Status</span>
                                            <span
                                                class="px-2 py-1 text-xs font-semibold text-white bg-[#39A0FF] rounded-full">
                                                Borrowed
                                            </span>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </ul>
                </div>
                <div class="space-y-4">
                    <div class="bg-[#D4EAE6] rounded-lg p-4 shadow-md">
                        <h2 class="text-xl font-bold mb-2">About Us</h2>
                        <p class="text-sm">
                            Website ini dirancang untuk memfasilitasi peminjaman berbagai alat pendukung perkuliahan.
                            Platform ini bertujuan untuk mempermudah mahasiswa dalam mengakses peralatan yang dibutuhkan
                            secara cepat dan efisien. Selain itu, sistem ini turut berkontribusi dalam mengoptimalkan
                            pemanfaatan sumber daya kampus, memastikan agar peralatan tersebut dapat digunakan secara
                            maksimal oleh seluruh civitas akademika.
                        </p>
                    </div>
                    <a href="{{ route('scan') }}"
                        class="hidden md:flex bg-[#D4EAE6] rounded-lg p-4 shadow-md items-center justify-center space-x-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2">
                            <path d="M4 4h4v4H4z" />
                            <path d="M16 4h4v4h-4z" />
                            <path d="M4 16h4v4H4z" />
                            <path d="M2 12h20" stroke-dasharray="2 2" />
                            <path d="M12 2v20" stroke-dasharray="2 2" />
                        </svg>
                        <span class="text-lg font-semibold">Scan QR Code</span>
                    </a>
                </div>
            </div>
        @endcan
    </div>
</div>
