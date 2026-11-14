<?php
namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        $products = Product::whereIn('id', array_keys($cart))->get();

        $items = $products->map(function ($product) use ($cart) {
            return [
                'product' => $product,
                'quantity' => $cart[$product->id],
                'subtotal' => $product->price * $cart[$product->id],
            ];
        });

        $total = $items->sum('subtotal');

        return view('cart', compact('items', 'total'));
    }

    public function add(Request $request, int $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'quantity' => ['required', 'integer', 'min:1'],
        ]);

        $quantity = (int) $validated['quantity'];

        if ($product->stock < 1) {
            return back()->withErrors([
                'quantity' => 'The product is out of stock.',
            ]);
        }

        $cart = session()->get('cart', []);

        $newQuantity = ($cart[$id] ?? 0) + $quantity;

        if ($newQuantity > $product->stock) {
            return back()->withErrors([
                'quantity' => 'Requested quantity exceeds available stock.',
            ]);
        }

        $cart[$id] = $newQuantity;

        session()->put('cart', $cart);

        return back()->with('success', 'Product added to cart successfully.');
    }
   
public function update(Request $request, int $id)
{
    $product = Product::findOrFail($id);

    $validated = $request->validate([
        'quantity' => ['required', 'integer', 'min:1'],
    ]);

    $quantity = (int) $validated['quantity'];

    if ($quantity > $product->stock) {
        return back()->withErrors([
            'quantity' => 'Requested quantity exceeds available stock.',
        ]);
    }

    $cart = session()->get('cart', []);

    if (!array_key_exists($id, $cart)) {
        return redirect()->route('cart.index');
    }
    $cart[$id] = $quantity;
    session()->put('cart', $cart);
    return redirect()->route('cart.index')
        ->with('success', 'Cart quantity updated.');
}
    public function remove(int $id){
      $cart=session()->get('cart',[]);
      unset($cart[$id]);
      session()->put('cart',$cart);
      return redirect()->route('cart.index')->with('success','Product remove from cart.');
    }
}
 
