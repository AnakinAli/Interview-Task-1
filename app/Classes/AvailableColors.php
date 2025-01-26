<?php

namespace App\Classes;

use App\Enums\Colors;

class AvailableColors
{
    public function colors(): array
    {
        return [Colors::BLUE, Colors::GREEN, Colors::RED];
    }
}
