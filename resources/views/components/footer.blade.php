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
