<?php

use App\Enums\Colors;
use App\Models\Box;
use App\Services\BoxService;

beforeEach(function () {
    $this->boxService = app(BoxService::class);
});

it('updates a box successfully', function () {
    // Arrange
    $box  = Box::factory()->default()->create();
    $data = [
        'id'    => $box->id,
        'title' => 'Updated Box Title',
        'url'   => 'https://new-url.com',
        'color' => 'blue',
    ];
    // Act
    $result = $this->boxService->update($data);

    // Assert
    $this->assertDatabaseHas('boxes', $data);
    expect($result)->toBe(__('Box updated successfully.'));
});

it('retrieves specific box url', function () {
    // Arrange
    $box = Box::factory()->create();

    // Act
    $result = $this->boxService->getUrl($box->id);

    // Assert
    expect($result)->toBe($box->url);
});

it('retrieves nullable box url', function () {
    // Arrange
    $box = Box::factory()->default()->create();

    // Act
    $result = $this->boxService->getUrl($box->id);

    // Assert
    expect($result)->toBeNull();
});

it('finds boxes', function () {
    // Arrange
    $box = Box::factory()->create(['color' => $color = Colors::RED->value]);
    Box::factory()->count(2)->create(['color' => Colors::GREEN->value]);

    // Act
    $result = $this->boxService->findBoxes(['color' => $color], ['*']);

    // Assert
    expect($result)->toHaveCount(1);
    expect($result->first()->id)->toBe($box->id);
});
