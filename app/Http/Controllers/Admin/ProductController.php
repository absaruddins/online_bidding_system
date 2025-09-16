<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        // Validate
        $request->validate([
            'name'           => 'required',
            'starting_price' => 'required|numeric',
            'description'    => 'nullable',
            'image'          => 'nullable|image',
        ]);

        // Save product
        $product                 = new Product();
        $product->name           = $request->name;
        $product->starting_price = $request->starting_price;
        $product->description    = $request->description;

        if ($request->hasFile('image')) {
            $path           = $request->file('image')->store('products', 'public');
            $product->image = $path;
        }

        $product->save();

        return redirect()->back()->with('success', 'Product added successfully!');
    }
}
