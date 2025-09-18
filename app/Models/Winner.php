<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Winner extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'bid_id',
        'gmail',
        'price',
        'paid',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function bid()
    {
        return $this->belongsTo(Bid::class);
    }
}
