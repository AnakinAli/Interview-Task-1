<?php

namespace Database\Seeders;

use App\Repositories\BoxRepository;
use App\Services\BoxService;
use Illuminate\Database\Seeder;

class BoxSeeder extends Seeder
{
    private BoxRepository $boxRepository;

    public function __construct(BoxRepository $boxRepository)
    {
        $this->boxRepository = $boxRepository;
    }

    public function run(): void
    {
        $count = config('box.initial_count');
        foreach (range(1, $count) as $_) {
            $this->boxRepository->updateOrCreate(['title' => fake()->company()]);
        }
    }
}
