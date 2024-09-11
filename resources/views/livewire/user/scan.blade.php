<div class="min-h-screen">
    @session('error')
        <div aria-live="assertive" id="toast-notification" x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
            class="pointer-events-none fixed inset-x-0 bottom-0 px-4 pb-4 sm:px-6 sm:pb-6 mb-20 md:mb-4">
            <div class="flex justify-center sm:justify-end">
                <div
                    class="pointer-events-auto w-full max-w-sm overflow-hidden rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5">
                    <div class="p-4">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <svg class="h-6 w-6 text-red-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </div>
                            <div class="ml-3 w-0 flex-1 pt-0.5">
                                <p class="text-sm font-medium text-gray-900">{{ Session::get('error') }}</p>
                            </div>
                            <div class="ml-4 flex flex-shrink-0">
                                <button type="button" @click="show = false"
                                    class="inline-flex rounded-lg bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                    <span class="sr-only">Close</span>
                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path
                                            d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsession
    <div class="flex justify-center bg-[#D4EAE6] h-1/2 rounded-lg p-4 z-0">
        <div id="reader" class="w-96 block rounded-lg"></div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let scanInProgress = false;

        function onScanSuccess(decodedText, decodedResult) {
            if (!scanInProgress) {
                scanInProgress = true;
                @this.call('onQrCodeScanned', decodedText)
                    .then(() => {
                        scanInProgress = false;
                    })
                    .catch(() => {
                        scanInProgress = false;
                    });
            }
        }

        function onScanFailure(error) {}

        let html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {
                fps: 10,
                qrbox: {
                    width: 200,
                    height: 200
                }
            },
            false);
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    });
</script>
