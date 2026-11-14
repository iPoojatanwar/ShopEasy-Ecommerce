<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart | ShopEase</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('page-transition')
</head>
<body class="bg-slate-50">
<main class="min-h-screen px-4 py-12 sm:px-8">
    <div class="max-w-6xl mx-auto">
        <div class="mb-10">
            <p class="text-sm text-indigo-600 font-semibold uppercase tracking-wider">
                Your Shopping Bag
            </p>
            <h1 class="text-3xl font-bold text-slate-900 mt-2">
                Shopping Cart
            </h1>
            <p class="text-slate-500 mt-2">
                Review your items before checkout.
            </p>
        </div>
        @if(session('success'))
            <div id="toast" class="mb-6 rounded-xl bg-green-100 border border-green-200 px-5 py-4 text-green-700">
                {{ session('success') }}
            </div>
        @endif
        @if($items->isEmpty())
            <div class="min-h-[60vh] flex items-center justify-center">
                <div class="bg-white shadow-lg border border-slate-200 py-14 px-8 sm:px-16 rounded-2xl text-center">
                    <div class="text-5xl mb-5">🛒</div>
                    <h2 class="text-2xl font-bold text-slate-800">
                        Your cart is empty
                    </h2>
                    <p class="text-slate-500 mt-3">
                        Looks like you haven't added anything yet.
                    </p>
                    <a href="/products"
                       class="mt-7 inline-block bg-indigo-600 text-white hover:bg-indigo-700 px-7 py-3 rounded-xl font-semibold transition">
                        Explore Products
                    </a>
                </div>
            </div>
        @else
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2">
                    @foreach($items as $item)
                        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-5 mb-5">
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-5">
                                <div class="flex items-center gap-5">
                                    <img
                                        src="{{ asset('images/' . $item['product']->image) }}"
                                        alt="{{ $item['product']->name }}"
                                         loading="lazy"
                                        decoding="async"
                                        class="w-24 h-24 object-cover rounded-xl bg-slate-100"
                                    >
                                    <div>
                                        <h2 class="font-semibold text-lg text-slate-800">
                                            {{ $item['product']->name }}
                                        </h2>
                                        <p class="text-indigo-600 font-semibold mt-2">
                                            ${{ number_format($item['product']->price, 2) }}
                                        </p>
                                        <p class="text-sm text-slate-500 mt-1">
                                            Subtotal: ${{ number_format($item['subtotal'], 2) }}
                                        </p>
                                        <p class="text-xs text-slate-400 mt-1">
                                            Available stock: {{ $item['product']->stock }}
                                        </p>
                                    </div>
                                </div>
                                <div class="flex flex-wrap items-center gap-3">
                                    <form action="{{ route('cart.update', $item['product']->id) }}" method="POST" class="flex items-center gap-2">
                                        @csrf
                                        @method('PATCH')
                                        <input
                                            type="number"
                                            name="quantity"
                                            value="{{ $item['quantity'] }}"
                                            min="1"
                                            max="{{ $item['product']->stock }}"
                                            required
                                            class="w-20 border border-slate-300 rounded-xl px-3 py-2 outline-none focus:ring-2 focus:ring-indigo-500"
                                        >
                                        <button
                                            type="submit"
                                            class="px-4 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-medium transition">
                                            Update
                                        </button>
                                    </form>
                                    <form action="{{ route('cart.remove', $item['product']->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            type="submit"
                                            class="px-4 py-2.5 bg-red-50 hover:bg-red-100 text-red-600 rounded-xl font-medium transition">
                                            Remove
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <a href="/products"
                       class="inline-block text-indigo-600 font-semibold hover:text-indigo-800 transition mt-2">
                        ← Continue Shopping
                    </a>
                </div>
                <div class="lg:col-span-1">
                    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-6 sticky top-8">
                        <h2 class="text-xl font-bold text-slate-800 mb-6">
                            Order Summary
                        </h2>
                        <div class="flex justify-between text-slate-500 mb-4">
                            <span>Items</span>
                            <span>{{ $items->sum('quantity') }}</span>
                        </div>
                        <div class="flex justify-between text-slate-500 mb-4">
                            <span>Subtotal</span>
                            <span>${{ number_format($total, 2) }}</span>
                        </div>
                        <div class="border-t border-slate-200 pt-5 mt-5">
                            <div class="flex justify-between items-center">
                                <h3 class="text-lg font-bold text-slate-800">
                                    Total Amount
                                </h3>
                                <p class="text-2xl font-bold text-indigo-600">
                                    ${{ number_format($total, 2) }}
                                </p>
                            </div>
                        </div>
                        <button
                            type="button"
                            class="w-full mt-7 bg-indigo-600 hover:bg-indigo-700 text-white py-3 rounded-xl font-semibold transition">
                           <a href="/checkout"> Proceed to Checkout</a>
                        </button>
                        <p class="text-xs text-center text-slate-400 mt-4">
                            Secure checkout experience
                        </p>
                    </div>
                </div>
            </div>
        @endif
    </div>
@include('products.footer')
</main>
</body>
</html>
