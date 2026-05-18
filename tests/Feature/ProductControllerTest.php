<?php

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('it shows a product detail', function () {
    $product = Product::factory()->create();

    $this->getJson(route('products.show', $product))
        ->assertSuccessful()
        ->assertJsonPath('data.id', $product->id)
        ->assertJsonPath('data.name', $product->name);
});

test('it deletes a product', function () {
    $product = Product::factory()->create();

    $this->deleteJson(route('products.destroy', $product))
        ->assertSuccessful()
        ->assertJsonPath('message', 'product deleted successfully');

    $this->assertModelMissing($product);
});
