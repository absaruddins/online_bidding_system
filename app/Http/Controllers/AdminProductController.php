<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // সব প্রোডাক্ট show করবে
    public function index()
    {
        $products = Product::all();
        return view('admin_add_products', compact('products'));
    }

    // নতুন প্রোডাক্ট save করবে
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string',
            'starting_price'       => 'required|numeric',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        Product::create([
            'name'        => $request->name,
            'starting_price'       => $request->price,
            'description' => $request->description,
            'image'       => $imagePath,
        ]);

        return redirect()->route('admin.products')->with('success', 'Product added successfully!');
    }
}
