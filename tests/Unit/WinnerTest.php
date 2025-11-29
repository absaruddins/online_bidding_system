<?php

namespace Tests\Unit;

use App\Models\Bid;
use Tests\TestCase;

class WinnerTest extends TestCase
{
    /** @test */
    public function it_returns_highest_bid_from_bids_list()
    {
        // Fake Bids Collection (NO DATABASE used)
        $bids = collect([
            new Bid(['gmail' => 'a@gmail.com', 'price' => 100]),
            new Bid(['gmail' => 'b@gmail.com', 'price' => 350]),
            new Bid(['gmail' => 'c@gmail.com', 'price' => 200]),
        ]);

        // Winner logic (sorting manually)
        $winner = $bids->sortByDesc('price')->first();

        // Assertions
        $this->assertEquals('b@gmail.com', $winner->gmail);
        $this->assertEquals(350, $winner->price);
    }
}
