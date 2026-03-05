<header class="bg-white shadow-sm h-16 flex items-center justify-between px-6 z-10">
    <div class="flex items-center">
        <!-- Mobile menu button -->
        <button class="md:hidden p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
            <span class="sr-only">Open sidebar</span>
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        <h1 class="text-2xl font-semibold text-gray-900 hidden sm:block">
            @yield('header', 'Dashboard')
        </h1>
    </div>

    <div class="flex items-center">
        <!-- Profile dropdown placeholder -->
        <div class="ml-3 relative">
            <div>
                <button class="max-w-xs bg-white flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" id="user-menu" aria-haspopup="true">
                    <span class="sr-only">Open user menu</span>
                    <div class="h-8 w-8 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700 font-bold">
                        U
                    </div>
                </button>
            </div>
        </div>
    </div>
</header>