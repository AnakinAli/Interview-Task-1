<?php

namespace App\Services;

use App\Repositories\BoxRepository;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class BoxService
{
    private BoxRepository $boxRepository;

    public function __construct(BoxRepository $boxRepository)
    {
        $this->boxRepository = $boxRepository;
    }

    public function update(array $data): string
    {
        $this->boxRepository->updateOrCreate(['id' => $data['id']], [...Arr::except($data, 'id')]);

        return __('Box updated successfully.');
    }

    public function getUrl(int $id): ?string
    {
        return $this->findBoxes(['id' => $id])->first()->url;
    }

    public function findBoxes(array $filter = [], array $only = ['id', 'title', 'url', 'color']): Collection
    {
        return $this->boxRepository->filterBoxes($filter, $only)->get();
    }
}
