<?php

namespace Tests\Unit\Collections;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\ProductVariation;
use App\Models\Collections\ProductVariationCollection;

class ProductVariationCollectionTest extends TestCase
{
    public function test_it_can_get_a_syncing_array()
    {
        $user = factory(User::class)->create();

        $user->cart()->attach(
            $product = factory(ProductVariation::class)->create(),
            [
                'quantity' => $quantity = 2
            ]
        );

        $collection = new ProductVariationCollection($user->cart);

        $this->assertEquals(
            [
                $product->id => [
                    'quantity' => $quantity
                ]
            ],
            $collection->forSyncing()
        );
    }
}
