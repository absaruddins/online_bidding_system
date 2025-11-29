<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'gmail', 'price'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    
    //  Winner Logic (Highest Bid)
    public static function findWinner($productId)
    {
        return self::where('product_id', $productId)
            ->orderBy('price', 'DESC')
            ->first();
    }
}
