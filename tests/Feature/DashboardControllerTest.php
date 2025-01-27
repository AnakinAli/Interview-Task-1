<?php

use App\Models\User;

it('asserts logged in users are redirected to box.index', function () {
    // Arrange
    $admin = User::factory()->create();

    // Act
    $response = $this->actingAs($admin)->get(route('dashboard'));

    // Assert
    $response->assertRedirect(route('box.index'));
});
