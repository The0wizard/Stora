<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;

it('renders the profile page and updates profile details through the named route', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get(route('profile.edi'))
        ->assertOk();

    $this->actingAs($user)
        ->patch(route('profile.update'), [
            'name' => 'Updated User',
            'email' => $user->email,
        ])
        ->assertRedirect(route('profile.edi'));

    expect($user->fresh()->name)->toBe('Updated User');
});

it('allows a user to change their password after confirming the current password', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->patch(route('profile.update'), [
            'name' => $user->name,
            'email' => $user->email,
            'current_password' => 'password',
            'password' => 'new-password-123',
            'password_confirmation' => 'new-password-123',
        ])
        ->assertRedirect(route('profile.edi'));

    expect(Hash::check('new-password-123', $user->fresh()->password))->toBeTrue();
});

it('rejects a password change when the current password is incorrect', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->from(route('profile.edi'))
        ->patch(route('profile.update'), [
            'name' => $user->name,
            'email' => $user->email,
            'current_password' => 'wrong-password',
            'password' => 'new-password-123',
            'password_confirmation' => 'new-password-123',
        ])
        ->assertSessionHasErrors('current_password');

    expect(Hash::check('password', $user->fresh()->password))->toBeTrue();
});
