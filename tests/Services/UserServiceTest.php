<?php

use App\Models\User;
use App\Services\UserService;

beforeEach(function () {
    $this->userService = app(UserService::class);
});

it('creates admin user', function () {
    // Arrange
    $user = User::factory()->make(['password' => $pass = 'password']);

    // Act
    $this->userService->generateAdmin($user->name, $user->email, $pass);

    // Assert
    $this->assertDatabaseHas('users', [
        'name'  => $user->name,
        'email' => $user->email,
    ]);
});
