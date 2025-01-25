<?php

namespace Database\Seeders;

use App\Services\BoxService;
use Illuminate\Database\Seeder;

class BoxSeeder extends Seeder
{
    private BoxService $boxService;

    public function __construct(BoxService $boxService)
    {
        $this->boxService = $boxService;
    }

    public function run(): void
    {
        $count = config('box.initial_count');
        foreach (range(1, $count) as $_) {
            $this->boxService->updateOrCreate(['title' => fake()->company()]);
        }
    }
}
