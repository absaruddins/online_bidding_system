<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // product list dekhar jonno
    public function index()
    {
        $products = Product::all();
        return view('admin.admin_products_list', compact('products'));
    }

    // search function (name, id, user email, user id diye search)
    public function adminsearch(Request $request)
    {
        $query = $request->input('query');

        $users    = collect();
        $products = collect();

        if (is_numeric($query)) {
            // Numeric hole assume user ID →  user dekabe
            $users = User::where('id', $query)->get();
        } else {
            // Non-numeric → user name/email and product name search
            $users = User::where('name', 'LIKE', "%{$query}%")
                ->orWhere('email', 'LIKE', "%{$query}%")
                ->get();

            $products = Product::where('name', 'LIKE', "%{$query}%")->get();
        }

        return view('admin.search_results', compact('users', 'products', 'query'));
    }

}
