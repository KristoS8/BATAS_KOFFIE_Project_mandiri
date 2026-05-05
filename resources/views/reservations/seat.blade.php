<x-layout navbarSolid="true">

    <div class="min-h-screen bg-gray-50 py-28">


        <x-step_indicator :currentStep="$current_step"></x-step_indicator>

        {{-- Section : Seat Selection --}}
        <section class="bg-gray-50 px-6">

            <div class="max-w-5xl mx-auto">

                {{-- TITLE --}}
                <div class="text-center mb-8">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-2">
                        Choose Your Seat
                    </h2>
                    <p class="text-gray-500 text-sm">
                        Pilih posisi tempat duduk sesuai preferensi Anda sebelum datang ke café.
                    </p>
                </div>

                {{-- CARD --}}
                <div class="bg-white border border-gray-200 rounded-lg p-8 relative">

                    {{-- SEAT MAP --}}
                    <div class="flex justify-center">
                        <div class="relative">

                            <img src="{{ asset('img/denah.png') }}" alt="Denah Cafe"
                                class="max-w-3xl w-full object-contain">

                            {{-- Seat A1 --}}
                            <button onclick="openSeatModal('A1','2 Kursi','Small Table','Dekat Gerbang')"
                                class="absolute bottom-16 right-7 w-24 h-16 bg-caramel-500 text-white font-bold rounded-lg hover:scale-105 transition cursor-pointer opacity-0">
                                A1
                            </button>

                            {{-- Seat A2 --}}
                            <button onclick="openSeatModal('A2','2 Kursi','Small Table','Area Tengah')"
                                class="absolute bottom-40 right-6 w-24 h-16 bg-caramel-500 text-white font-bold rounded-lg hover:scale-105 transition cursor-pointer opacity-0">
                                A2
                            </button>

                            {{-- Seat B1 --}}
                            <button onclick="openSeatModal('B1','4 Kursi','Family Table','Indoor Tengah')"
                                class="absolute bottom-16 right-64 w-24 h-16 bg-caramel-500 text-white font-bold rounded-lg hover:scale-105 transition cursor-pointer opacity-0">
                                B1
                            </button>

                        </div>
                    </div>

                    {{-- CONTINUE BUTTON --}}
                    <div class="mt-8 flex justify-end">
                        <button
                            class="bg-caramel-500 p-3 rounded-lg font-semibold text-caramel-900 hover:bg-caramel-400 active:bg-caramel-300 transition ease-in-out duration-200">
                            Continue
                        </button>
                    </div>

                </div>

            </div>

        </section>


        {{-- Modal Detail Seat --}}
        <div id="seatModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">

            <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md p-8 relative">

                <button onclick="closeSeatModal()"
                    class="absolute top-4 right-4 text-gray-400 hover:text-black text-4xl">
                    &times;
                </button>

                <h3 id="seatName" class="text-3xl font-bold text-zinc-900 mb-6"></h3>

                <div class="space-y-3 text-gray-600 text-lg">
                    <p><strong>Kapasitas:</strong> <span id="seatCapacity"></span></p>
                    <p><strong>Ukuran:</strong> <span id="seatSize"></span></p>
                    <p><strong>Lokasi:</strong> <span id="seatLocation"></span></p>
                    <p><strong>Status:</strong> Available</p>
                </div>

                <a href="#"
                    class="block text-center mt-8 bg-caramel-500 text-white py-3 rounded-lg font-semibold hover:bg-caramel-600 transition">
                    Pilih Meja Ini
                </a>
            </div>
        </div>

    </div>
    {{-- Script --}}
    <script>
        function openSeatModal(name, capacity, size, location) {
            document.getElementById('seatName').innerText = 'Meja ' + name;
            document.getElementById('seatCapacity').innerText = capacity;
            document.getElementById('seatSize').innerText = size;
            document.getElementById('seatLocation').innerText = location;

            document.getElementById('seatModal').classList.remove('hidden');
            document.getElementById('seatModal').classList.add('flex');
        }

        function closeSeatModal() {
            document.getElementById('seatModal').classList.add('hidden');
            document.getElementById('seatModal').classList.remove('flex');
        }
    </script>
</x-layout>
