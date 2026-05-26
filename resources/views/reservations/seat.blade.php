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

                <form action="{{ route('reservation_step2_store') }}" method="POST">
                    @csrf
                    {{-- CARD --}}
                    <div class="bg-white border border-gray-200 rounded-lg p-8 relative">
                        <input type="hidden" name="seat_id" id="selectedSeatInput">
                        {{-- SEAT MAP --}}
                        <div class="flex justify-center">
                            <div class="relative">

                                <img src="{{ asset('img/denah.png') }}" alt="Denah Cafe"
                                    class="max-w-3xl w-full object-contain">

                                @foreach ($seats as $seat)
                                    <button type="button"
                                        onclick="openSeatModal(
                                    '{{ $seat->id }}',
                                    '{{ $seat->seat_code }}',
                                    '{{ $seat->capacity }}',
                                    '{{ $seat->location }}',
                                    '{{ $seat->size_table }}',
                                    this)"
                                        class="absolute bg-caramel-500 text-white font-bold rounded-lg hover:scale-105 transition cursor-pointer opacity-0 seat-btn
                                        {{ $seat->seat_code == 'A1' ? 'bottom-16 right-7 w-24 h-16' : '' }}
                                        {{ $seat->seat_code == 'A2' ? 'bottom-40 right-6 w-24 h-16' : '' }}
                                        {{ $seat->seat_code == 'B1' ? 'bottom-16 right-64 w-24 h-16' : '' }}
                                        {{ $seat->status !== 'available' ? 'disabled' : '' }}
                                        ">
                                        {{ $seat->seat_code }}
                                    </button>
                                @endforeach

                            </div>
                        </div>

                        {{-- CONTINUE BUTTON --}}
                        <div class="mt-8 flex justify-end">
                            <button type="submit" id="continueButton"
                                class="bg-gray-400 p-3 rounded-lg font-semibold text-caramel-900 transition ease-in-out duration-200 cursor-not-allowed {{ isset($reservation['seat_id'])
                                    ? 'bg-caramel-500 text-caramel-900 hover:bg-caramel-400'
                                    : 'bg-gray-400 text-caramel-900 cursor-not-allowed' }}
    "
                                {{ isset($reservation['seat_id']) ? '' : 'disabled' }}>
                                Continue
                            </button>
                        </div>

                    </div>
                </form>

            </div>

        </section>

        <div class="relative flex flex-col my-6 bg-white shadow-sm border border-slate-200 rounded-lg w-80 mx-auto {{ isset($reservation['seat_id']) ? '' : 'hidden' }}"
            id="selectedSeatCard">
            <div class="p-4">

                <h4>Anda telah memilih tempat duduk! silahkan lanjut memilih menu</h4>

                <h5 class="mb-2 text-slate-800 text-xl font-semibold">
                    <span>Kode Meja: </span>
                    <span id="selectedSeatName"></span>
                </h5>
                <p class="text-slate-600 leading-normal font-light">
                    <span>Kapasitas: </span>
                    <span id="selectedSeatCapacity"></span>
                </p>
                <p class="text-slate-600 leading-normal font-light">
                    <span>Lokasi: </span>
                    <span id="selectedSeatLocation"></span>
                </p>
                <p class="text-slate-600 leading-normal font-light">
                    <span>Ukuran: </span>
                    <span id="selectedSeatSize"></span>
                </p>
            </div>
        </div>


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
                    <p><strong>Lokasi:</strong> <span id="seatLocation"></span></p>
                    <p><strong>Ukuran:</strong> <span id="seatSize"></span></p>
                    <p><strong>Status:</strong> Available</p>
                </div>

                <button type="button" onclick="confirmSeatSelection()"
                    class="block text-center mt-8 bg-caramel-500 text-white py-3 px-3 rounded-lg font-semibold hover:bg-caramel-600 transition">
                    Pilih Meja Ini
                </button>
            </div>
        </div>

    </div>

    @if (isset($reservation['seat_id']))
        @php
            $selectedSeat = $seats->find($reservation['seat_id']);
        @endphp
    @endif

    @if (isset($selectedSeat))
        <script>
            window.addEventListener('DOMContentLoaded', () => {

                document.getElementById('selectedSeatName').innerText =
                    "{{ $selectedSeat->seat_code }}";

                document.getElementById('selectedSeatCapacity').innerText =
                    "{{ $selectedSeat->capacity }} Kursi";

                document.getElementById('selectedSeatLocation').innerText =
                    "{{ $selectedSeat->location }}";

                document.getElementById('selectedSeatSize').innerText =
                    "{{ $selectedSeat->size_table }}";

                document.getElementById('selectedSeatInput').value =
                    "{{ $selectedSeat->id }}";

                // enable continue button
                const continueButton = document.getElementById('continueButton');

                continueButton.classList.remove(
                    'bg-gray-400',
                    'cursor-not-allowed'
                );

                continueButton.classList.add(
                    'bg-caramel-500',
                    'hover:bg-caramel-400'
                );

            });
        </script>
    @endif

    {{-- Script --}}
    <script>
        let selectedSeat = {};
        let selectedSeatButton = null;

        function openSeatModal(id, name, capacity, location, size, button) {

            selectedSeat = {
                id,
                name,
                capacity,
                location,
                size,
            };

            selectedSeatButton = button;
            document.getElementById('seatName').innerText = 'Meja ' + name;
            document.getElementById('seatCapacity').innerText = capacity + ' Kursi';
            document.getElementById('seatLocation').innerText = location;
            document.getElementById('seatSize').innerText = size;

            document.getElementById('seatModal').classList.remove('hidden');
            document.getElementById('seatModal').classList.add('flex');
        }

        function closeSeatModal() {
            document.getElementById('seatModal').classList.add('hidden');
            document.getElementById('seatModal').classList.remove('flex');
        }

        function confirmSeatSelection() {
            // reset semua highlight seat
            document.querySelectorAll('.seat-btn').forEach(btn => {
                btn.classList.remove('ring-4', 'ring-blue-400', 'scale-105');
            });

            // highlight selected seat
            selectedSeatButton.classList.add(
                'ring-4',
                'ring-white',
                'scale-105'
            );

            // tampilkan selected card
            document.getElementById('selectedSeatCard').classList.remove('hidden');

            // isi detail
            document.getElementById('selectedSeatName').innerText = selectedSeat.name;
            document.getElementById('selectedSeatCapacity').innerText = selectedSeat.capacity;
            document.getElementById('selectedSeatLocation').innerText = selectedSeat.location;
            document.getElementById('selectedSeatSize').innerText = selectedSeat.size;

            // isi hidden input
            document.getElementById('selectedSeatInput').value = selectedSeat.id;

            // aktifkan continue button
            const continueButton = document.getElementById('continueButton');

            continueButton.disabled = false;

            continueButton.classList.remove(
                'bg-gray-400',
                'cursor-not-allowed'
            );

            continueButton.classList.add(
                'bg-caramel-500',
                'hover:bg-caramel-400'
            );

            // tutup modal
            closeSeatModal();
        }
    </script>
</x-layout>
