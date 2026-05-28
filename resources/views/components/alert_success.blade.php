@props([
    'type' => 'success',
])

@php
    $bgcolor = 'bg-teal-100';
    $borderColor = 'border-teal-500';
    $textColor = 'text-teal-900';
    $iconColor = 'text-teal-500';

    if ($type == 'error') {
        $bgcolor = 'bg-red-100';
        $borderColor = 'border-red-500';
        $textColor = 'text-red-900';
        $iconColor = 'text-red-500';
    }

@endphp


<div class="hidden transition-all duration-500 opacity-100 translate-y-0 {{ $bgcolor }} border-t-4 {{ $borderColor }} rounded-b {{ $textColor }} px-5 py-3 shadow-md"
    role="alert" id="successAlert">
    <div class="flex">
        <div class="py-1"><svg class="fill-current h-6 w-6 {{ $iconColor }} mr-4" xmlns="http://www.w3.org/2000/svg"
                id="icon" viewBox="0 0 20 20">
                <path
                    d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
            </svg></div>
        <div>
            <p class="font-bold" id="alertText"></p>
            <p class="text-sm">Silahkan cek menu <span class="font-semibold">"Reservation Saya"</span> diatas.</p>
        </div>
    </div>
</div>



<script>
    function showAlert(message, type = 'success') {

        const alertText = document.getElementById('alertText');
        const alert = document.getElementById('successAlert');
        const icon = document.getElementById('icon');

        alertText.innerText = message;

        // reset warna
        alert.classList.remove(
            'bg-teal-100',
            'border-teal-500',
            'text-teal-900',
            'bg-red-100',
            'border-red-500',
            'text-red-900'
        );

        icon.classList.remove(
            'text-teal-500',
        );

        // jika error
        if (type == 'error') {

            alert.classList.add(
                'bg-red-100',
                'border-red-500',
                'text-red-900'
            );

            icon.classList.add(
                'text-red-500',
            );

        } else {

            // default success
            alert.classList.add(
                'bg-teal-100',
                'border-teal-500',
                'text-teal-900'
            );

            icon.classList.add(
                'text-teal-500',
            );
        }

        // tampilkan alert
        alert.classList.remove(
            'hidden',
            'opacity-0',
            '-translate-y-5'
        );

        alert.classList.add(
            'opacity-100',
            'translate-y-0'
        );

        setTimeout(() => {

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

    }
</script>

@if (session('success'))
    <script>
        window.addEventListener('DOMContentLoaded', () => {

            showAlert(
                "{{ session('success') }}"
            );

        });
    </script>
@endif
