<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Box;
use Illuminate\Database\Eloquent\Builder;

class BoxRepository
{
    private Builder $boxModelBuilder;

    public function __construct(Box $boxModel)
    {
        $this->boxModelBuilder = $boxModel->newQuery();
    }

    public function updateOrCreate(array $find, array $data = []): Box
    {
        return $this->boxModelBuilder->updateOrCreate($find, $data);
    }

    public function filterBoxes(array $filter, array $only): Builder
    {
        return $this->boxModelBuilder->where($filter)->select($only);
    }
}
