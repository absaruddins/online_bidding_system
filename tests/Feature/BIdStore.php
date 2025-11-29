<?php

namespace Tests\Feature;

use App\Models\Bid;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BidStoreTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function bid_insert_updates_history()
    {
        $user = User::factory()->create();
        $product = Product::factory()->create();

        $response = $this->actingAs($user)->post('/bids', [
            'product_id' => $product->id,
            'gmail' => 'test@gmail.com',
            'price' => 500
        ]);

        $response->assertStatus(200);

        // Database check
        $this->assertDatabaseHas('bids', [
            'product_id' => $product->id,
            'gmail' => 'test@gmail.com',
            'price' => 500
        ]);

        // JSON history check
        $response->assertJsonFragment([
            'gmail' => 'test@gmail.com',
            'price' => 500
        ]);
    }
}
