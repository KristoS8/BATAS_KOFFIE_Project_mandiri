<x-layout navbarSolid="true">

    <div class="min-h-screen bg-gray-50 py-28">

        <x-step_indicator :currentStep="$current_step"></x-step_indicator>

        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 mt-10">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

                <div class="grid grid-cols-1 md:grid-cols-12 divide-y md:divide-y-0 md:divide-x divide-gray-100">

                    <div class="p-6 sm:p-8 md:col-span-7 flex flex-col justify-between space-y-6">
                        <div>
                            <div class="flex flex-wrap items-center justify-between gap-3 pb-5 border-b border-gray-100">
                                <div>
                                    <h1 class="text-2xl font-bold text-gray-800 tracking-tight">Konfirmasi Reservasi
                                    </h1>
                                    <p class="text-sm text-gray-500 mt-0.5">ID Reservasi: <span
                                            class="font-mono text-gray-700 font-medium">{{ $reservation['customer_name'] }}</span>
                                    </p>
                                </div>
                                <span
                                    class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800">
                                    <span class="w-1.5 h-1.5 rounded-full bg-green-600 animate-pulse"></span>
                                    Memesan
                                </span>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mt-6">
                                <div>
                                    <span
                                        class="block text-xs font-medium text-caramel-400 uppercase tracking-wider mb-1">
                                        <i class="fas fa-user text-caramel-400 mr-1.5 w-4 text-center"></i>Nama
                                        Pelanggan
                                    </span>
                                    <p class="text-sm font-semibold text-gray-800">{{ $reservation['customer_name'] }}
                                    </p>
                                </div>
                                <div>
                                    <span
                                        class="block text-xs font-medium text-caramel-400 uppercase tracking-wider mb-1">
                                        <i class="fas fa-phone text-caramel-400 mr-1.5 w-4 text-center"></i>Nomor
                                        Telepon
                                    </span>
                                    <p class="text-sm font-semibold text-gray-800">{{ $reservation['customer_hp'] }}
                                    </p>
                                </div>
                                <div>
                                    <span
                                        class="block text-xs font-medium text-caramel-400 uppercase tracking-wider mb-1">
                                        <i
                                            class="fas fa-calendar-alt text-caramel-400 mr-1.5 w-4 text-center"></i>Tanggal
                                        Reservasi
                                    </span>
                                    <p class="text-sm font-semibold text-gray-800">
                                        {{ \Carbon\Carbon::parse($reservation['customer_date'])->locale('id')->isoFormat('dddd, D MMMM YYYY') }}
                                    </p>
                                </div>
                                <div>
                                    <span
                                        class="block text-xs font-medium text-caramel-400 uppercase tracking-wider mb-1">
                                        <i class="fas fa-clock text-caramel-400 mr-1.5 w-4 text-center"></i>Waktu Sesi
                                    </span>
                                    <p class="text-sm font-semibold text-gray-800">{{ $reservation['customer_time'] }}
                                        WIB
                                    </p>
                                </div>
                                <div class="sm:col-span-2">
                                    <span
                                        class="block text-xs font-medium text-caramel-400 uppercase tracking-wider mb-1">
                                        <i class="fas fa-users text-caramel-400 mr-1.5 w-4 text-center"></i>Total Tamu
                                    </span>
                                    <p class="text-sm font-semibold text-gray-800">{{ $reservation['customer_guests'] }}
                                        Orang <span class="text-xs text-gray-400 font-normal">(Dewasa)</span></p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gray-50 rounded-xl p-4 border border-gray-200/60">
                            <span class="block text-xs font-bold text-caramel-500 uppercase tracking-wider mb-1">
                                <i class="fas fa-sticky-note text-caramel-400 mr-1.5"></i>Catatan Khusus
                            </span>
                            <p class="text-sm text-gray-600 leading-relaxed italic">
                                {{ $reservation['customer_note'] }}
                            </p>
                        </div>
                    </div>

                    <div class="p-6 sm:p-8 md:col-span-5 bg-gray-50/50 flex flex-col justify-between">
                        <div>
                            <h2
                                class="text-sm font-bold text-gray-800 uppercase tracking-wider mb-5 flex items-center gap-2">
                                <i class="fas fa-chair text-caramel-400"></i>Alokasi Meja & Tempat Duduk
                            </h2>

                            <div
                                class="bg-gradient-to-br from-caramel-400 to-caramel-300 text-white rounded-xl p-5 shadow-sm mb-6 flex items-center justify-between">
                                <div>
                                    <span
                                        class="text-[10px] uppercase tracking-widest text-gray-200 font-bold block">Nomor
                                        Meja Anda</span>
                                    <span class="text-3xl font-extrabold tracking-tight">{{ $seat->seat_code }}</span>
                                </div>
                                <div
                                    class="w-12 h-12 rounded-lg bg-white/10 flex items-center justify-center text-xl text-gray-100">
                                    <i class="fas fa-utensils"></i>
                                </div>
                            </div>

                            <div class="space-y-3.5">
                                <div
                                    class="flex items-center justify-between bg-white px-4 py-3 rounded-xl border border-gray-100 shadow-2xs">
                                    <span class="text-xs font-medium text-gray-700">Kapasitas Meja</span>
                                    <span class="text-xs font-semibold text-gray-800">{{ $seat->capacity }}</span>
                                </div>
                                <div
                                    class="flex items-center justify-between bg-white px-4 py-3 rounded-xl border border-gray-100 shadow-2xs">
                                    <span class="text-xs font-medium text-gray-700">Lokasi Area</span>
                                    <span class="text-xs font-semibold text-gray-800">{{ $seat->location }}</span>
                                </div>
                                <div
                                    class="flex items-center justify-between bg-white px-4 py-3 rounded-xl border border-gray-100 shadow-2xs">
                                    <span class="text-xs font-medium text-gray-700">Ukuran Meja</span>
                                    <span class="text-xs font-semibold text-gray-800">{{ $seat->size_table }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 flex items-start gap-2.5 text-gray-600">
                            <i class="fas fa-info-circle text-xs mt-0.5 text-caramel-400"></i>
                            <p class="text-xs leading-normal">Silakan tunjukkan bukti bookingan anda kepada kasir cafe
                                agar pesanan anda dapat diproses. Setelah konfirmasi pesanan, anda dapat langsung menuju
                                cafe dan menempati tempat yang anda pesan. Terima Kasih.</p>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-gray-50 px-6 py-4 sm:px-8 border-t border-gray-100 flex flex-col sm:flex-row sm:justify-end gap-4">

                    <div class="flex items-center justify-stretch sm:justify-end gap-3 w-full sm:w-auto">
                        <a href="/"
                            class="flex-1 sm:flex-initial text-center px-4 py-2 rounded-xl border border-gray-200 bg-white text-xs font-bold text-gray-600 transition-colors hover:bg-gray-50 hover:text-gray-800">
                            Kembali ke Beranda
                        </a>

                        <form action="{{ route('reservation_step4_store') }}" method="POST">
                            @csrf
                            <button
                                class="bg-caramel-500 p-3 rounded-lg font-semibold text-caramel-900 hover:bg-caramel-400 active:bg-caramel-300 transition ease-in-out duration-200">
                                Konfirmasi Pesanan
                            </button>
                        </form>
                    </div>

                </div>

            </div>
        </div>

    </div>

</x-layout>
