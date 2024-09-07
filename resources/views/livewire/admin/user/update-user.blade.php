<div class="min-h-screen">
    <livewire:components.toast-notification />
    <div class="flex justify-center items-center">
        <div class="flex bg-[#D4EAE6] p-6 rounded-lg shadow-lg sm:w-2/3 w-full h-auto flex-col md:flex-row">
            <div
                class="w-full md:w-1/3 flex flex-col items-center justify-center bg-white rounded-lg p-4 sm:flex-col sm:flex-direction-column">
                <div
                    class="w-full h-48 flex items-center justify-center @if (!$image && !$existingImage) border-2 border-dashed @endif border-gray-400 rounded-lg mb-4">
                    <div class="text-center">
                        @if ($image)
                            <label for="file-upload" class="cursor-pointer">
                                <div class="flex justify-center items-center">
                                    <img src="{{ $image->temporaryUrl() }}" alt="Uploaded Image"
                                        class="w-36 h-36 sm:w-48 sm:h-48 object-cover rounded-full mb-4">
                                </div>
                            </label>
                            <div wire:loading wire:target="image">Uploading...</div>
                            <br>
                        @elseif ($existingImage)
                            <label for="file-upload" class="cursor-pointer">
                                <div class="flex justify-center items-center">
                                    <img src="{{ asset('storage/images/users/' . $existingImage) }}"
                                        alt="Existing Image"
                                        class="w-36 h-36 sm:w-48 sm:h-48 object-cover rounded-full mb-4">
                                </div>
                            </label>
                            <div wire:loading wire:target="image">Uploading...</div>
                            <br>
                        @endif

                        @if (!$image && !$existingImage)
                            <label for="file-upload" class="text-gray-500 cursor-pointer flex flex-col items-center">
                                <div class="text-gray-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 5a1 1 0 00-1 1v3H6a1 1 0 000 2h3v3a1 1 0 002 0v-3h3a1 1 0 000-2h-3V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <p class="text-gray-600 mt-2">Tambahkan foto</p>
                            </label>
                            <div wire:loading wire:target="image">Uploading...</div>
                            <br>
                        @endif

                        @error('image')
                            <span class="error text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <form wire:submit.prevent='update'
                class="w-full md:w-2/3 flex flex-col justify-center gap-2 pl-4 pr-4 mt-4 sm:mt-0">
                <input id="file-upload" type="file" class="hidden" wire:model="image" />
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
                        class="[appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none bg-[#7EB6AD] text-white placeholder-white p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-600 w-full">
                </div>
                @error('nim')
                    <div class="text-red-500 text-sm">
                        {{ $message }}
                    </div>
                @enderror
                <input type="name" placeholder="Nama" wire:model='name'
                    class="bg-[#7EB6AD] text-white placeholder-white p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-600">
                @error('name')
                    <div class="text-red-500 text-sm">
                        {{ $message }}
                    </div>
                @enderror
                <select wire:model='gender'
                    class="bg-[#7EB6AD] text-white placeholder-white p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-600">
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
                        class="[appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none bg-[#7EB6AD] text-white placeholder-white p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-600 w-full">
                </div>
                @error('phone')
                    <div class="text-red-500 text-sm">
                        {{ $message }}
                    </div>
                @enderror
                <input type="email" placeholder="Email" wire:model='email'
                    class="bg-[#7EB6AD] text-white placeholder-white p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-600 w-full">
                @error('email')
                    <div class="text-red-500 text-sm">
                        {{ $message }}
                    </div>
                @enderror
                <select wire:model='fakultas'
                    class="bg-[#7EB6AD] text-white placeholder-white p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-600 w-full">
                    <option hidden>Fakultas</option>
                    <option>Fakultas Teknik</option>
                    <option>Fakultas Hukum</option>
                    <option>Fakultas Ekonomi</option>
                    <option>Fakultas Kedokteran</option>
                </select>
                @error('fakultas')
                    <div class="text-red-500 text-sm">
                        {{ $message }}
                    </div>
                @enderror
                <input type="text" placeholder="Prodi" wire:model='prodi'
                    class="bg-[#7EB6AD] text-white placeholder-white p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-600 w-full">
                @error('prodi')
                    <div class="text-red-500 text-sm">
                        {{ $message }}
                    </div>
                @enderror
                <select wire:model='role'
                    class="bg-[#7EB6AD] text-white placeholder-white p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-600 w-full">
                    <option hidden>Role</option>
                    <option>admin</option>
                    <option>user</option>
                </select>
                @error('role')
                    <div class="text-red-500 text-sm">
                        {{ $message }}
                    </div>
                @enderror
                <div class="flex justify-center gap-4">
                    <button wire:navigate
                        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-6 rounded-lg mt-2 sm:mt-4" a
                        href='{{ route('users') }}'>Kembali
                    </button>
                    <button wire:loading.remove wire:target='update' type="submit"
                        class="bg-[#1BC300] hover:bg-[#18af00] text-white font-bold py-2 px-6 rounded-lg mt-2 sm:mt-4">Update</button>
                    <button wire:loading wire:target='update'
                        class="bg-[#1BC300] hover:bg-[#18af00] text-white font-bold py-2 px-6 rounded-lg mt-2 sm:mt-4">Please
                        wait...</button>
                </div>
            </form>
        </div>
    </div>
</div>
