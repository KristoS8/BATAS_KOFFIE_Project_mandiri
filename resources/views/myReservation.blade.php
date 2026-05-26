<x-layout>
    {{-- hero image --}}
    <section class="relative mx-auto min-h-screen">
        <img class="w-full object-cover h-screen rounded-md" src="{{ asset('img/cafe.jpeg') }}" alt="Cafe">
        <div class="absolute inset-0 bg-caput-mortuum-500 opacity-60 rounded-md"></div>
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="text-center min-h-max">
                <h2 class="text-white text-5xl md:text-7xl lg:text-8xl font-bold">Cek Reservasi Anda</h2>
            </div>
        </div>
    </section>

    <section class="bg-gray-50 py-16 px-4 flex justify-center items-center">
        <div
            class="w-full max-w-md bg-white rounded-2xl shadow-sm border border-gray-100 p-5 sm:p-6 transition-all duration-300">

            <div class="mb-5">
                <h2 class="font-bold text-gray-800 flex items-center gap-3 text-2xl">
                    <i class="fa-solid fa-mug-saucer text-caramel-400"></i> Informasi Reservasi
                </h2>
                <p class="text-sm text-gray-500 mt-2">Masukkan kode booking unik Anda yang tertera pada resi digital
                    untuk melacak status meja.</p>
            </div>

            <div class="space-y-2">
                <div class="flex gap-2">
                    <input type="text" id="booking-id" placeholder="Masukkan ID Reservasi"
                        class="flex-1 bg-gray-50 text-sm font-semibold text-gray-800 placeholder-gray-400 rounded-xl px-4 py-3 border border-gray-200 focus:outline-none focus:border-gray-400 focus:bg-white transition-all duration-200 uppercase tracking-wide">

                    <button onclick="checkReservationStatus()" id="btn-submit"
                        class="bg-caramel-500 p-3 rounded-lg font-semibold text-caramel-900 hover:bg-caramel-400 active:bg-caramel-300 transition ease-in-out duration-200">
                        <i class="fa-solid fa-magnifying-glass text-xs" id="btn-icon"></i>
                        <span id="btn-text">Cek Reservasi</span>
                    </button>
                </div>
                <p id="validation-hint" class="text-sm text-red-500 font-medium hidden">Mohon masukkan ID
                    reservasi Anda terlebih dahulu.</p>
            </div>

            <div class="mt-4">

                <div id="loading-state" class="hidden py-10 flex-col items-center justify-center gap-2.5">
                    <div class="w-6 h-6 border-2 border-gray-200 border-t-gray-800 rounded-full animate-spin"></div>
                    <span class="text-xs font-medium text-gray-400 tracking-wide">Mencari data meja...</span>
                </div>

                <div id="result-state"
                    class="hidden opacity-0 transform translate-y-2 transition-all duration-300 ease-out border-t border-gray-100 mt-4 pt-4 space-y-5">

                    <div
                        class="flex items-center justify-between bg-gray-50 px-3 py-2 rounded-xl border border-gray-100">
                        <span class="text-xs font-mono font-bold text-gray-700 md:text-sm"
                            id="display-kode-booking">#BK-2026</span>
                        <span
                            class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-green-100 text-green-800 md:text-sm">
                            <span class="w-3 h-3 rounded-full bg-green-600 animate-pulse"></span> Booked
                        </span>
                    </div>

                    <div class="space-y-7 md:space-y-10"> {{-- Menambah jarak vertikal antar-kelompok besar di PC --}}

                        <h4
                            class="text-[10px] md:text-sm font-bold tracking-widest text-gray-800 uppercase border-b border-gray-50 pb-1">
                            Detail Pelanggan
                        </h4>

                        {{-- Menggunakan md:gap-y-8 untuk memberi jarak vertikal yang lebih lega antar-baris data di PC --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-x-8 md:gap-y-8 text-xs md:text-sm">

                            <div class="flex items-center gap-2.5 md:py-1"> {{-- md:py-1 menambah ruang bantalan atas-bawah baris --}}
                                <i class="fa-solid fa-user text-caramel-400 w-4 text-center md:text-base"></i>
                                <div>
                                    <span class="text-caramel-400 block text-[10px] md:text-xs">Nama Pelanggan</span>
                                    <span class="font-semibold text-gray-800 md:font-bold" id="display-nama">Raditya
                                        Rahman</span>
                                </div>
                            </div>

                            <div class="flex items-center gap-2.5 md:py-1">
                                <i class="fa-solid fa-phone text-caramel-400 w-4 text-center md:text-base"></i>
                                <div>
                                    <span class="text-caramel-400 block text-[10px] md:text-xs">Nomor Telepon</span>
                                    <span class="font-semibold text-gray-800 md:font-bold" id="display-telepon">+62
                                        812-3456-7890</span>
                                </div>
                            </div>

                            <div class="flex items-center gap-2.5 md:py-1">
                                <i class="fa-solid fa-calendar-days text-caramel-400 w-4 text-center md:text-base"></i>
                                <div>
                                    <span class="text-caramel-400 block text-[10px] md:text-xs">Tanggal & Waktu
                                        Sesi</span>
                                    <span class="font-semibold text-gray-800 md:font-bold" id="display-jadwal">Selasa,
                                        26 Mei 2026 (19:00 - 21:00 WIB)</span>
                                </div>
                            </div>

                            <div class="flex items-center gap-2.5 md:py-1">
                                <i class="fa-solid fa-users text-caramel-400 w-4 text-center md:text-base"></i>
                                <div>
                                    <span class="text-caramel-400 block text-[10px] md:text-xs">Total Tamu</span>
                                    <span class="font-semibold text-gray-800 md:font-bold" id="display-tamu">4
                                        Orang</span>
                                </div>
                            </div>
                        </div>

                        <div
                            class="bg-amber-50/50 border border-dashed border-amber-200 rounded-xl p-3 md:p-5 mt-2 md:mt-4">
                            <span
                                class="block text-[9px] md:text-xs font-bold text-amber-800 uppercase tracking-wider mb-1">
                                Catatan Restoran
                            </span>
                            <p class="text-xs md:text-sm text-amber-950/80 leading-relaxed italic" id="display-catatan">
                                "Merayakan anniversary pernikahan. Mohon sediakan meja dengan pencahayaan hangat."
                            </p>
                        </div>
                    </div>

                    <div class="space-y-3 pt-2">
                        <h4
                            class="text-[10px] md:text-[16px] font-bold tracking-widest text-gray-800 uppercase border-b border-gray-50 pb-1">
                            Alokasi Tempat Duduk</h4>

                        <div class="space-y-2">
                            <div
                                class="flex items-center justify-between bg-gray-50 px-3 py-2.5 rounded-xl border border-gray-100">
                                <div class="flex items-center gap-2 text-xs font-medium text-caramel-400 md:text-sm">
                                    <i class="fa-solid fa-chair text-caramel-400 w-4 text-center"></i> Kode Kursi
                                </div>
                                <span
                                    class="text-xs font-extrabold bg-gray-900 text-white px-2 py-0.5 rounded md:text-sm"
                                    id="display-kursi">T-12</span>
                            </div>
                            <div
                                class="flex items-center justify-between bg-white px-3 py-2.5 rounded-xl border border-gray-100">
                                <div class="flex items-center gap-2 text-xs font-medium text-caramel-400 md:text-sm">
                                    <i class="fa-solid fa-maximize text-caramel-400 w-4 text-center"></i> Kapasitas &
                                    Ukuran
                                </div>
                                <span class="text-xs font-semibold text-gray-800 md:text-sm" id="display-ukuran">Maks. 4
                                    Kursi (140
                                    x 90 cm)</span>
                            </div>
                            <div
                                class="flex items-center justify-between bg-white px-3 py-2.5 rounded-xl border border-gray-100">
                                <div class="flex items-center gap-2 text-xs font-medium text-caramel-400 md:text-sm">
                                    <i class="fa-solid fa-compass text-caramel-400 w-4 text-center "></i> Area Lokasi
                                </div>
                                <span
                                    class="text-xs font-semibold text-gray-800 bg-emerald-50 px-2 py-0.5 rounded md:text-sm"
                                    id="display-lokasi">Window View (Sisi Barat)</span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
</x-layout>

<script>
    async function checkReservationStatus() {
        const inputField =
            document.getElementById('booking-id');

        const validationHint =
            document.getElementById('validation-hint');

        const loadingState =
            document.getElementById('loading-state');

        const resultState =
            document.getElementById('result-state');

        const btnSubmit =
            document.getElementById('btn-submit');

        const btnIcon =
            document.getElementById('btn-icon');

        const btnText =
            document.getElementById('btn-text');

        // VALIDASI KOSONG
        if (!inputField.value.trim()) {

            validationHint.classList.remove('hidden');

            return;
        }

        validationHint.classList.add('hidden');

        // SHOW LOADING
        resultState.classList.add('hidden');

        loadingState.classList.remove('hidden');
        loadingState.classList.add('flex');

        btnSubmit.disabled = true;

        btnIcon.className =
            "fa-solid fa-circle-notch animate-spin text-xs";

        btnText.innerText = "Memuat...";

        try {

            const response = await fetch(
                "{{ route('getMyReservation') }}", {
                    method: "POST",

                    headers: {
                        "Content-Type": "application/json",

                        "X-CSRF-TOKEN": document.querySelector(
                            'meta[name="csrf-token"]'
                        ).content
                    },

                    body: JSON.stringify({
                        ID_Reservation: inputField.value.trim()
                    })
                }
            );

            const result = await response.json();

            // RESET BUTTON
            loadingState.classList.add('hidden');

            btnSubmit.disabled = false;

            btnIcon.className =
                "fa-solid fa-magnifying-glass text-xs";

            btnText.innerText =
                "Cek Reservasi";

            // JIKA TIDAK DITEMUKAN
            if (!result.success) {

                validationHint.innerText =
                    result.message;

                validationHint.classList.remove('hidden');

                return;
            }

            // DATA RESERVATION
            const data = result.data;

            // ISI DATA
            document.getElementById(
                    'display-kode-booking'
                ).innerText =
                data.ID_Reservasi;

            document.getElementById(
                    'display-nama'
                ).innerText =
                data.customer_name;

            document.getElementById(
                    'display-telepon'
                ).innerText =
                data.customer_hp;

            document.getElementById(
                    'display-jadwal'
                ).innerText =
                data.customer_date +
                ' - ' +
                data.customer_time + ' WIB';

            document.getElementById(
                    'display-tamu'
                ).innerText =
                data.customer_guests + ' Orang';

            document.getElementById(
                    'display-catatan'
                ).innerText =
                data.customer_note ?? '-';

            document.getElementById(
                    'display-kursi'
                ).innerText =
                data.seat_code;

            document.getElementById(
                    'display-ukuran'
                ).innerText =
                data.seat_capacity +
                ' Kursi - ' +
                data.seat_size;

            document.getElementById(
                    'display-lokasi'
                ).innerText =
                data.seat_location;

            // TAMPILKAN RESULT
            resultState.classList.remove('hidden');

            setTimeout(() => {

                resultState.classList.add(
                    'opacity-100',
                    'translate-y-0'
                );

            }, 50);

        } catch (error) {

            console.log(error);

            validationHint.innerText =
                "Terjadi kesalahan server";

            validationHint.classList.remove('hidden');
        }
    }

    // Fitur Tambahan UX: Akses cepat tombol klik lewat ketukan tombol 'Enter' pada Keyboard HP/PC
    document.getElementById('booking-id').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            checkReservationStatus();
        }
    });
</script>
