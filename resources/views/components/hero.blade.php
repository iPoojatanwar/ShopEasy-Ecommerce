<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('page-transition')
    <title>ShopEase | Home</title>
</head>
<body class="bg-orange-50">
<section class="min-h-screen grid grid-cols-1 lg:grid-cols-2 items-center gap-10 px-6 md:px-16 py-16 overflow-hidden">
    <div class="space-y-6 text-center lg:text-left">
        <span class="inline-block bg-orange-100 text-orange-700 px-5 py-2 rounded-full text-sm font-semibold">
            ✨ Discover Your Style
        </span>
        <h1 class="text-5xl md:text-7xl font-extrabold text-slate-900 leading-tight">
            Shop Smart.
            <span class="text-orange-600">Look Better.</span>
        </h1>
        <p class="text-slate-600 text-lg max-w-lg mx-auto lg:mx-0 leading-relaxed">
            Explore the latest fashion, beauty and lifestyle collections.
            Find everything you love in one place with ShopEase.
        </p>
        <div class="flex flex-wrap gap-4 justify-center lg:justify-start">
            <a href="/products"
               class="bg-orange-600 hover:bg-orange-700 text-white px-8 py-4 rounded-xl font-bold shadow-lg transition">
                Shop Now →
            </a>
            <a href="/product"
               class="border-2 border-slate-300 hover:border-orange-600 text-slate-800 px-8 py-4 rounded-xl font-bold transition">
                Explore Collection
            </a>
        </div>
        <div class="flex gap-8 justify-center lg:justify-start pt-6">
            <div>
                <h3 class="text-2xl font-bold text-slate-900">100+</h3>
                <p class="text-sm text-slate-500">Products</p>
            </div>
            <div>
                <h3 class="text-2xl font-bold text-slate-900">24/7</h3>
                <p class="text-sm text-slate-500">Support</p>
            </div>
            <div>
                <h3 class="text-2xl font-bold text-slate-900">100%</h3>
                <p class="text-sm text-slate-500">Quality</p>
            </div>
        </div>
    </div>
    <div class="relative w-full max-w-xl mx-auto h-[500px] md:h-[600px]">
        <div class="absolute w-80 h-80 bg-orange-200 rounded-full blur-3xl opacity-70 top-20 left-20"></div>
        <img src="{{ asset('images/model.jpg') }}"
             alt="Fashion Model"
               fetchpriority="high"
              decoding="async"
             class="absolute z-20 top-0 left-0 w-[65%] h-[380px] md:h-[450px] object-cover rounded-3xl shadow-2xl border-4 border-white">
        <img src="{{ asset('images/makeup.jpg') }}"
             alt="Makeup Collection"
             class="absolute z-30 top-24 right-0 w-[48%] h-64 md:h-72 object-cover rounded-3xl shadow-2xl border-4 border-white">
        <img src="{{ asset('images/shopping-bag.jpg') }}"
             alt="Shopping Bag"
             class="absolute z-40 bottom-0 left-[20%] w-[45%] h-52 md:h-60 object-cover rounded-3xl shadow-2xl border-4 border-white">
        <div class="absolute z-50 bottom-8 right-0 bg-white px-5 py-4 rounded-2xl shadow-xl">
            <p class="text-xs text-slate-500">Your Style Destination</p>
            <h3 class="font-bold text-orange-600 text-lg">ShopEase ✨</h3>
        </div>
    </div>
</section>
</body>
</html>
