<div class="min-h-screen">
    <x-notify::notify />
    <div class="flex justify-center my-4 mx-2">
        <input type="text"
            class="bg-[#D4EAE6] p-2 rounded-full w-full sm:w-1/3 px-4 focus:outline-none focus:ring-[#31867C] focus:border-[#31867C] sm:text-sm"
            placeholder="Search..." wire:model.live="search">
        <a href='{{ route('create-users') }}' wire:navigate
            class="px-4 py-2 bg-[#D4EAE6] hover:bg-[#b6dbd4] font-medium rounded-full ml-2">
            Tambah
        </a>
    </div>

    <div class="flex justify-center flex-wrap gap-3">
        @foreach ($users as $user)
            <div class="p-4 w-full sm:w-1/3 lg:w-1/6">
                <div class="bg-[#D4EAE6] p-6 rounded-md h-full">
                    <div class="flex justify-center mb-4">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg"
                            alt="Profile Picture" class="rounded-full w-24 h-24">
                    </div>
                    <div class="text-center mb-2">
                        <h2 class="font-bold text-xl">{{ $user->nama }}</h2>
                        <p class="text-gray-700">{{ $user->nim }}</p>
                    </div>
                    <div class="flex justify-center mt-4">
                        <a
                            class="bg-[#39A0FF] hover:bg-[#1991ff] text-white font-bold py-2 px-4 rounded-full w-full focus:outline-none focus:shadow-outline">Info</a>
                    </div>
                    <div class="flex justify-center mt-4">
                        <a href="{{ route('update-users', $user->id) }}" wire:navigate
                            class="bg-[#1BC300] hover:bg-[#18af00] text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline">Update</a>
                        <button wire:click='delete({{ $user->id }})'
                            wire:confirm="Are you sure you want to delete this user?"
                            class="bg-[#FF3939] hover:bg-[#ff1919] text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline ml-4">Delete</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="flex justify-center mb-4">
        <div class="w-full sm:w-1/2">
            {{ $users->links() }}
        </div>
    </div>
</div>
