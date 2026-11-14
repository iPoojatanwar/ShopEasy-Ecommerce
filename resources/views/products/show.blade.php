<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $products->name }} | ShopEase</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('page-transition')
</head>
<body class="bg-slate-50 text-slate-700">
@include('products.index')
    <main class="max-w-7xl mx-auto px-4 sm:px-6 py-8 sm:py-12">
        <div class="mb-6 sm:mb-8">
            <a href="/products"
               class="text-indigo-600 hover:text-indigo-800 font-medium transition text-sm sm:text-base">
                ← Back to Products
            </a>
        </div>
        @if(session('success'))
            <div id="toast" class="mb-6 bg-green-100 border border-green-200 text-green-700 px-4 sm:px-5 py-3 sm:py-4 rounded-xl text-sm sm:text-base">
                {{ session('success') }}
            </div>
        @endif
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 sm:gap-10 items-start lg:items-center">
            <div class="bg-white rounded-2xl sm:rounded-3xl border border-slate-200 shadow-sm p-3 sm:p-6">
                <div class="bg-slate-100 rounded-xl sm:rounded-2xl overflow-hidden">
                    <img
                        src="{{ asset('images/' . $products->image) }}"
                        alt="{{ $products->name }}"
                         loading="lazy"
                        decoding="async"
                        class="w-full h-64 sm:h-80 md:h-96 lg:h-[500px] object-cover hover:scale-105 transition duration-500"
                    >
                </div>
            </div>
            <div class="bg-white rounded-2xl sm:rounded-3xl border border-slate-200 shadow-sm p-5 sm:p-8 lg:p-10">
                <span class="inline-block bg-indigo-50 text-indigo-700 text-xs sm:text-sm font-semibold px-3 sm:px-4 py-2 rounded-full">
                    Product Details
                </span>
                <h1 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 mt-4 sm:mt-5 break-words">
                    {{ $products->name }}
                </h1>
                <p class="text-slate-500 leading-6 sm:leading-7 mt-4 sm:mt-5 text-sm sm:text-base">
                    {{ $products->description }}
                </p>
                <div class="border-t border-slate-200 my-5 sm:my-7"></div>
                <div>
                    <p class="text-sm text-slate-400 font-medium">
                        Price
                    </p>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-indigo-600 mt-2">
                        ${{ number_format($products->price, 2) }}
                    </h2>
                </div>
                <div class="mt-5 sm:mt-6 flex items-center gap-3">
                    @if($products->stock > 0)
                        <span class="w-3 h-3 rounded-full bg-green-500 shrink-0"></span>
                        <p class="text-green-700 font-semibold text-sm sm:text-base">
                            In Stock ({{ $products->stock }} available)
                        </p>
                    @else
                        <span class="w-3 h-3 rounded-full bg-red-500 shrink-0"></span>

                        <p class="text-red-600 font-semibold text-sm sm:text-base">
                            Out of Stock
                        </p>

                    @endif
                </div>
                <div class="border-t border-slate-200 my-5 sm:my-7"></div>
                <form action="{{ route('cart.add', $products->id) }}" method="POST">
                    @csrf
                    <label class="block font-semibold text-slate-800 mb-3 text-sm sm:text-base">
                        Select Quantity
                    </label>
                    <input
                        type="number"
                        name="quantity"
                        min="1"
                        max="{{ $products->stock }}"
                        value="1"
                        required
                        @disabled($products->stock < 1)
                        class="w-full sm:w-32 border border-slate-300 rounded-xl px-4 py-3 outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 disabled:bg-slate-100"
                    >
                    @error('quantity')
                        <p class="text-red-600 text-sm mt-2">
                            {{ $message }}
                        </p>
                    @enderror
                    <button
                        type="submit"
                        @disabled($products->stock < 1)
                        class="w-full mt-5 sm:mt-6 bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3.5 sm:py-4 rounded-xl shadow-md hover:shadow-lg transition duration-300 disabled:opacity-50 disabled:cursor-not-allowed"
                    >
                        Add to Cart
                    </button>
                </form>
                <a
                    href="{{ route('cart.index') }}"
                    class="block text-center w-full mt-4 border-2 border-indigo-600 text-indigo-600 hover:bg-indigo-50 py-3 sm:py-3.5 rounded-xl font-bold transition text-sm sm:text-base"
                >
                    View Shopping Cart
                </a>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4 mt-6 sm:mt-8">
                    <div class="bg-slate-50 p-4 rounded-xl text-center">
                        <p class="text-sm font-semibold text-slate-700">
                            Secure Shopping
                        </p>
                        <p class="text-xs text-slate-400 mt-1">
                            Safe experience
                        </p>
                    </div>

                    <div class="bg-slate-50 p-4 rounded-xl text-center">
                        <p class="text-sm font-semibold text-slate-700">
                            Quality Products
                        </p>
                        <p class="text-xs text-slate-400 mt-1">
                            Shop with confidence
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('products.footer')
    <script>
        setTimeout(() => {
            const toast = document.getElementById('toast');

            if (toast) {
                toast.style.transition = 'opacity 0.5s ease';
                toast.style.opacity = '0';

                setTimeout(() => toast.remove(), 500);
            }
        }, 3000);
    </script>

</body>
</html>
