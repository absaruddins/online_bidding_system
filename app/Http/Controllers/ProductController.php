<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->role == "admin") {

            return view('admin.admin_dashboard');
        }
        abort(404);
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
    public function search(Request $request)
    {
        $query = $request->input('query');

        $products = Product::where('name', 'LIKE', "%{$query}%")
            ->paginate(9);

        return view('user_bidding_product', compact('products', 'query'));
    }
    public function productsList()
    {
        $products = Product::all();
        return view('admin.admin_products_list', compact('products'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.admin_edit_product', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

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

        return redirect()->route('admin.products.list')->with('status', 'Product Updated Successfully');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products.list')->with('status', 'Product Deleted Successfully');
    }
// ... Existing product functions ...

    // 🔹 Show registered users list in admin panel
    public function registerList()
    {
        // Check if admin
        if (Auth::check() && Auth::user()->role == "admin") {

            $users = User::all(); // sob users fetch korlam

            // Admin view e pathalam
            return view('admin.registerlist', compact('users'));
        }
        abort(404);
    }
}
