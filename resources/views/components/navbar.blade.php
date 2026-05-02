    {{-- Navbar --}}
    <header id="navbar" class="fixed top-0 left-0 w-full z-50 transition-all duration-300">

        <div class="max-w-7xl mx-auto px-6 py-5">

            <nav id="navbar-container"
                class="flex items-center justify-between px-8 py-4 rounded-2xl transition-all duration-300">

                {{-- Logo --}}
                <a href="/" class="text-4xl font-bold text-white tracking-wide">
                    BATAS-KOFFIE
                </a>

                {{-- Menu --}}
                <ul class="hidden md:flex items-center gap-10 text-white font-medium text-lg">

                    <li>
                        <a href="#" class="hover:text-caramel-800 transition duration-300">
                            Home
                        </a>
                    </li>

                    <li>
                        <a href="#" class="hover:text-caramel-800 transition duration-300">
                            Menu
                        </a>
                    </li>

                    <li>
                        <a href="/reservation" class="hover:text-caramel-800 transition duration-300">
                            Reservation
                        </a>
                    </li>

                    <li>
                        <a href="#" class="hover:text-caramel-800 transition duration-300">
                            About
                        </a>
                    </li>

                </ul>

                {{-- Right Side --}}
                <div class="flex items-center gap-4">

                    {{-- Login --}}
                    <a href=""
                        class="bg-caramel-500 p-3 rounded-lg font-semibold text-caramel-900 hover:bg-caramel-400 active:bg-caramel-300 transition ease-in-out duration-200">Login</a>

                    {{-- CTA --}}
                    <a href=""
                        class="bg-caramel-500 p-3 rounded-lg font-semibold text-caramel-900 hover:bg-caramel-400 active:bg-caramel-300 transition ease-in-out duration-200">Daftar</a>

                </div>

            </nav>
        </div>
    </header>


    <script>
        // Navbar Scroll Effect
        const navbarContainer = document.getElementById('navbar-container');

        window.addEventListener('scroll', () => {

            if (window.scrollY > 50) {

                navbarContainer.classList.add(
                    'bg-caramel-500',
                    'backdrop-blur-xl',
                    'shadow-2xl',
                    'border-white/10'
                );

            } else {

                navbarContainer.classList.remove(
                    'bg-caramel-500',
                    'backdrop-blur-xl',
                    'shadow-2xl',
                    'border-white/10'
                );

            }
        });
    </script>
