<?php

use App\Models\Box;
use App\Repositories\BoxRepository;
use Illuminate\Support\Arr;

beforeEach(function () {
    $this->repository = app(BoxRepository::class);
});

it('creates a box', function () {
    // Arrange
    $boxData = Box::factory()->make()->toArray();

    // Act
    $this->repository->updateOrCreate($boxData);

    // Assert
    $this->assertDatabaseHas('boxes', $boxData);
    $this->assertDatabaseCount('boxes', 1);
});

it('updates a box', function () {
    // Arrange
    $boxData          = Box::factory()->create()->toArray();
    $boxData['title'] = 'updated title';
    $data             = Arr::except($boxData, ['id', 'created_at', 'updated_at']);

    // Act
    $this->repository->updateOrCreate(['id' => $boxData['id']], $data);

    // Assert
    $this->assertDatabaseHas('boxes', $data);
    $this->assertDatabaseCount('boxes', 1);
});

it('filters boxes', function () {
    // Arrange
    Box::factory()->count(2)->create()->toArray();

    // Act
    $filteredResults = $this->repository->filterBoxes(['id' => 1], ['title']);

    // Assert
    expect($filteredResults->get()->toArray())->toBe([[
        'title' => Box::first()->title,
    ]]);
});
