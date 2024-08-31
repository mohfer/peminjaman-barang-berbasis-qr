<div class="min-h-screen">
    <div class="flex justify-center items-center">
        <div class="flex bg-[#D4EAE6] p-6 rounded-lg shadow-lg sm:w-2/3 w-full flex-col md:flex-row">
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

            <form wire:submit.prevent='save' class="w-full md:w-2/3 flex flex-col justify-center gap-2 pl-4 pr-4 mt-4">
                <input type="number" placeholder="Nim" wire:model.live='nim'
                    class="bg-[#7EB6AD] text-white placeholder-white p-3 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-600">
                @error('nim')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
                <input type="name" placeholder="Nama" wire:model.live='nama'
                    class="bg-[#7EB6AD] text-white placeholder-white p-3 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-600">
                @error('nama')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
                <select wire:model.live='jk'
                    class="bg-[#7EB6AD] text-white placeholder-white p-3 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-600">
                    <option hidden>Jenis Kelamin</option>
                    <option>Laki-laki</option>
                    <option>Perempuan</option>
                </select>
                @error('jk')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
                <div>
                    <input type="tel" placeholder="No. Telp" wire:model.live='telp'
                        class="bg-[#7EB6AD] text-white placeholder-white p-3 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-600 w-full">
                    @error('telp')
                        <div class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div>
                    <input type="email" placeholder="Email" wire:model.live='email'
                        class="bg-[#7EB6AD] text-white placeholder-white p-3 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-600 w-full">
                    @error('email')
                        <div class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="grid grid-cols-1 gap-2">
                    <div>
                        <select wire:model.live='fakultas'
                            class="bg-[#7EB6AD] text-white placeholder-white p-3 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-600 w-full">
                            <option hidden>Fakultas</option>
                            <option>Fakultas Teknik</option>
                            <option>Fakultas Hukum</option>
                        </select>
                        @error('fakultas')
                            <div class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <input type="text" placeholder="Prodi" wire:model.live='prodi'
                            class="bg-[#7EB6AD] text-white placeholder-white p-3 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-600 w-full">
                        @error('prodi')
                            <div class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <button wire:loading.remove wire:target='save' type="submit"
                    class="bg-[#6DFB5A] hover:bg-[#4ffa38] text-white font-bold py-2 px-6 rounded-md mt-2 sm:mt-4">Tambahkan</button>
                <button wire:loading wire:target='save'
                    class="bg-[#6DFB5A] hover:bg-[#4ffa38] text-white font-bold py-2 px-6 rounded-md mt-2 sm:mt-4">Please
                    wait...</button>
            </form>
        </div>
    </div>
</div>