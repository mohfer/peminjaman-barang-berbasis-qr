<div class="min-h-screen flex justify-center items-start">
    <livewire:components.toast-notification />
    <div class="flex flex-col md:flex-row gap-4 rounded-lg w-full md:w-2/3 max-w-7xl">
        <div class="bg-[#D4EAE6] flex-grow rounded-lg p-4 flex flex-col items-center gap-4">
            <div class="flex justify-center mb-4">
                @if ($this->image)
                    <img src="{{ asset('storage/images/items/' . $this->image) }}"
                        class="rounded-full w-48 h-48 object-cover">
                @else
                    <img src="https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg"
                        alt="No Image Available" class="rounded-full w-48 h-48 object-cover">
                @endif
            </div>
            <input type="code" placeholder="Kode" wire:model='code' disabled
                class="w-full bg-[#7EB6AD] text-white placeholder-white p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-600">
            <input type="name" placeholder="Nama" wire:model='name' disabled
                class="w-full bg-[#7EB6AD] text-white placeholder-white p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-600">
            <input type="type" placeholder="Tipe" wire:model='type' disabled
                class="w-full bg-[#7EB6AD] text-white placeholder-white p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-600">
            <input type="final" placeholder="Jumlah" wire:model='final' disabled
                class="w-full bg-[#7EB6AD] text-white placeholder-white p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-600">
        </div>

        <div class="bg-[#D4EAE6] self-start rounded-lg p-4 flex flex-col justify-start w-full md:w-1/2">
            <form wire:submit.prevent='return'>
                <div x-data="{
                    qty: @entangle('qty'),
                    increment() { this.qty = (parseInt(this.qty) || 0) + 1; },
                    decrement() { this.qty = Math.max((parseInt(this.qty) || 0) - 1, 0); },
                    validateInput(event) {
                        event.target.value = event.target.value.replace(/\D/g, '');
                        this.qty = event.target.value;
                    }
                }" class="flex items-center">
                    <button @click="decrement()" type="button" class="bg-[#7EB6AD] text-white p-3 px-5 rounded-lg">
                        -
                    </button>
                    <input type="text" x-model="qty" wire:model="qty" @input="validateInput($event)"
                        @keypress="$event.charCode >= 48 && $event.charCode <= 57"
                        class="[appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none bg-[#7EB6AD] text-white placeholder-white p-3 focus:outline-none focus:ring-2 focus:ring-teal-600 w-full text-center mx-3 rounded-lg"
                        placeholder="Jumlah">
                    <button @click="increment()" type="button" class="bg-[#7EB6AD] text-white p-3 px-5 rounded-lg">
                        +
                    </button>
                </div>
                @error('qty')
                    <div class="text-red-500 text-sm mt-2">
                        {{ $message }}
                    </div>
                @enderror
                <button wire:loading.remove wire:target='return' type="submit"
                    class="bg-[#1BC300] hover:bg-[#18af00] text-white font-bold py-2 px-6 rounded-lg mt-4 sm:mt-4 w-full">Kembalikan</button>
                <button wire:loading wire:target='return'
                    class="bg-[#1BC300] hover:bg-[#18af00] text-white font-bold py-2 px-6 rounded-lg mt-4 sm:mt-4 w-full">Please
                    wait...</button>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('delayedRedirect', (url) => {
                setTimeout(() => {
                    window.location.href = url;
                }, 2000);
            });
        });
    </script>
</div>
