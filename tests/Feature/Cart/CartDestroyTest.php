<?php

namespace Tests\Feature\Cart;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\ProductVariation;

class CartDestroyTest extends TestCase
{
    public function test_it_fails_if_unauthenticated()
    {
        $this->json('DELETE', 'api/cart/2')
            ->assertStatus(401);
    }

    public function test_it_fails_if_product_cant_be_found()
    {
        $user = factory(User::class)->create();

        $this->jsonAs($user, 'DELETE', 'api/cart/2')
            ->assertStatus(404);
    }

    public function test_it_deletes_an_item_from_the_cart()
    {
        $user = factory(User::class)->create();

        $user->cart()->attach(
            $product = factory(ProductVariation::class)->create()
        );

        $this->jsonAs($user, 'DELETE', "api/cart/{$product->id}");

        $this->assertDatabaseMissing('cart_user', [
            'product_variation_id' => $product->id
        ]);
    }
}
