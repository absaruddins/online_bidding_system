<?php

namespace Tests\Unit;

use App\Http\Controllers\BidController;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;
use Mockery;
use App\Models\Bid;

class BidControllerValidationTest extends TestCase
{
    /** @test */
    public function it_rejects_invalid_price_in_controller()
    {
        $this->expectException(ValidationException::class);

        $request = Request::create('/bids', 'POST', [
            'product_id' => 1,
            'gmail'      => 'test@gmail.com',
            'price'      => -10, // invalid
        ]);

        $controller = new BidController();

        $controller->store($request);
    }

    /** @test */
    public function it_accepts_valid_price_in_controller()
    {
        
        $mock = Mockery::mock('alias:' . Bid::class);

        $mock->shouldReceive('create')->andReturn((object)[
            'product_id' => 1,
            'gmail' => 'valid@gmail.com',
            'price' => 100
        ]);

        $mock->shouldReceive('where')->andReturnSelf();
        $mock->shouldReceive('orderBy')->andReturnSelf();
        $mock->shouldReceive('get')->andReturn(collect([]));

        $request = Request::create('/bids', 'POST', [
            'product_id' => 1,
            'gmail'      => 'valid@gmail.com',
            'price'      => 100, // ✔ valid
        ]);

        $controller = new BidController();

        $response = $controller->store($request);

        $this->assertEquals(200, $response->status());
    }
}
