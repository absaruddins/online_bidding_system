<?php
namespace App\Http\Controllers;

use App\Models\Winner;
use Illuminate\Http\Request;

class WinnerController extends Controller
{
    // Save winner (AJAX)
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'bid_id'     => 'nullable|integer|exists:bids,id',
            'gmail'      => 'required|email',
            'price'      => 'required|numeric',
        ]);

        // Prevent duplicate winners for same product (optional)
        $existing = Winner::where('product_id', $request->product_id)->first();
        if ($existing) {
            return response()->json(['message' => 'Winner already recorded for this product'], 409);
        }

        $winner = Winner::create([
            'product_id' => $request->product_id,
            'bid_id'     => $request->bid_id,
            'gmail'      => $request->gmail,
            'price'      => $request->price,
            'paid'       => false,
        ]);

        return response()->json($winner);
    }

    // Simple list page for admin or user
    public function index()
    {
        $winners = Winner::with('product')->orderBy('created_at', 'desc')->paginate(20);
        return view('admin.admin_winners', compact('winners'));
    }

    // Mark paid endpoint (optional)
    public function markPaid(Request $request, $id)
    {
        $w       = Winner::findOrFail($id);
        $w->paid = true;
        $w->save();

        return redirect()->back()->with('status', 'Marked as paid');
    }
}
