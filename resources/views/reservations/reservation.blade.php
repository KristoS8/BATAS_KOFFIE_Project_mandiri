<x-layout navbarSolid="true">

    <div class="min-h-screen bg-gray-50 py-28">

        {{-- STEP INDICATOR WRAPPER --}}
        <x-step_indicator :currentStep="$current_step"></x-step_indicator>

        {{-- FORM CARD --}}
        <div class="max-w-4xl mx-auto px-6">

            <div class="bg-white border border-gray-200 rounded-lg p-8">

                <h2 class="text-2xl font-semibold text-gray-800 mb-6">
                    Reservation Details
                </h2>

                <form action="{{ route('reservation_step1_store') }}" method="POST">
                    @csrf
                    <div class="space-y-6">

                        {{-- NAME --}}
                        <div class="grid grid-cols-3 items-center gap-4">
                            <label class="text-sm text-gray-600">Nama Lengkap*</label>
                            <input type="text"
                                class="col-span-2 border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-1 focus:ring-caramel-500"
                                id="name" name="name" required
                                value="{{ old('name', session('reservation.customer_name')) }}">
                        </div>

                        {{-- PHONE --}}
                        <div class="grid grid-cols-3 items-center gap-4">
                            <label class="text-sm text-gray-600">No. HP*</label>
                            <input type="text"
                                class="col-span-2 border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-1 focus:ring-caramel-500"
                                placeholder="+62" id="hp" name="hp" required
                                value="{{ old('name', session('reservation.phone_number')) }}">
                        </div>

                        {{-- DATE + TIME --}}
                        <div class="grid
                                grid-cols-3 items-center gap-4">
                            <label class="text-sm text-gray-600">Tanggal Dan Waktu*</label>

                            <div class="col-span-2 grid grid-cols-2 gap-4">
                                <input type="date" class="border border-gray-300 rounded-md px-4 py-2" id="date"
                                    name="date" value="{{ old('name', session('reservation.reservation_date')) }}"
                                    required>
                                <input type="time" class="border border-gray-300 rounded-md px-4 py-2" id="time"
                                    name="time" required
                                    value="{{ old('name', session('reservation.reservation_time')) }}">
                            </div>
                        </div>

                        {{-- GUEST --}}
                        <div class="grid grid-cols-3 items-center gap-4">
                            <label class="text-sm text-gray-600">Jumlah Orang*</label>
                            <input type="number"
                                class="col-span-2 border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-1 focus:ring-caramel-500"
                                id="guests" name="guests" required
                                value="{{ old('name', session('reservation.total_guest')) }}">
                        </div>

                        {{-- NOTE --}}
                        <div class="grid grid-cols-3 items-start gap-4">
                            <label class="text-sm text-gray-600 mt-2">Catatan</label>
                            <textarea rows="3"
                                class="col-span-2 border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-1 focus:ring-caramel-500"
                                placeholder="Catatan Untuk Cafe" id="note" name="note"
                                value="{{ old('name', session('reservation.note')) }}"></textarea>
                        </div>

                    </div>


                    {{-- BUTTON --}}
                    <div class="mt-8 flex justify-end">
                        <button
                            class="bg-caramel-500 p-3 rounded-lg font-semibold text-caramel-900 hover:bg-caramel-400 active:bg-caramel-300 transition ease-in-out duration-200">
                            Continue
                        </button>
                    </div>

                </form>

            </div>

        </div>

    </div>
</x-layout>
