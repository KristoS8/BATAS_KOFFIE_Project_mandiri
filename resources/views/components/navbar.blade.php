{{-- Navbar --}}
@props(['navbarSolid' => false])

<header id="navbar" class="fixed top-0 left-0 w-full z-50 transition-all duration-300">
    <div class="w-full mx-auto">
        <nav id="navbar-container"
            class="flex items-center justify-between px-16 py-4 transition-all duration-300 {{ $navbarSolid ? 'bg-caramel-500 backdrop-blur-xl shadow-lg' : '' }}">

            {{-- Logo --}}
            <a href="/" class="text-4xl font-bold text-white tracking-wide">
                BATAS-KOFFIE
            </a>

            {{-- Menu dengan Active State Logic --}}
            <ul class="hidden md:flex items-center gap-10 font-medium text-lg">

                {{-- Menu: Home --}}
                <li>
                    <a href="/" @class([
                        'pb-1 transition duration-300',
                        'text-white font-semibold border-b-2 border-white' =>
                            request()->is('/') || request()->routeIs('home'),
                        'text-white/70 hover:text-white' => !(
                            request()->is('/') || request()->routeIs('home')
                        ),
                    ])>
                        Home
                    </a>
                </li>

                {{-- Menu: Menu --}}
                <li>
                    <a href="/menu" @class([
                        'pb-1 transition duration-300',
                        'text-white font-semibold border-b-2 border-white' =>
                            request()->is('menu*') || request()->routeIs('menu.*'),
                        'text-white/70 hover:text-white' => !(
                            request()->is('menu*') || request()->routeIs('menu.*')
                        ),
                    ])>
                        Menu
                    </a>
                </li>

                {{-- Menu: Reservation Saya --}}
                <li>
                    <a href="{{ route('myReservation') }}" @class([
                        'pb-1 transition duration-300',
                        'text-white font-semibold border-b-2 border-white' => request()->routeIs(
                            'myReservation'),
                        'text-white/70 hover:text-white' => !request()->routeIs('myReservation'),
                    ])>
                        Reservation Saya
                    </a>
                </li>

                {{-- Menu: About --}}
                <li>
                    <a href="/about" @class([
                        'pb-1 transition duration-300',
                        'text-white font-semibold border-b-2 border-white' =>
                            request()->is('about') || request()->routeIs('about'),
                        'text-white/70 hover:text-white' => !(
                            request()->is('about') || request()->routeIs('about')
                        ),
                    ])>
                        About Us
                    </a>
                </li>

            </ul>

            {{-- Right Side (Login & Daftar) --}}
            <div class="flex items-center gap-4">
                {{-- Login --}}
                <a href="" id="login_nav"
                    class="bg-caramel-500 p-3 rounded-lg font-semibold text-caramel-900 hover:bg-caramel-400 active:bg-caramel-300 transition ease-in-out duration-200">Login</a>

                {{-- CTA --}}
                <a href="" id="sign_nav"
                    class="bg-caramel-500 p-3 rounded-lg font-semibold text-caramel-900 hover:bg-caramel-400 active:bg-caramel-300 transition ease-in-out duration-200">Daftar</a>
            </div>

        </nav>
    </div>
</header>

<script>
    // Navbar Scroll Effect (Tetap mempertahankan logika bawaan Anda)
    const navbarContainer = document.getElementById('navbar-container');
    const login_nav = document.getElementById('login_nav');
    const sign_nav = document.getElementById('sign_nav');
    let isSolid = @json($navbarSolid);

    if (!isSolid) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbarContainer.classList.add(
                    'bg-caramel-500',
                    'backdrop-blur-xl',
                    'shadow-xl',
                    'border-white-100'
                );

                login_nav.classList.add(
                    'border-2',
                    'border-solid',
                    'border-gray-100',
                );
                sign_nav.classList.add(
                    'border-2',
                    'border-solid',
                    'border-gray-100',
                );
            } else {
                navbarContainer.classList.remove(
                    'bg-caramel-500',
                    'backdrop-blur-xl',
                    'shadow-xl',
                    'border-white-100'
                );

                login_nav.classList.remove(
                    'border-2',
                    'border-solid',
                    'border-gray-100',
                );
                sign_nav.classList.remove(
                    'border-2',
                    'border-solid',
                    'border-gray-100',
                );
            }
        });
    }
</script>
