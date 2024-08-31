<div class="min-h-screen">
    <x-notify::notify />
    <div class="flex justify-center items-center">
        <div class="flex bg-[#D4EAE6] p-6 rounded-lg shadow-lg sm:w-2/3 w-full h-auto flex-col md:flex-row">
            <div
                class="w-full md:w-1/3 flex flex-col items-center justify-center bg-white rounded-md p-4 sm:flex-col sm:flex-direction-column">
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

            <form wire:submit.prevent='update'
                class="w-full md:w-2/3 flex flex-col justify-center gap-2 pl-4 pr-4 mt-4 sm:mt-0">
                <div wire:dirty>Unsaved changes...</div>
                <div x-data="{
                    nim: @entangle('nim'),
                    validateInput(event) {
                        const cleanedValue = event.target.value.replace(/\D/g, '');
                        event.target.value = cleanedValue;
                        this.nim = cleanedValue;
                    }
                }">
                    <input type="text" placeholder="Nim" x-model="nim" wire:model.defer="nim"
                        @input="validateInput($event)" @keypress="$event.charCode >= 48 && $event.charCode <= 57"
                        class="[appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none bg-[#7EB6AD] text-white placeholder-white p-3 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-600 w-full">
                </div>
                @error('nim')
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
                <select wire:model='gender'
                    class="bg-[#7EB6AD] text-white placeholder-white p-3 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-600">
                    <option hidden>Jenis Kelamin</option>
                    <option>Laki-laki</option>
                    <option>Perempuan</option>
                </select>
                @error('gender')
                    <div class="text-red-500 text-sm">
                        {{ $message }}
                    </div>
                @enderror
                <div x-data="{
                    phone: @entangle('phone'),
                    validateInput(event) {
                        const cleanedValue = event.target.value.replace(/\D/g, '');
                        event.target.value = cleanedValue;
                        this.phone = cleanedValue;
                    }
                }">
                    <input type="text" placeholder="Phone" x-model="phone" wire:model.defer="phone"
                        @input="validateInput($event)" @keypress="$event.charCode >= 48 && $event.charCode <= 57"
                        class="[appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none bg-[#7EB6AD] text-white placeholder-white p-3 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-600 w-full">
                </div>
                @error('phone')
                    <div class="text-red-500 text-sm">
                        {{ $message }}
                    </div>
                @enderror
                <input type="email" placeholder="Email" wire:model='email'
                    class="bg-[#7EB6AD] text-white placeholder-white p-3 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-600 w-full">
                @error('email')
                    <div class="text-red-500 text-sm">
                        {{ $message }}
                    </div>
                @enderror
                <select wire:model='fakultas'
                    class="bg-[#7EB6AD] text-white placeholder-white p-3 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-600 w-full">
                    <option hidden>Fakultas</option>
                    <option>Fakultas Teknik</option>
                    <option>Fakultas Hukum</option>
                </select>
                @error('fakultas')
                    <div class="text-red-500 text-sm">
                        {{ $message }}
                    </div>
                @enderror
                <input type="text" placeholder="Prodi" wire:model='prodi'
                    class="bg-[#7EB6AD] text-white placeholder-white p-3 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-600 w-full">
                @error('prodi')
                    <div class="text-red-500 text-sm">
                        {{ $message }}
                    </div>
                @enderror
                <button wire:loading.remove wire:target='update' type="submit"
                    class="bg-[#6DFB5A] hover:bg-[#4ffa38] text-white font-bold py-2 px-6 rounded-md mt-2 sm:mt-4">Update</button>
                <button wire:loading wire:target='update'
                    class="bg-[#6DFB5A] hover:bg-[#4ffa38] text-white font-bold py-2 px-6 rounded-md mt-2 sm:mt-4">Please
                    wait...</button>
            </form>
        </div>
    </div>
</div>
