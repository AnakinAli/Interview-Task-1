<?php

namespace Database\Seeders;

use App\Models\Box;
use Illuminate\Database\Seeder;

class BoxSeeder extends Seeder
{
    public function run(): void
    {
        $count = config('box.initial_count');
        Box::factory()->count($count)->default()->create();
    }
}
