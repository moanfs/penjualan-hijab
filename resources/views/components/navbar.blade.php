<header class="bg-white d-flex sticky top-0 w-full shadow-sm">
    <div class="bg-[#e0e0e0]">
        <ul class="flex justify-end gap-[3rem] text-[0.5rem] md:text-[1rem] mx-5 text-gray-500">
            <li><a href="#">Tentang Kami</a></li>
            <li><a href="#">Pusat Bantuan</a></li>
            <li><a href="#">twitter</a></li>
        </ul>
    </div>
    <nav class="flex justify-between items-center w-[80%] mx-auto mt-4">
        <div class="logo">
            <a href="/" class="name">Toko Hijab</a>
        </div>
        <div class="search w-[50%]">
            <form>
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" id="default-search" class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-200 focus:border-blue-200 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari Di Hujab Mutiara" required>
                </div>
            </form>
        </div>

        @if (Route::has('login'))
        @auth
        <div class="profile relative" x-data="{dropdownOpen:false}">
            <div class="flex items-center gap-5">
                <button @click="dropdownOpen = !dropdownOpen">
                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}">
                </button>
                <!-- <i onclick="onToggleMenu(this)" name"menu" class="fa-solid fa-bars text-2xl cursor-pointer"></i> -->
            </div>
            <div class="lg:absolute shadow-md bg-white rounded-md p-2 right-0" :class="{'hidden': !dropdownOpen, 'flex flex-col' :dropdownOpen}">
                <ul class="space-y-2 lg:w-40">
                    <li>
                        <x-dropdown-link href="{{ route('profile.show') }}">
                            <i class="fa-regular fa-user mr-3"></i> {{ __('Profile') }}
                        </x-dropdown-link>
                    </li>
                    <div class="border-t border-gray-200"></div>
                    <li>
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                <i class="fa-solid fa-arrow-right-from-bracket mr-3"></i>{{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        @else
        <div class="auth flex items-center gap-5">
            <a class="" href="{{ route('login') }}">Masuk</a>
            <a class="" href="{{ route('register') }}">Daftar</a>
            <ion-icon name="menu" onclick="ontoggle(this)"></ion-icon>
        </div>
        @endauth
        @endif

    </nav>
    <div class="flex justify-center items-center w-[80%] mx-auto">
        <div class="menu md:static md:min-h-fit absolute bg-white min-h-[60vh] left-0 top-[-100%] md:w-auto w-full flex items-center py-2 px-5">
            <ul class="flex md:flex-row flex-col md:items-center md:gap-[3rem] gap-8">
                <li>
                    <a class="hover:text-black text-gray-600" href="#">Terbaru</a>
                </li>
                <li>
                    <a class="hover:text-black text-gray-600" href="#">Hijab</a>
                </li>
                <li>
                    <a class="hover:text-black text-gray-600" href="#">Asesoris</a>
                </li>
                <li>
                    <a class="hover:text-black text-gray-600" href="#">Brands</a>
                </li>
            </ul>
        </div>
    </div>
</header>