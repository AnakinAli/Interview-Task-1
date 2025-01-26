<?php

it('asserts guests are redirected to login page', function () {
    // Act
    $response = $this->get(route('guest.index'));

    // Assert
    $response->assertRedirect(route('login'));
});
