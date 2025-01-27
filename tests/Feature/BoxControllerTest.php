<?php

use App\Enums\Colors;
use App\Models\Box;
use App\Models\User;

beforeEach(function () {
    $this->admin      = User::factory()->create();
    $this->indexTitle = config('app.name') . ' | ' . __('Boxes');
});

it('lists all boxes in box.index', function () {
    // Arrange
    $boxes = Box::factory()->count(3)->create();
    $url   = route('box.index');

    // Act
    $response = $this->actingAs($this->admin)->get($url);

    // Assert
    $response->assertOk();
    $response->assertViewIs('pages.boxes.index');
    $response->assertViewHas('boxes', $boxes);
    $response->assertViewHas('title', $this->indexTitle);
    $response->assertViewHas('status', null);
});

it('shows box.edit when url is not preset', function () {
    // Arrange
    $box = Box::factory()->default()->create();
    $url = route('box.edit', ['box' => $box]);

    // Act
    $response = $this->actingAs($this->admin)->get($url);

    // Assert
    $response->assertOk();
    $response->assertViewIs('pages.boxes.edit');
    $response->assertViewHas('box', $box);
    $response->assertViewHas('title', $this->indexTitle . ' - ' . __('Edit'));
    $response->assertViewHas('colors', [Colors::BLUE, Colors::GREEN, Colors::RED]);
});

it('redirects from box.edit to preset url', function () {
    // Arrange
    $box = Box::factory()->create();
    $url = route('box.edit', ['box' => $box]);

    // Act
    $response = $this->actingAs($this->admin)->get($url);

    // Assert
    $response->assertRedirect($box->url);
});

it('allows admin to update a box', function () {
    // Arrange
    $box  = Box::factory()->default()->create();
    $url  = route('box.update', ['box' => $box]);
    $data = [
        'url'   => fake()->url,
        'color' => Colors::BLUE->value,
    ];

    // Act
    $response = $this->actingAs($this->admin)->put($url, $data);

    // Assert
    $response->assertRedirect(route('box.index'));
    $response->assertSessionHas('status', __('Box updated successfully.'));
    $this->assertDatabaseHas('boxes', $data);
});

it('prevents box update when url exists', function () {
    // Arrange
    $box  = Box::factory()->create();
    $url  = route('box.update', ['box' => $box]);
    $data = [
        'url'   => fake()->url,
        'color' => Colors::BLUE->value,
    ];

    // Act
    $response = $this->actingAs($this->admin)->put($url, $data);

    // Assert
    $response->assertRedirect(route('box.index'));
    $this->assertDatabaseHas('boxes', $box->only('id', 'title', 'url', 'color'));
});

it('prevents updating a box url to box.edit or box.update', function () {
    // Arrange
    $box = Box::factory()->default()->create();

    $previousUrl = route('box.edit', ['box' => $box]);
    session()->setPreviousUrl($previousUrl);

    $url  = route('box.update', ['box' => $box]);
    $data = [
        'url' => fake()->randomElement([
            route('box.update', ['box' => $box]),
            route('box.edit', ['box' => $box]),
        ]),
        'color' => Colors::BLUE->value,
    ];

    // Act
    $response = $this->actingAs($this->admin)->put($url, $data);

    // Assert
    $response->assertRedirect(route('box.edit', ['box' => $box]));
    $response->assertSessionHasErrors([
        'url' => __('Box url should not contain: ' . parse_url(config('app.url'), PHP_URL_HOST) . ' or edit or update.'),
    ]);
});
