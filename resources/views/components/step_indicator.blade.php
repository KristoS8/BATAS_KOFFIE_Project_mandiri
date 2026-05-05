@props(['currentStep' => 1])
<div class="w-full border-y border-gray-200 mb-12 mt-2">

    <div class="max-w-4xl mx-auto px-6 py-6">
        <div class="flex items-center justify-between text-sm text-gray-500">

            @for ($i = 1; $i <= 4; $i++)
                <div class="flex items-center gap-2">

                    {{-- BULATAN --}}
                    <div
                        class="w-8 h-8 flex items-center justify-center rounded-full
                    {{ $currentStep >= $i ? 'bg-caramel-600 text-white' : 'bg-gray-300 text-white' }}">
                        {{ $i }}
                    </div>

                    {{-- LABEL --}}
                    <span class="{{ $currentStep >= $i ? 'text-gray-800' : 'text-gray-300' }}">
                        @switch($i)
                            @case(1)
                                Reservation
                            @break

                            @case(2)
                                Seat
                            @break

                            @case(3)
                                Menu
                            @break

                            @case(4)
                                Confirm
                            @break
                        @endswitch
                    </span>

                </div>

                {{-- GARIS --}}
                @if ($i < 4)
                    <div class="flex-1 h-[1px] bg-gray-300 mx-3"></div>
                @endif
            @endfor

        </div>
    </div>

</div>
