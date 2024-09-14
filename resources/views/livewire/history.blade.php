<div class="min-h-screen">
    <div class="flex justify-center mb-4">
        <div class="w-full sm:w-1/2 flex space-x-4">
            <input type="date" wire:model.change="startDate" class="w-full p-2 rounded-lg bg-[#D4EAE6] text-gray-700"
                placeholder="Start Date">
            <input type="date" wire:model.change="endDate" class="w-full p-2 rounded-lg bg-[#D4EAE6] text-gray-700"
                placeholder="End Date">
        </div>
    </div>
    <div class="flex justify-center">
        <div class="w-full sm:w-1/2 space-y-4">
            @if ($histories->count() == 0)
                <div class="flex justify-center items-center h-64">
                    <h1 class="text-2xl font-bold text-white">No data found!</h1>
                </div>
            @else
                <ul class="space-y-4">
                    @foreach ($histories as $history)
                        <li class="bg-[#D4EAE6] rounded-lg p-4 shadow-md flex flex-col">
                            @can('admin')
                                <h3 class="text-lg font-bold mb-2">{{ $history->user->name }}</h3>
                                <div class="flex justify-between mb-2">
                                    <span class="text-gray-600">Nim:</span>
                                    <span class="font-medium">{{ $history->user->nim }}</span>
                                </div>
                                <div class="flex justify-between mb-2">
                                    <span class="text-gray-600">Phone:</span>
                                    <span class="font-medium">{{ $history->user->phone }}</span>
                                </div>
                            @endcan
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
