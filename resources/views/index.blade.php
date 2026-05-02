<x-layout>

    {{-- hero image --}}
    <section class="relative mx-auto min-h-screen">
        <img class="w-full object-cover h-screen rounded-md" src="{{ asset('img/cafe.jpeg') }}" alt="Cafe">
        <div class="absolute inset-0 bg-caput-mortuum-500 opacity-60 rounded-md"></div>
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="text-center min-h-max">
                <h2 class="text-white text-5xl md:text-7xl lg:text-8xl font-bold">Grind The Essentials</h2>
                <p class="text-raw-umber-900 font-semibold mb-10 text-lg">Dibuat dari biji kopi Indonesia pilihan untuk
                    pengalaman
                    minum
                    kopi terbaik setiap hari</p>
                <a href=""
                    class="bg-caramel-500 p-3 rounded-lg font-semibold text-caramel-900 hover:bg-caramel-400 active:bg-caramel-300 transition ease-in-out duration-200">Reservasi
                    Tempat</a>
            </div>
        </div>
    </section>

    {{-- Section 2 : Best Seller --}}
    <section class="bg-stone-100 py-20 px-6">
        <div class="max-w-7xl mx-auto text-center">

            {{-- Heading --}}
            <h2 class="text-4xl md:text-6xl font-bold text-caramel-300 mb-4">
                Enjoy a new blend of coffee style
            </h2>

            <p class="text-gray-500 text-lg mb-14">
                Explore all flavours of coffee with us. There is always a new cup worth experiencing
            </p>

            {{-- Cards --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

                {{-- Card 1 --}}
                <div
                    class="bg-white border border-amber-100 shadow-sm hover:shadow-lg hover:shadow-linen-200 transition duration-300">
                    <img src="{{ asset('img/cafe.jpeg') }}" alt="Cappuccino" class="w-full h-64 object-cover">

                    <div class="p-6 text-center">
                        <h3 class="text-2xl font-bold text-desert-sand-200 mb-2">Cappuccino</h3>
                        <p class="text-gray-500 mb-1 text-xs">1/3 espresso, 1/3 steamed milk (susu panas), dan 1/3 buih
                            susu
                            (milk foam)</p>
                        <p class="text-xl font-bold text-desert-sand-300 mb-5">Rp. 35.000,00</p>
                    </div>
                </div>

                {{-- Card 2 --}}
                <div
                    class="bg-white border border-amber-100 shadow-sm hover:shadow-lg hover:shadow-linen-200 transition duration-300">
                    <img src="{{ asset('img/cafe.jpeg') }}" alt="Chai Latte" class="w-full h-64 object-cover">

                    <div class="p-6 text-center">
                        <h3 class="text-2xl font-semibold text-desert-sand-200 mb-2">Chai Latte</h3>
                        <p class="text-gray-500 mb-1">Coffee 50% | Milk 50%</p>
                        <p class="text-xl font-bold text-desert-sand-300 mb-5">$8.50</p>
                    </div>
                </div>

                {{-- Card 3 --}}
                <div
                    class="bg-white border border-amber-100 shadow-sm hover:shadow-lg hover:shadow-linen-200 transition duration-300">
                    <img src="{{ asset('img/cafe.jpeg') }}" alt="Macchiato" class="w-full h-64 object-cover">

                    <div class="p-6 text-center">
                        <h3 class="text-2xl font-semibold text-desert-sand-200 mb-2">Macchiato</h3>
                        <p class="text-gray-500 mb-1">Coffee 50% | Milk 50%</p>
                        <p class="text-xl font-bold text-desert-sand-300 mb-5">$8.50</p>
                    </div>
                </div>

                {{-- Card 4 --}}
                <div
                    class="bg-white border border-amber-100 shadow-sm hover:shadow-lg hover:shadow-linen-200 transition duration-300">
                    <img src="{{ asset('img/cafe.jpeg') }}" alt="Espresso" class="w-full h-64 object-cover">

                    <div class="p-6 text-center">
                        <h3 class="text-2xl font-semibold text-desert-sand-200 mb-2">Espresso</h3>
                        <p class="text-gray-500 mb-1">Coffee 50% | Milk 50%</p>
                        <p class="text-xl font-bold text-desert-sand-300 mb-5">$8.50</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Section 3 : Seat Reservation CTA --}}
    <section class="bg-stone-100 py-24 px-6">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-14 items-center">

            {{-- Left Content --}}
            <div>
                <h2 class="text-4xl md:text-6xl font-bold text-caramel-300 leading-tight mb-6">
                    Pick Your Favorite Spot Before You Arrive
                </h2>

                <p class="text-gray-500 text-lg leading-relaxed mb-8 max-w-xl">
                    Reservasi meja pilihanmu sekarang. Pilih area terbaik, pesan menu lebih awal,
                    dan datang tanpa takut kehabisan tempat.
                </p>

                <a href=""
                    class="bg-caramel-500 p-3 rounded-lg font-semibold text-caramel-900 hover:bg-caramel-400 active:bg-caramel-300 transition ease-in-out duration-200">Reservasi
                    Tempat</a>
            </div>


            {{-- Right Content : Interactive Seat Map --}}
            <div class="bg-linen-500 relative rounded-2xl shadow-xl p-8 min-h-[520px] border border-stone-200">

                {{-- Layout Cafe --}}
                <img src="{{ asset('img/denah.png') }}" alt="Denah Cafe" class="w-full h-full object-contain">

                {{-- Seat A1 --}}
                <button onclick="openSeatModal('A1','2 Kursi','Small Table','Dekat Gerbang')"
                    class="absolute bottom-36 right-14 w-14 h-14 bg-caramel-500 text-white font-bold rounded-lg hover:scale-105 transition opacity-0 cursor-pointer">
                    A1
                </button>

                {{-- Seat A2 --}}
                <button onclick="openSeatModal('A2','2 Kursi','Small Table','Area Tengah')"
                    class="absolute bottom-52 right-14 w-14 h-14 bg-caramel-500 text-white font-bold rounded-lg hover:scale-105 transition opacity-0 cursor-pointer">
                    A2
                </button>

                {{-- Seat B1 --}}
                <button onclick="openSeatModal('B1','4 Kursi','Family Table','Indoor Tengah')"
                    class="absolute bottom-35 right-54 w-14 h-14 bg-caramel-500 text-white font-bold rounded-lg hover:scale-105 transition opacity-0 cursor-pointer">
                    B1
                </button>

                {{-- Seat B2 --}}
                <button onclick="openSeatModal('B2','4 Kursi','Family Table','Indoor Tengah')"
                    class="absolute bottom-35 left-57 w-14 h-14 bg-caramel-500 text-white font-bold rounded-lg hover:scale-105 transition opacity-0 cursor-pointer">
                    B2
                </button>

                {{-- Seat B3 --}}
                <button onclick="openSeatModal('B2','4 Kursi','Family Table','Indoor Tengah')"
                    class="absolute bottom-35 left-15 w-14 h-14 bg-caramel-500 text-white font-bold rounded-lg hover:scale-105 transition opacity-0 cursor-pointer">
                    B3
                </button>

                {{-- Seat C1 --}}
                <button onclick="openSeatModal('C1','2 Kursi','Couple Table','Indoor Atas')"
                    class="absolute top-35 left-40 w-12 h-12 bg-caramel-500 text-white font-bold rounded-lg hover:scale-105 transition opacity-0 cursor-pointer">
                    C1
                </button>

            </div>
        </div>
    </section>


    {{-- Modal Detail Seat --}}
    <div id="seatModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">

        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md p-8 relative">

            <button onclick="closeSeatModal()" class="absolute top-4 right-4 text-gray-400 hover:text-black text-4xl">
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
                Reservasi Meja Ini
            </a>
        </div>
    </div>

    {{-- Footer --}}
    <footer class="relative bg-caramel-500 text-white overflow-hidden">

        {{-- Background Image --}}
        <div class="absolute inset-0">
            <img src="{{ asset('img/background footer.jpg') }}" alt="Coffee Beans"
                class="w-full h-full object-cover opacity-50">
        </div>

        {{-- Overlay --}}
        <div class="absolute inset-0 bg-amber-950/80"></div>

        {{-- Content --}}
        <div class="relative max-w-7xl mx-auto px-6 py-20 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">

            {{-- Brand --}}
            <div>
                <h2 class="text-4xl font-bold italic mb-6 text-caramel-400">
                    BATAS-KOFFIE
                </h2>

                <p class="text-stone-200 leading-relaxed mb-6">
                    Tempat terbaik menikmati kopi berkualitas sambil bersantai bersama teman,
                    keluarga, ataupun bekerja dengan suasana nyaman.
                </p>

                {{-- Social Icons --}}
                <div class="flex gap-4">

                    <a href="#"
                        class="w-10 h-10 rounded-full bg-white/10 hover:bg-caramel-500 flex items-center justify-center transition">
                        <span><i class="fa-brands fa-facebook-f"></i></span>
                    </a>

                    <a href="#"
                        class="w-10 h-10 rounded-full bg-white/10 hover:bg-caramel-500 flex items-center justify-center transition">
                        <span><i class="fa-brands fa-instagram"></i></span>
                    </a>

                    <a href="#"
                        class="w-10 h-10 rounded-full bg-white/10 hover:bg-caramel-500 flex items-center justify-center transition">
                        <span><i class="fa-brands fa-youtube"></i></span>
                    </a>

                    <a href="#"
                        class="w-10 h-10 rounded-full bg-white/10 hover:bg-caramel-500 flex items-center justify-center transition">
                        <span><i class="fa-brands fa-tiktok"></i></span>
                    </a>

                </div>
            </div>


            {{-- About --}}
            <div>
                <h3 class="text-2xl font-semibold mb-6 text-caramel-400">About</h3>

                <ul class="space-y-3 text-stone-200">
                    <li><a href="#" class="hover:text-caramel-300 transition">Menu</a></li>
                    <li><a href="#" class="hover:text-caramel-300 transition">Features</a></li>
                    <li><a href="#" class="hover:text-caramel-300 transition">News & Blogs</a></li>
                    <li><a href="#" class="hover:text-caramel-300 transition">Help & Supports</a></li>
                </ul>
            </div>


            {{-- Company --}}
            <div>
                <h3 class="text-2xl font-semibold mb-6 text-caramel-400 ">Company</h3>

                <ul class="space-y-3 text-stone-200">
                    <li><a href="#" class="hover:text-caramel-300 transition">How We Work</a></li>
                    <li><a href="#" class="hover:text-caramel-300 transition">Terms of Service</a></li>
                    <li><a href="#" class="hover:text-caramel-300 transition">Pricing</a></li>
                    <li><a href="#" class="hover:text-caramel-300 transition">FAQ</a></li>
                </ul>
            </div>


            {{-- Contact --}}
            <div>
                <h3 class="text-2xl font-semibold mb-6 text-caramel-400">Contact Us</h3>

                <ul class="space-y-4 text-stone-200 leading-relaxed">
                    <li>Jl. Coffee Street No. 27, Jakarta Selatan</li>
                    <li>+62 812-3456-7890</li>
                    <li>support@bataskoffie.com</li>
                    <li>www.bataskoffie.com</li>
                </ul>
            </div>

        </div>

        {{-- Bottom Bar --}}
        <div class="relative border-t border-white/10 text-center py-5 text-stone-300 text-sm">
            © {{ date('Y') }} BATAS-KOFFIE. All rights reserved.
        </div>

    </footer>


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
