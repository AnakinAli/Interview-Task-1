<?php

namespace App\Services;

use App\Models\Box;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class BoxService
{
    private Builder $boxModelBuilder;

    public function __construct(Box $boxModel)
    {
        $this->boxModelBuilder = $boxModel->newQuery();
    }

    public function updateOrCreate(array $data): Box
    {
        return $this->boxModelBuilder->updateOrCreate($data);
    }

    public function findBoxes(array $filter = [], array $only = ['id', 'title', 'url', 'color']): array
    {
        return $this->filterBoxes($filter, $only)->toArray();
    }

    private function filterBoxes(array $filter, array $only): Collection
    {
        return $this->boxModelBuilder->where($filter)->select($only)->get();
    }
}
