<?php
namespace App\Http\Controllers; // phpcs:ignore PEAR.Commenting.FileComment.Missing

use App\Models\Bid;
use Illuminate\Http\Request;

class BidController extends Controller // phpcs:ignore PEAR.Commenting.ClassComment.Missing
{
    // Save bid;
    public function store(Request $request)
    {
        $bid = Bid::create([
            'product_id' => $request->product_id,
            'gmail'      => $request->gmail,
            'price'      => $request->price,
        ]);

        // Return updated bid list
        $bids = Bid::where('product_id', $request->product_id)
            ->orderBy('price', 'desc')
            ->get();

        return response()->json($bids);
    }

    // Find winner
    public function winner($productId)
    {
        $winner = Bid::where('product_id', $productId)
            ->orderBy('price', 'desc')
            ->first();

        return response()->json($winner);
    }
}
