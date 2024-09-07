<div class="min-h-screen">
    <livewire:components.toast-notification />
    <div class="flex justify-center mb-4 gap-2">
        <input type="text"
            class="bg-[#D4EAE6] p-2 rounded-full w-full sm:w-1/2 px-4 focus:outline-none focus:ring-[#31867C] focus:border-[#31867C] sm:text-sm"
            placeholder="Search..." wire:model.live="search">
        <a href='{{ route('create-items') }}' wire:navigate
            class="px-4 py-2 bg-[#D4EAE6] hover:bg-[#b6dbd4] font-medium rounded-full">
            Tambah
        </a>
    </div>
    <div class="flex justify-center mb-4">
        <div class="w-full sm:w-1/2">
            {{ $items->links('pagination::tailwind') }}
        </div>
    </div>

    <div class="flex justify-center flex-wrap gap-3">
        @foreach ($items as $item)
            <div class="w-full sm:w-1/2 md:1/4 lg:w-1/6">
                <div class="bg-[#D4EAE6] p-6 rounded-lg h-full">
                    <div class="flex justify-center mb-4">
                        @if ($item->image)
                            <img src="{{ asset('storage/images/items/' . $item->image) }}" alt="Profile Picture"
                                class="rounded-full w-24 h-24 object-cover">
                        @else
                            <img src="https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg"
                                alt="No Image Available" class="rounded-full w-24 h-24 object-cover">
                        @endif
                    </div>
                    <div class="text-center mb-2">
                        <h2 class="font-bold text-xl">{{ $item->name }}</h2>
                        <p class="text-gray-700">{{ $item->qty }}</p>
                    </div>
                    <div class="flex justify-center mt-4 text-center gap-4">
                        <a href="{{ route('update-items', $item->token) }}" wire:navigate
                            class="bg-[#1BC300] hover:bg-[#18af00] text-white font-bold py-2 px-4 rounded-full w-full focus:outline-none focus:shadow-outline">Update</a>
                        <button wire:click="delete('{{ $item->token }}')" wire:navigate
                            wire:confirm="Are you sure you want to delete this item?"
                            class="bg-[#FF3939] hover:bg-[#ff1919] text-white font-bold py-2 px-4 rounded-full w-full focus:outline-none focus:shadow-outline">Delete</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
