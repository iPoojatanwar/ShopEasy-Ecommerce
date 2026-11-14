
<nav class="sticky top-0 z-50 w-full border-b border-gray-200 bg-white/95 shadow-sm backdrop-blur-md">
    <div class="mx-auto grid max-w-7xl grid-cols-3 items-center px-5 py-4">
        <a href="{{ route('home') }}"
           class="justify-self-start text-2xl sm:text-3xl font-extrabold tracking-tight text-blue-600">
            Shop<span class="text-gray-900">Easy</span>
        </a>
        <div class="hidden lg:flex items-center justify-center gap-8">
            <a href="{{ route('home') }}"
               class="flex items-center gap-2 text-sm font-semibold text-blue-600 transition hover:text-blue-700">
                Home
            </a>
            <a href="{{ route('products.index') }}"
               class="flex items-center gap-2 text-sm font-medium text-gray-600 transition hover:text-blue-600">
                Shop
            </a>
            <a href="{{ route('cart.index') }}"
               class="flex items-center gap-2 text-sm font-medium text-gray-600 transition hover:text-blue-600">
                Cart
                <span class="rounded-full bg-blue-600 px-2 py-0.5 text-xs font-bold text-white">
                    {{ collect(session('cart', []))->sum() }}
                </span>
            </a>
        </div>
        <div class="justify-self-end lg:hidden">
            <button id="menuBtn"
                    type="button"
                    class="rounded-lg p-2 text-gray-700 transition hover:bg-gray-100"
                    aria-label="Toggle navigation"
                    aria-expanded="false"
                    aria-controls="mobileMenu">

                <svg id="menuIcon" xmlns="http://www.w3.org/2000/svg"
                     width="27" height="27" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="2"
                     stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 6h16M4 12h16M4 18h16"/>
                </svg>

                <svg id="closeIcon" class="hidden"
                     xmlns="http://www.w3.org/2000/svg"
                     width="27" height="27" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="2"
                     stroke-linecap="round" stroke-linejoin="round">
                    <path d="m18 6-12 12M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>
    <div id="mobileMenu" class="hidden border-t border-gray-100 bg-white px-5 py-4 lg:hidden">
        <div class="flex flex-col gap-2">
            <a href="{{ route('home') }}"
               class="rounded-lg bg-blue-50 px-4 py-3 text-sm font-semibold text-blue-600 hover:bg-blue-100">
                Home
            </a>
            <a href="{{ route('products.index') }}"
               class="rounded-lg px-4 py-3 text-sm font-medium text-gray-600 hover:bg-blue-50 hover:text-blue-600">
                Shop
            </a>
            <a href="{{ route('cart.index') }}"
               class="flex items-center justify-between rounded-lg px-4 py-3 text-sm font-medium text-gray-600 hover:bg-blue-50 hover:text-blue-600">
                Cart
                <span class="rounded-full bg-blue-600 px-2 py-0.5 text-xs font-bold text-white">
                    {{ collect(session('cart', []))->sum() }}
                </span>
            </a>
        </div>
    </div>
</nav>
<script>
    const menuBtn = document.getElementById('menuBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    const menuIcon = document.getElementById('menuIcon');
    const closeIcon = document.getElementById('closeIcon');
    menuBtn.addEventListener('click', function () {
        mobileMenu.classList.toggle('hidden');
        menuIcon.classList.toggle('hidden');
        closeIcon.classList.toggle('hidden');
        const isOpen = !mobileMenu.classList.contains('hidden');
        menuBtn.setAttribute('aria-expanded', isOpen);
    });
</script>
