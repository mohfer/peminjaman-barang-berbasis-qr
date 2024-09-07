<div class="min-h-screen flex justify-center items-start">
    <livewire:components.toast-notification />
    <div class="flex flex-col md:flex-row gap-4 rounded-lg w-full md:w-2/3 max-w-7xl">
        <div class="bg-[#D4EAE6] flex-grow rounded-lg p-4 flex flex-col items-center gap-4">
            <div class="text-center">
                @if ($image)
                    <label for="file-upload" class="cursor-pointer">
                        <div class="flex justify-center items-center">
                            <img src="{{ $image->temporaryUrl() }}" alt="Uploaded Image"
                                class="w-48 h-48 object-cover rounded-full">
                        </div>
                    </label>
                    <div wire:loading wire:target="image">Uploading...</div>
                    <br>
                @elseif ($existingImage)
                    <label for="file-upload" class="cursor-pointer">
                        <div class="flex justify-center items-center">
                            <img src="{{ asset('storage/images/users/' . $existingImage) }}" alt="Existing Image"
                                class="w-48 h-48 object-cover rounded-full">
                        </div>
                    </label>
                    <div wire:loading wire:target="image">Uploading...</div>
                    <br>
                @else
                    <label for="file-upload" class="cursor-pointer">
                        <div class="flex justify-center items-center">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg"
                                alt="No Image Available" class="w-48 h-48 object-cover rounded-full">
                        </div>
                    </label>
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
            @can('admin')
                <button href="{{ route('update-users', $this->token) }}" wire:navigate
                    class="bg-[#1BC300] hover:bg-[#18af00] text-white font-bold py-2 px-6 rounded-lg mt-4 sm:mt-4 w-full">Update
                    Profile</button>
            @endcan
            @can('user')
                <form wire:submit.prevent='save' class="w-full">
                    <input id="file-upload" type="file" class="hidden" wire:model="image" />
                    <button wire:loading.remove wire:target='save' type="submit"
                        class="bg-[#1BC300] hover:bg-[#18af00] text-white font-bold py-2 px-6 rounded-lg mt-4 sm:mt-4 w-full">Update
                        Image</button>
                    <button wire:loading wire:target='save'
                        class="bg-[#1BC300] hover:bg-[#18af00] text-white font-bold py-2 px-6 rounded-lg mt-4 sm:mt-4 w-full">Please
                        wait...</button>
                </form>
            @endcan
        </div>

        <div class="bg-[#D4EAE6] self-start rounded-lg p-4 flex flex-col justify-start w-full md:w-1/2">
            <form wire:submit.prevent='changePassword'>
                <div x-data="{ showPassword: false }" class="mb-4 relative">
                    <input :type="showPassword ? 'text' : 'password'" id="oldPassword" wire:model="oldPassword"
                        class="w-full bg-[#7EB6AD] text-white placeholder-white p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-600"
                        placeholder="Old Password" tabindex="1">
                    <button @click="showPassword = !showPassword" type="button"
                        class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                        <svg x-show="!showPassword" class="h-6 w-6 text-[#D4EAE6]" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <svg x-show="showPassword" class="h-6 w-6 text-[#D4EAE6]" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" style="display: none;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                        </svg>
                    </button>
                    @error('oldPassword')
                        <div class="text-red-500 text-sm mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div x-data="{ showPassword: false }" class="mb-4 relative">
                    <input :type="showPassword ? 'text' : 'password'" id="newPassword" wire:model="newPassword"
                        class="w-full bg-[#7EB6AD] text-white placeholder-white p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-600"
                        placeholder="New Password" tabindex="2">
                    <button @click="showPassword = !showPassword" type="button"
                        class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                        <svg x-show="!showPassword" class="h-6 w-6 text-[#D4EAE6]" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <svg x-show="showPassword" class="h-6 w-6 text-[#D4EAE6]" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" style="display: none;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                        </svg>
                    </button>
                    @error('newPassword')
                        <div class="text-red-500 text-sm mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div x-data="{ showPassword: false }" class="mb-4 relative">
                    <input :type="showPassword ? 'text' : 'password'" id="confirmPassword"
                        wire:model="confirmPassword"
                        class="w-full bg-[#7EB6AD] text-white placeholder-white p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-600"
                        placeholder="Confirm Password" tabindex="3">
                    <button @click="showPassword = !showPassword" type="button"
                        class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                        <svg x-show="!showPassword" class="h-6 w-6 text-[#D4EAE6]" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <svg x-show="showPassword" class="h-6 w-6 text-[#D4EAE6]" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" style="display: none;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                        </svg>
                    </button>
                    @error('confirmPassword')
                        <div class="text-red-500 text-sm mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button wire:loading.remove wire:target='changePassword' type="submit"
                    class="bg-[#1BC300] hover:bg-[#18af00] text-white font-bold py-2 px-6 rounded-lg mt-4 sm:mt-4 w-full">Change
                    Password</button>
                <button wire:loading wire:target='changePassword'
                    class="bg-[#1BC300] hover:bg-[#18af00] text-white font-bold py-2 px-6 rounded-lg mt-4 sm:mt-4 w-full">Please
                    wait...</button>
            </form>

            <button wire:click='logout' wire:confirm="Are you sure you want to logout?"
                class="block md:hidden bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-6 rounded-lg mt-4 sm:mt-4 w-full">Logout</button>
        </div>
    </div>
</div>
