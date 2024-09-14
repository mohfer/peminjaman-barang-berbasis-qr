<div class="min-h-screen flex justify-center items-start">
    <livewire:components.toast-notification />
    <div class="flex flex-col md:flex-row gap-4 rounded-lg w-full md:w-full max-w-7xl">
        <div class="bg-[#D4EAE6] self-start rounded-lg p-4 flex flex-col justify-start w-full md:w-1/2 gap-4">
            <div class="flex justify-center mb-4">
                @if ($this->image)
                    <img src="{{ asset('storage/images/users/' . $this->image) }}" alt="Profile Picture"
                        class="rounded-full w-48 h-48 object-cover">
                @else
                    <img src="https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg"
                        alt="No Image Available" class="rounded-full w-48 h-48 object-cover">
                @endif
            </div>
            <input type="nim" placeholder="Nim" wire:model='nim' disabled
                class="w-full bg-[#7EB6AD] text-white placeholder-white p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-600">
            @error('nim')
                <div class="text-red-500 text-sm mt-2">
                    {{ $message }}
                </div>
            @enderror
            <input type="name" placeholder="Nama" wire:model='name' disabled
                class="w-full bg-[#7EB6AD] text-white placeholder-white p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-600">
            @error('name')
                <div class="text-red-500 text-sm mt-2">
                    {{ $message }}
                </div>
            @enderror
            <input type="gender" placeholder="Gender" wire:model='gender' disabled
                class="w-full bg-[#7EB6AD] text-white placeholder-white p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-600">
            @error('gender')
                <div class="text-red-500 text-sm mt-2">
                    {{ $message }}
                </div>
            @enderror
            <input type="fakultas" placeholder="Fakultas" wire:model='fakultas' disabled
                class="w-full bg-[#7EB6AD] text-white placeholder-white p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-600">
            @error('fakultas')
                <div class="text-red-500 text-sm mt-2">
                    {{ $message }}
                </div>
            @enderror
            <input type="prodi" placeholder="Prodi" wire:model='prodi' disabled
                class="w-full bg-[#7EB6AD] text-white placeholder-white p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-600">
            @error('prodi')
                <div class="text-red-500 text-sm mt-2">
                    {{ $message }}
                </div>
            @enderror
            <input type="phone" placeholder="Phone" wire:model='phone' disabled
                class="w-full bg-[#7EB6AD] text-white placeholder-white p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-600">
            @error('phone')
                <div class="text-red-500 text-sm mt-2">
                    {{ $message }}
                </div>
            @enderror
            <input type="email" placeholder="Email" wire:model='email' disabled
                class="w-full bg-[#7EB6AD] text-white placeholder-white p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-600">
            @error('email')
                <div class="text-red-500 text-sm mt-2">
                    {{ $message }}
                </div>
            @enderror
            <input type="role" placeholder="Role" wire:model='role' disabled
                class="w-full bg-[#7EB6AD] text-white placeholder-white p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-600">
            @error('role')
                <div class="text-red-500 text-sm mt-2">
                    {{ $message }}
                </div>
            @enderror
            <div class="flex justify-center gap-4">
                <button wire:navigate
                    class="bg-[#1BC300] hover:bg-[#18af00] text-white font-bold py-2 px-6 rounded-lg mt-2 sm:mt-4 w-full"
                    a href='{{ route('update-users', $this->token) }}'>Update
                </button>
            </div>
        </div>

        <div class="bg-[#D4EAE6] self-start rounded-lg p-4 flex flex-col justify-start w-full md:w-1/2">
            <h2 class="text-xl font-bold mb-4">Status</h2>
            @if ($this->allZero)
                <div class="flex justify-center items-center h-64">
                    <h1 class="text-2xl font-bold text-gray-800">No data found!</h1>
                </div>
            @else
                <ul class="space-y-4">
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
                                <span class="px-2 py-1 text-xs font-semibold text-white bg-[#39A0FF] rounded-full">
                                    Borrowed
                                </span>
                            </div>
                        </div>
                    @endforeach
                </ul>
            @endif
            <div class="flex justify-center gap-4">
                <button wire:navigate
                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-6 rounded-lg mt-4 sm:mt-4 w-full"
                    a href='{{ route('users') }}'>Kembali
                </button>
            </div>
        </div>
        <div class="bg-[#D4EAE6] self-start rounded-lg p-4 flex flex-col justify-start w-full md:w-1/2">
            <h2 class="text-xl font-bold mb-4">History</h2>
            <div class="flex justify-center mb-4">
                <div class="w-full flex space-x-1 sm:space-x-4">
                    <input type="date" wire:model.change="startDate"
                        class="w-full p-2 rounded-lg bg-[#D4EAE6] text-gray-700 border border-gray-500"
                        placeholder="Start Date">
                    <input type="date" wire:model.change="endDate"
                        class="w-full p-2 rounded-lg bg-[#D4EAE6] text-gray-700 border border-gray-500"
                        placeholder="End Date">
                </div>
            </div>
            @if ($histories->count() == 0)
                <div class="flex justify-center items-center h-64">
                    <h1 class="text-2xl font-bold text-gray-800">No data found!</h1>
                </div>
            @else
                <ul class="space-y-4">
                    @foreach ($histories as $history)
                        <li class="bg-[#D4EAE6] rounded-lg p-4 border border-gray-500 flex flex-col">
                            <h3 class="text-lg font-bold mb-2">{{ $history->item->name }}</h3>
                            <div class="flex justify-between mb-2">
                                <span class="text-gray-600">Quantity:</span>
                                <span class="font-medium">{{ $history->qty }}</span>
                            </div>
                            <div class="flex justify-between mb-2">
                                <span class="text-gray-600">Time:</span>
                                <span
                                    class="font-medium">{{ \Carbon\Carbon::parse($history->time)->format('d/m/Y, g:i A') }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Status:</span>
                                @if ($history->status == 'Borrowed')
                                    <span class="px-2 py-1 text-xs font-semibold text-white bg-[#39A0FF] rounded-full">
                                        {{ $history->status }}
                                    </span>
                                @elseif($history->status == 'Returned')
                                    <span class="px-2 py-1 text-xs font-semibold text-white bg-[#1BC300] rounded-full">
                                        {{ $history->status }}
                                    </span>
                                @endif
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>
