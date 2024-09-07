<div class="min-h-screen">
    <div class="flex justify-center mb-4">
        <input type="text"
            class="bg-[#D4EAE6] p-2 rounded-full w-full sm:w-1/2 px-4 focus:outline-none focus:ring-[#31867C] focus:border-[#31867C] sm:text-sm"
            placeholder="Search..." wire:model.live="search">
    </div>
    <div class="flex justify-center mb-4">
        <div class="w-full sm:w-1/2">
            {{ $lists->links('pagination::tailwind') }}
        </div>
    </div>
    <div class="flex justify-center">
        <div class="w-full sm:w-1/2 space-y-4">
            @if ($lists->count() == 0)
                <div class="flex justify-center items-center h-64">
                    <h1 class="text-2xl font-bold text-white">No data found!</h1>
                </div>
            @else
                <ul class="space-y-2">
                    @foreach ($lists as $item)
                        <li class="bg-[#D4EAE6] rounded-lg p-4 shadow-md flex flex-col">
                            <h3 class="text-lg font-bold mb-2">{{ $item->name }}</h3>
                            <div class="flex justify-between mb-2">
                                <span class="text-gray-600">Code:</span>
                                <span class="font-medium">{{ $item->code }}</span>
                            </div>
                            <div class="flex justify-between mb-2">
                                <span class="text-gray-600">Type:</span>
                                <span class="font-medium">{{ $item->type }}</span>
                            </div>
                            <div class="flex justify-between mb-2">
                                <span class="text-gray-600">Quantity:</span>
                                <span class="font-medium">{{ $item->qty }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Status:</span>
                                @if ($item->qty > 0)
                                    <span class="px-2 py-1 text-xs font-semibold text-white bg-[#1BC300] rounded-full">
                                        Ready
                                    </span>
                                @elseif ($item->qty <= 0)
                                    <span class="px-2 py-1 text-xs font-semibold text-white bg-[#FF3939] rounded-full">
                                        Not Available
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
