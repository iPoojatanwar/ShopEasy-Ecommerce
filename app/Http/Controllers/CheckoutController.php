<?php
namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        $products = Product::whereIn('id', array_keys($cart))->get();

        $items = $products->map(function ($product) use ($cart) {
            return [
                'product' => $product,
                'quantity' => $cart[$product->id],
                'subtotal' => $product->price * $cart[$product->id]
            ];
        });

        $total = $items->sum('subtotal');

        return view('checkout', compact('items', 'total'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|digits:10',
            'address' => 'required|string|max:500',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'pincode' => 'required|digits:6',
            'country' => 'required|in:India',
            'shipping_method' => 'required|string|in:free,express',
            'payment_method' => 'required|string|in:paypal,card,cod'
        ]);

        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index');
        }

        $products = Product::whereIn('id', array_keys($cart))->get();

        if ($products->count() !== count($cart)) {
            return back()->withErrors([
                'cart' => 'Some product are unavailable.'
            ]);
        }

        DB::transaction(function () use ($products, $cart, $validated) {

            $total = 0;

            foreach ($products as $product) {
                $total += $product->price * $cart[$product->id];
            }

            $order = Order::create([
                'customer_name' => $validated['customer_name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'address' => $validated['address'],
                'city' => $validated['city'],
                'state' => $validated['state'],
                'pincode' => $validated['pincode'],
                'country' => $validated['country'],
                'shipping_method' => $validated['shipping_method'],
                'payment_method' => $validated['payment_method'],
                'total_amount' => $total,
                'status' => 'pending'
            ]);

            foreach ($products as $product) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'quantity' => $cart[$product->id],
                    'price' => $product->price,
                    'subtotal' => $product->price * $cart[$product->id]
                ]);
            }
        });

        session()->forget('cart');

        return redirect()->route('cart.index')
            ->with('success', 'Your order placed successfully!');      
    }
}
