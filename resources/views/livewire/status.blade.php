<div class="min-h-screen">
    <div class="flex justify-center mb-4">
        <input type="text"
            class="bg-[#D4EAE6] p-2 rounded-full w-full sm:w-1/2 px-4 focus:outline-none focus:ring-[#31867C] focus:border-[#31867C] mb-4 sm:text-sm"
            placeholder="Search..." wire:model.live="search">
    </div>
    <div class="flex justify-center">
        <div class="w-full sm:w-1/2 space-y-4">
            @if ($this->allZero)
                <div class="flex justify-center items-center h-64">
                    <h1 class="text-2xl font-bold text-white">No data found!</h1>
                </div>
            @else
                @can('admin')
                    @foreach ($stillBorrowedItems as $borrowedItem)
                        <a href="{{ route('detail', $borrowedItem['token']) }}" wire:navigate
                            class="bg-[#D4EAE6] rounded-lg p-4 shadow-md flex flex-col">
                            @can('admin')
                                <h3 class="text-lg font-bold mb-2">{{ $borrowedItem['borrower_name'] }}</h3>
                                <div class="flex justify-between mb-2">
                                    <span class="text-gray-600">Nim:</span>
                                    <span class="font-medium">{{ $borrowedItem['nim'] }}</span>
                                </div>
                                <div class="flex justify-between mb-2">
                                    <span class="text-gray-600">Phone:</span>
                                    <span class="font-medium">{{ $borrowedItem['phone'] }}</span>
                                </div>
                            @endcan
                            <h3 class="text-lg font-bold mb-2">{{ $borrowedItem['item']->name }}</h3>
                            <div class="flex justify-between mb-2">
                                <span class="text-gray-600">Code:</span>
                                <span class="font-medium">{{ $borrowedItem['item']->code }}</span>
                            </div>
                            <div class="flex justify-between mb-2">
                                <span class="text-gray-600">Type:</span>
                                <span class="font-medium">{{ $borrowedItem['item']->type }}</span>
                            </div>
                            <div class="flex justify-between mb-2">
                                <span class="text-gray-600">Quantity Borrowed:</span>
                                <span class="font-medium">{{ $borrowedItem['final'] }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Status:</span>
                                <span class="px-2 py-1 text-xs font-semibold text-white bg-[#39A0FF] rounded-full">
                                    Borrowed
                                </span>
                            </div>
                        </a>
                    @endforeach
                @endcan
                @can('user')
                    @foreach ($stillBorrowedItems as $borrowedItem)
                        <li class="bg-[#D4EAE6] rounded-lg p-4 shadow-md flex flex-col">
                            <h3 class="text-lg font-bold mb-2">{{ $borrowedItem['item']->name }}</h3>
                            <div class="flex justify-between mb-2">
                                <span class="text-gray-600">Code:</span>
                                <span class="font-medium">{{ $borrowedItem['item']->code }}</span>
                            </div>
                            <div class="flex justify-between mb-2">
                                <span class="text-gray-600">Type:</span>
                                <span class="font-medium">{{ $borrowedItem['item']->type }}</span>
                            </div>
                            <div class="flex justify-between mb-2">
                                <span class="text-gray-600">Quantity Borrowed:</span>
                                <span class="font-medium">{{ $borrowedItem['final'] }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Status:</span>
                                <span class="px-2 py-1 text-xs font-semibold text-white bg-[#39A0FF] rounded-full">
                                    Borrowed
                                </span>
                            </div>
                        </li>
                    @endforeach
                @endcan
            @endif
        </div>
    </div>
</div>
