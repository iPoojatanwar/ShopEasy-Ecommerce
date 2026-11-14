<?php
namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('components.product', compact('products'));
    }

    public function home()
    {
        $products = Product::all();

        return view('home', compact('products'));
    }

    public function show(int $id)
    {
        $products = Product::findOrFail($id);

        return view('products.show', compact('products'));
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('query');

        $products = Product::where(
            'name',
            'ILIKE',
            "%{$searchTerm}%"
        )->get();

        return view('products.search', compact('products'));
    }
}
