<div class="min-h-screen">
    <x-notify::notify />
    <div class="flex justify-center items-center">
        <div class="flex bg-[#D4EAE6] p-6 rounded-lg shadow-lg sm:w-2/3 w-full flex-col md:flex-row gap-6">
            <div class="w-full md:w-1/3 flex flex-col items-center justify-center bg-white rounded-md p-4">
                <div
                    class="w-full h-48 flex items-center justify-center border-2 border-dashed border-gray-400 rounded-md mb-4">
                    <div class="text-center">
                        <div class="text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 5a1 1 0 00-1 1v3H6a1 1 0 000 2h3v3a1 1 0 002 0v-3h3a1 1 0 000-2h-3V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <p class="text-gray-600">Tambahkan foto</p>
                    </div>
                </div>
            </div>

            <div class="w-full md:w-2/3 flex flex-col justify-center gap-4 pl-4 pr-4">
                <form wire:submit.prevent='save' class="flex flex-col justify-center gap-4">
                    <input type="text" placeholder="Kode" wire:model='code'
                        class="bg-[#7EB6AD] text-white placeholder-white p-3 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-600">
                    @error('code')
                        <div class="text-red-500 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                    <input type="name" placeholder="Nama" wire:model='name'
                        class="bg-[#7EB6AD] text-white placeholder-white p-3 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-600">
                    @error('name')
                        <div class="text-red-500 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                    <select wire:model='type'
                        class="bg-[#7EB6AD] text-white placeholder-white p-3 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-600">
                        <option hidden>Jenis</option>
                        <option>Peralatan Tulis</option>
                        <option>Peralatan Kantor</option>
                        <option>Peralatan Presentasi</option>
                        <option>Peralatan Komunikasi</option>
                    </select>
                    @error('type')
                        <div class="text-red-500 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                    <div x-data="{
                        qty: @entangle('qty'),
                        increment() { this.qty = (parseInt(this.qty) || 0) + 1; },
                        decrement() { this.qty = Math.max((parseInt(this.qty) || 0) - 1, 0); },
                        validateInput(event) {
                            event.target.value = event.target.value.replace(/\D/g, '');
                            this.qty = event.target.value;
                        }
                    }" class="flex items-center">
                        <button @click="decrement()" type="button" class="bg-[#7EB6AD] text-white p-3 px-5 rounded-md">
                            -
                        </button>
                        <input type="text" x-model="qty" wire:model="qty" @input="validateInput($event)"
                            @keypress="$event.charCode >= 48 && $event.charCode <= 57"
                            class="[appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none bg-[#7EB6AD] text-white placeholder-white p-3 focus:outline-none focus:ring-2 focus:ring-teal-600 w-full text-center mx-3 rounded-md"
                            placeholder="Jumlah">
                        <button @click="increment()" type="button" class="bg-[#7EB6AD] text-white p-3 px-5 rounded-md">
                            +
                        </button>
                    </div>
                    @error('qty')
                        <div class="text-red-500 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                    <button wire:loading.remove wire:target='save' type="submit"
                        class="bg-[#6DFB5A] hover:bg-[#4ffa38] text-white font-bold py-2 px-6 rounded-md mt-2 sm:mt-4">Tambahkan</button>
                    <button wire:loading wire:target='save'
                        class="bg-[#6DFB5A] hover:bg-[#4ffa38] text-white font-bold py-2 px-6 rounded-md mt-2 sm:mt-4">Please
                        wait...</button>
                </form>

                @session('qr')
                    <div class="flex flex-col md:flex-row justify-center items-center gap-6 mt-6">
                        <div class="flex flex-col items-center mb-4 md:mb-0">
                            {!! QrCode::size(256)->generate($this->borrowing_qr) !!}
                            <p class="text-gray-700 text-sm mt-2">Peminjaman</p>
                        </div>
                        <div class="flex flex-col items-center">
                            {!! QrCode::size(256)->generate($this->return_qr) !!}
                            <p class="text-gray-700 text-sm mt-2">Pengembalian</p>
                        </div>
                    </div>
                    <button wire:loading.remove wire:target='download'
                        class="bg-[#6DFB5A] hover:bg-[#4ffa38] text-white font-bold py-2 px-6 rounded-md mt-4"
                        wire:click='download'>Download</button>
                    <button wire:loading wire:target='download'
                        class="bg-[#6DFB5A] hover:bg-[#4ffa38] text-white font-bold py-2 px-6 rounded-md mt-4"
                        wire:click='download'>Please wait...</button>
                @endsession
            </div>
        </div>
    </div>
</div>
