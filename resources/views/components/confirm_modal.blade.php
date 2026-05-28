<div class="bg-white w-full max-w-md rounded-2xl p-6 shadow-xl relative">

    <button onclick="closeCancelModal()" type="button"
        class="absolute top-4 end-4 text-gray-400 bg-transparent hover:bg-gray-100 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center transition cursor-pointer">
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M18 18L6 6" />
        </svg>
        <span class="sr-only">Close modal</span>
    </button>

    <div class="text-center pt-4">
        <svg class="mx-auto mb-4 text-fg-disabled w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 13V8m0 8h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
        </svg>

        <h3 class="mb-6 text-base font-medium text-gray-900 leading-relaxed px-2">
            Apakah kamu yakin ingin membatalkan reservasi ini?
        </h3>
    </div>

    <div class="flex items-center gap-3 justify-center">
        <button onclick="closeCancelModal()" type="button"
            class="w-1/2 px-4 py-2.5 rounded-lg border border-gray-300 text-gray-900 hover:bg-gray-100 font-medium text-sm transition cursor-pointer active:bg-gray-200">
            Tidak
        </button>

        <button onclick="confirmCancelReservation()" type="button"
            class="w-1/2 px-4 py-2.5 rounded-lg bg-red-600 text-white hover:bg-red-500 font-medium text-sm transition shadow-xs cursor-pointer active:bg-red-700">
            Ya
        </button>
    </div>

</div>
