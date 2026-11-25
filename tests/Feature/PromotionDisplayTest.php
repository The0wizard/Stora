<?php

use App\Models\Book;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Promotion;
use App\Models\User;

it('shows an active promotion and discounted price in the book catalog', function () {
    $category = Category::create([
        'name' => 'Fiction',
        'description' => 'Fiction books',
    ]);

    $book = Book::create([
        'title' => 'Promotional Book',
        'author' => 'Test Author',
        'description' => 'A book on promotion',
        'price' => 10,
        'thumbnail' => '/storage/thumbnails/test.jpg',
        'category_id' => $category->id,
        'featured' => false,
    ]);

    Promotion::create([
        'name' => 'Spring Sale',
        'book_id' => $book->id,
        'discount_type' => 'percentage',
        'discount_value' => 20,
        'starts_at' => now()->subDay(),
        'ends_at' => now()->addDay(),
        'is_active' => true,
    ]);

    $this->get(route('books.all'))
        ->assertOk()
        ->assertSee('Spring Sale')
        ->assertSee('-20%')
        ->assertSee('$10.00')
        ->assertSee('$8.00');

    $this->actingAs(User::factory()->create(['role' => 'admin']))
        ->get(route('admin.books.index'))
        ->assertOk()
        ->assertSee('Spring Sale')
        ->assertSee('-20%')
        ->assertSee('$10.00')
        ->assertSee('$8.00');
});

it('uses the active promotion price in checkout totals', function () {
    $category = Category::create(['name' => 'Fiction']);
    $book = Book::create([
        'title' => 'Promotional Book',
        'author' => 'Test Author',
        'description' => 'A book on promotion',
        'price' => 10,
        'thumbnail' => '/storage/thumbnails/test.jpg',
        'category_id' => $category->id,
        'featured' => false,
    ]);

    Promotion::create([
        'name' => 'Spring Sale',
        'book_id' => $book->id,
        'discount_type' => 'percentage',
        'discount_value' => 20,
        'starts_at' => now()->subDay(),
        'ends_at' => now()->addDay(),
        'is_active' => true,
    ]);

    $user = User::factory()->create();
    Cart::create([
        'user_id' => $user->id,
        'book_id' => $book->id,
        'quantity' => 2,
    ]);

    $this->actingAs($user)
        ->get(route('cart.checkout'))
        ->assertOk()
        ->assertSee('-20%')
        ->assertSee('$8.00')
        ->assertSee('$16.00');
});

it('saves discounted prices when placing an order', function () {
    $category = Category::create(['name' => 'Fiction']);
    $book = Book::create([
        'title' => 'Promotional Book',
        'author' => 'Test Author',
        'description' => 'A book on promotion',
        'price' => 10,
        'thumbnail' => '/storage/thumbnails/test.jpg',
        'category_id' => $category->id,
        'featured' => false,
    ]);

    Promotion::create([
        'name' => 'Spring Sale',
        'book_id' => $book->id,
        'discount_type' => 'percentage',
        'discount_value' => 20,
        'starts_at' => now()->subDay(),
        'ends_at' => now()->addDay(),
        'is_active' => true,
    ]);

    $user = User::factory()->create();
    Cart::create([
        'user_id' => $user->id,
        'book_id' => $book->id,
        'quantity' => 2,
    ]);

    $this->actingAs($user)
        ->post(route('cart.confirm'), ['address' => '123 Example Street'])
        ->assertRedirect(route('orders.index'));

    $order = Order::firstOrFail();
    expect((float) $order->total_price)->toBe(16.0);
    expect((float) $order->orderItems()->firstOrFail()->price)->toBe(8.0);
});
