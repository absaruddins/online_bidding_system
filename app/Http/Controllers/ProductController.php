<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.admin_dashboard');
    }
    public function create()
    {
        return view('admin.admin_add_products');
    }
    // public function store(Request $request)
    // {
    //     $product = new Product;
    //     if ($request->hasfile('image')) {

    //         $file       = $request->file('image');
    //         $extenstion = $file->getClientOriginalExtension();
    //         $filename   = time() . '.' . $extenstion;
    //         $file->move(public_path('uploads/products'), $filename);

    //         $product->image = $filename;

    //     }
    //     $product->name        = $request->input('name');
    //     $product->price       = $request->input('price');
    //     $product->description = $request->input('description');
    //     $product->save();
    //     return redirect()->back()->with('status', 'Product Added Succesfully');
    // }
    public function store(Request $request)
    {
        $product = new Product;

        if ($request->hasFile('image')) {
            $file      = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename  = time() . '.' . $extension;
            $file->move(public_path('uploads/products'), $filename);
            $product->image = $filename;
        }

        $product->name        = $request->input('name');
        $product->price       = $request->input('price');
        $product->description = $request->input('description');

        $product->save();

        return redirect()->back()->with('status', 'Product Added Successfully');
    }

    public function userProducts()
    {

        $products = Product::paginate(9);
        return view('user_bidding_product', compact('products'));
    }
}
