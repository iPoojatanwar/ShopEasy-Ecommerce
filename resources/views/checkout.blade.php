
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout | ShopEase</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('page-transition')
</head>
<body class="bg-slate-50 text-slate-800">
<div class="min-h-screen">
    <header class="border-b border-slate-200 bg-white">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-5">
            <a href="/" class="text-2xl font-extrabold tracking-tight text-indigo-600">
                ShopEase<span class="text-slate-800">.</span>
            </a>
            <a href="{{ route('cart.index') }}"
               class="text-sm font-medium text-slate-600 transition hover:text-indigo-600">
                ← Back to Cart
            </a>
        </div>
    </header>
    <main class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
        <div class="mb-10">
            <p class="mb-2 text-sm font-semibold uppercase tracking-widest text-indigo-600">
                Secure Checkout
            </p>
            <h1 class="text-3xl font-bold text-slate-900 md:text-4xl">
                Complete Your Order
            </h1>
            <p class="mt-2 text-slate-500">
                Fill in your details and review your order before placing it.
            </p>
        </div>
        <form action="{{ route('checkout.store') }}" method="POST">
            @csrf
            @if ($errors->any())
                <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 text-red-700">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            <div class="grid grid-cols-1 items-start gap-8 lg:grid-cols-3">
                <div class="space-y-7 lg:col-span-2">
                    <section class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm md:p-8">
                        <div class="mb-6">
                            <h2 class="text-xl font-bold">Personal Information</h2>
                            <p class="text-sm text-slate-500">Your contact details</p>
                        </div>
                        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                            <div>
                                <label for="customer_name" class="mb-2 block text-sm font-semibold">Customer Name</label>
                                <input type="text" id="customer_name" name="customer_name"
                                    value="{{ old('customer_name') }}"
                                    placeholder="Your full name"
                                    required
                                    class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100">
                            </div>
                            <div>
                                <label for="email" class="mb-2 block text-sm font-semibold">Email Address</label>
                                <input type="email" id="email" name="email"
                                    value="{{ old('email') }}"
                                    placeholder="example@gmail.com"
                                    required
                                    class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100">
                            </div>
                            <div class="sm:col-span-2">
                                <label for="phone" class="mb-2 block text-sm font-semibold">Phone Number</label>
                                <input type="text" id="phone" name="phone"
                                    value="{{ old('phone') }}"
                                    placeholder="Phone number"
                                    required
                                    class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100">
                            </div>
                        </div>
                    </section>
                    <section class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm md:p-8">
                        <div class="mb-6">
                            <h2 class="text-xl font-bold">Billing Address</h2>
                            <p class="text-sm text-slate-500">Where should we deliver your order?</p>
                        </div>
                        <div class="space-y-5">
                            <div>
                                <label for="address" class="mb-2 block text-sm font-semibold">Street Address</label>
                                <input type="text" id="address" name="address"
                                    value="{{ old('address') }}"
                                    placeholder="House number, street name"
                                    required
                                    class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100">
                            </div>
                            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                                <div>
                                    <label for="city" class="mb-2 block text-sm font-semibold">City</label>
                                    <input type="text" id="city" name="city"
                                        value="{{ old('city') }}"
                                        placeholder="City"
                                        required
                                        class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100">
                                </div>
                                <div>
                                    <label for="state" class="mb-2 block text-sm font-semibold">State</label>
                                    <input type="text" id="state" name="state"
                                        value="{{ old('state') }}"
                                        placeholder="State"
                                        required
                                        class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100">
                                </div>
                                <div>
                                    <label for="pincode" class="mb-2 block text-sm font-semibold">Postal Code</label>
                                    <input type="text" id="pincode" name="pincode"
                                        value="{{ old('pincode') }}"
                                        placeholder="Postal code"
                                        required
                                        class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100">
                                </div>
                                <div>
                                    <label for="country" class="mb-2 block text-sm font-semibold">Country</label>
                                    <input type="text" id="country" name="country"
                                        value="{{ old('country') }}"
                                        placeholder="Country"
                                        required
                                        class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100">
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm md:p-8">
                        <div class="mb-6">
                            <h2 class="text-xl font-bold">Shipping Method</h2>
                            <p class="text-sm text-slate-500">Choose your delivery option</p>
                        </div>
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <label class="flex cursor-pointer items-center gap-3 rounded-xl border border-indigo-500 bg-indigo-50 p-5">
                                <input type="radio" name="shipping_method" value="free"
                                    {{ old('shipping_method', 'free') == 'free' ? 'checked' : '' }}
                                    class="h-4 w-4 accent-indigo-600">
                                <div>
                                    <p class="font-semibold">Free Shipping</p>
                                    <p class="text-sm text-slate-500">Standard delivery</p>
                                    <p class="mt-1 font-bold text-indigo-600">FREE</p>
                                </div>
                            </label>
                            <label class="flex cursor-pointer items-center gap-3 rounded-xl border border-slate-200 p-5 transition hover:border-indigo-400">
                                <input type="radio" name="shipping_method" value="express"
                                    {{ old('shipping_method') == 'express' ? 'checked' : '' }}
                                    class="h-4 w-4 accent-indigo-600">
                                <div>
                                    <p class="font-semibold">Express Shipping</p>
                                    <p class="text-sm text-slate-500">Faster delivery</p>
                                    <p class="mt-1 font-bold text-slate-700">Extra charges</p>
                                </div>
                            </label>
                        </div>
                    </section>
                    <section class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm md:p-8">
                        <div class="mb-6">
                            <h2 class="text-xl font-bold">Payment Method</h2>
                            <p class="text-sm text-slate-500">Select your preferred payment option</p>
                        </div>
                        <div class="space-y-4">
                            <label class="flex cursor-pointer items-center gap-3 rounded-xl border border-slate-200 p-4 transition hover:border-indigo-400">
                                <input type="radio" name="payment_method" value="paypal"
                                    {{ old('payment_method') == 'paypal' ? 'checked' : '' }}
                                    class="h-4 w-4 accent-indigo-600">
                                <span class="font-semibold">PayPal</span>
                            </label>
                            <label class="flex cursor-pointer items-center gap-3 rounded-xl border border-slate-200 p-4 transition hover:border-indigo-400">
                                <input type="radio" name="payment_method" value="card"
                                    {{ old('payment_method') == 'card' ? 'checked' : '' }}
                                    class="h-4 w-4 accent-indigo-600">
                                <span class="font-semibold">Credit / Debit Card</span>
                            </label>
                            <label class="flex cursor-pointer items-center gap-3 rounded-xl border border-indigo-500 bg-indigo-50 p-4">
                                <input type="radio" name="payment_method" value="cod"
                                    {{ old('payment_method', 'cod') == 'cod' ? 'checked' : '' }}
                                    class="h-4 w-4 accent-indigo-600">
                                <span class="font-semibold">Cash on Delivery</span>
                            </label>
                        </div>
                    </section>
                    <div class="rounded-xl border border-slate-200 bg-white p-5 text-sm text-slate-600">
                        <label class="flex items-start gap-3">
                            <input type="checkbox" name="terms" value="1" required
                                class="mt-1 h-4 w-4 accent-indigo-600">
                            <span>
                                I agree to the
                                <a href="#" class="font-semibold text-indigo-600 hover:underline">Terms and Conditions</a>
                                and Privacy Policy.
                            </span>
                        </label>
                    </div>
                </div>
                <aside class="lg:sticky lg:top-8">
                    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                        <h2 class="text-xl font-bold text-slate-900">Order Summary</h2>
                        <p class="mt-1 text-sm text-slate-500">
                            Review your selected products
                        </p>
                        <div class="my-6 space-y-5">
                            @foreach($items as $item)

                                <div class="flex gap-4">

                                    <div class="h-20 w-20 shrink-0 overflow-hidden rounded-xl bg-slate-100">
                                        <img
                                            src="{{ asset('images/' . $item['product']->image) }}"
                                            alt="{{ $item['product']->name }}"
                                             loading="lazy"
                                             decoding="async"
                                            class="h-full w-full object-cover">
                                    </div>

                                    <div class="min-w-0 flex-1">
                                        <h3 class="font-semibold text-slate-800">
                                            {{ $item['product']->name }}
                                        </h3>

                                        <p class="mt-1 text-sm text-slate-500">
                                            Quantity: {{ $item['quantity'] }}
                                        </p>

                                        <p class="mt-2 font-bold text-indigo-600">
                                            ${{ number_format($item['subtotal'], 2) }}
                                        </p>
                                    </div>

                                </div>

                            @endforeach

                        </div>

                        <div class="space-y-4 border-t border-slate-200 pt-5">

                            <div class="flex justify-between text-sm text-slate-600">
                                <span>Subtotal</span>
                                <span class="font-semibold text-slate-800">
                                    ${{ number_format($total, 2) }}
                                </span>
                            </div>

                            <div class="flex justify-between text-sm text-slate-600">
                                <span>Shipping</span>
                                <span class="font-semibold text-green-600">FREE</span>
                            </div>

                            <div class="flex justify-between text-sm text-slate-600">
                                <span>Tax</span>
                                <span class="font-semibold text-slate-800">
                                    Calculated at checkout
                                </span>
                            </div>

                        </div>

                        <div class="mt-6 flex items-center justify-between border-t border-slate-200 pt-5">

                            <span class="text-lg font-bold text-slate-900">Total</span>

                            <span class="text-2xl font-extrabold text-indigo-600">
                                ${{ number_format($total, 2) }}
                            </span>

                        </div>

                        <button type="submit"
                            class="mt-7 w-full rounded-xl bg-indigo-600 px-5 py-4 font-bold text-white shadow-lg shadow-indigo-200 transition hover:-translate-y-0.5 hover:bg-indigo-700">
                            Place Order →
                        </button>

                        <div class="mt-5 flex items-center justify-center gap-2 text-xs text-slate-500">
                            <span>🔒</span>
                            Secure checkout
                        </div>

                    </div>

                </aside>

            </div>

        </form>

    </main>
@include('products.footer')
</div>
</body>
</html>
