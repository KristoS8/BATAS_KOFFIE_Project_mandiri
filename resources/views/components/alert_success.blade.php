@if (session('success'))
    <div class="transition-all duration-500 opacity-100 translate-y-0 bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-5 py-3 shadow-md"
        role="alert" id="successAlert">
        <div class="flex">
            <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20">
                    <path
                        d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                </svg></div>
            <div>
                <p class="font-bold">{{ session('success') }}</p>
                <p class="text-sm">Silahkan cek menu <span class="font-semibold">"Reservation Saya"</span> diatas.</p>
            </div>
        </div>
    </div>
@endif


<script>
    setTimeout(() => {

        const alert = document.getElementById('successAlert');

        if (alert) {

            // fade out
            alert.classList.remove(
                'opacity-100',
                'translate-y-0'
            );

            alert.classList.add(
                'opacity-0',
                '-translate-y-5'
            );

            // hapus element setelah animasi selesai
            setTimeout(() => {
                alert.remove();
            }, 1000);
        }

    }, 30000);
</script>
