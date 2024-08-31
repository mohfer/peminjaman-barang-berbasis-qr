<div class="min-h-screen">
    <x-notify::notify />
    <div class="flex justify-center items-center">
        <div class="w-4/5 lg:w-full">
            <form wire:submit.prevent="login" class="max-w-sm mx-auto p-6 bg-[#D4EAE6] shadow-md rounded-lg border">
                @csrf
                <div class="mb-14">
                    <h1 class="text-5xl font-bold text-center">LOGIN</h1>
                </div>
                <div class="mb-4">
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
                            class="[appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[#31867C] focus:border-[#31867C] sm:text-sm">
                    </div>
                    @error('nim')
                        <div class="text-red-500 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div x-data="{ showPassword: false }" class="mb-6 relative">
                    <input :type="showPassword ? 'text' : 'password'" id="password" wire:model="password"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[#31867C] focus:border-[#31867C] sm:text-sm"
                        placeholder="Password">
                    <button @click="showPassword = !showPassword" type="button"
                        class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                        <svg x-show="!showPassword" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <svg x-show="showPassword" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" style="display: none;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                        </svg>
                    </button>
                    @error('password')
                        <div class="text-red-500 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button wire:loading.remove wire:target='login' type="submit"
                    class="w-full mt-12 px-4 py-2 bg-[#40C08C] text-white font-semibold rounded-md shadow hover:bg-[#39ad7e] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Login
                </button>
                <button wire:loading wire:target='login' type="submit"
                    class="w-full mt-12 px-4 py-2 bg-[#40C08C] text-white font-semibold rounded-md shadow hover:bg-[#39ad7e] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Please
                    wait...
                </button>
            </form>
        </div>
    </div>
</div>
