
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('page-transition')
    <title>ShopEasy | Explore Products</title>
</head>
<body class="bg-gray-50 text-gray-800">
    @include('products.index')
    <section class="w-full px-4 py-12 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <div class="mb-10 text-center">
                <p class="mb-2 text-sm font-semibold uppercase tracking-widest text-blue-600">
                    Our Collection
                </p>
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    Explore Our Products
                </h2>
                <p class="mx-auto mt-3 max-w-2xl text-gray-500">
                    Discover quality products at amazing prices.
                    Find everything you need in one place.
                </p>
                <div class="mx-auto mt-4 h-1 w-20 rounded-full bg-blue-600"></div>
                <a
                    href="{{ route('home') }}"
                    class="mt-6 inline-block text-sm font-semibold text-blue-600 transition hover:text-blue-800"
                >
                    ← Back to Home
                </a>
            </div>
            <div class="grid grid-cols-1 gap-7 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @forelse($products as $product)
                    <div class="group overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-sm transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
                        <div class="h-64 w-full overflow-hidden bg-gray-100">
                            <img
                                src="{{ asset('images/' . $product->image) }}"
                                alt="{{ $product->name }}"
                                loading="lazy"
                                decoding="async"
                                class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                        >
                        </div>
                        <div class="p-5">
                            <h3 class="text-lg font-bold text-gray-900 transition-colors duration-300 group-hover:text-blue-600">
                                {{ $product->name }}
                            </h3>
                            <p class="mt-2 line-clamp-2 min-h-12 text-sm leading-6 text-gray-500">
                                {{ $product->about }}
                            </p>
                            <div class="mt-4 flex items-center justify-between">
                                <p class="text-xl font-extrabold text-blue-600">
                                    ${{ number_format($product->price, 2) }}
                                </p>
                                @if($product->stock > 0)
                                    <span class="rounded-full bg-green-50 px-3 py-1 text-xs font-semibold text-green-600">
                                        In Stock
                                </span>
                                @else
                                    <span class="rounded-full bg-red-50 px-3 py-1 text-xs font-semibold text-red-600">
                                        Out of Stock
                                    </span>
                                @endif
                            </div>
                            <div class="mt-5">
                                <a
                                    href="{{ route('products.show', $product->id) }}"
                                    class="block w-full rounded-lg bg-blue-600 px-4 py-3 text-center font-semibold text-white transition-all duration-300 hover:bg-blue-700 hover:shadow-lg"
                                >
                                    View Product
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-12 text-center">
                        <h3 class="text-xl font-bold text-gray-700">
                            No Products Available
                        </h3>
                        <p class="mt-2 text-gray-500">
                            Please check back later for new products.
                        </p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    @include('products.footer')
</body>
</html>
