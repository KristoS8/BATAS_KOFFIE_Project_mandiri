<x-layout navbarSolid="true">

    <div class="min-h-screen bg-gray-50 py-28">

        <x-step_indicator :currentStep="$current_step"></x-step_indicator>

        {{-- {{ dd(session('reservation')) }} --}}

        <img src="{{ asset('img/pembangunan.jpg') }}" alt="Denah Cafe"
            class="max-w-3xl w-full object-contain bg-amber-400 block ml-auto mr-auto">

        <h1 class="text-xl block text-center w-full mt-5">Bagian ini masih dalam tahap pembangunan, silahkan coba lagi
            nanti!
        </h1>

        <a href="{{ route('reservation_step4') }}"
            class="bg-caramel-500 p-3 rounded-lg font-semibold text-caramel-900 hover:bg-caramel-400 active:bg-caramel-300 transition ease-in-out duration-200 m-20">
            Continue
        </a>

    </div>

</x-layout>
