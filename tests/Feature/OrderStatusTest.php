<?php

use App\Models\Order;
use App\Models\User;

it('shows a customer their own order status but not another customers order', function () {
    $customer = User::factory()->create(['role' => 'user']);
    $otherCustomer = User::factory()->create(['role' => 'user']);

    $customerOrder = Order::create([
        'user_id' => $customer->id,
        'address' => 'Customer shipping address',
        'status' => 'pending',
        'total_price' => 25,
    ]);

    $otherOrder = Order::create([
        'user_id' => $otherCustomer->id,
        'address' => 'Private shipping address',
        'status' => 'completed',
        'total_price' => 40,
    ]);

    $this->actingAs($customer)
        ->get(route('orders.index'))
        ->assertOk()
        ->assertSee('pending')
        ->assertSee('Customer shipping address')
        ->assertDontSee('Private shipping address');

    $this->actingAs($customer)
        ->get(route('orders.show', $customerOrder))
        ->assertOk()
        ->assertSee('pending');

    $this->actingAs($customer)
        ->get(route('orders.show', $otherOrder))
        ->assertNotFound();
});
