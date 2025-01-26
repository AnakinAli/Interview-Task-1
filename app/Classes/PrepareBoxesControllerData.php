<?php

namespace App\Classes;

use App\Services\BoxService;

class PrepareBoxesControllerData
{
    private string $indexTitle;

    private BoxService $boxService;

    private AvailableColors $availableColors;

    public function __construct(BoxService $boxService, AvailableColors $availableColors)
    {
        $this->indexTitle      = config('app.name') . ' | ' . __('Boxes');
        $this->boxService      = $boxService;
        $this->availableColors = $availableColors;
    }

    public function index(): array
    {
        return [
            'title' => $this->indexTitle,
            'boxes' => $this->boxService->findBoxes(),
        ];
    }

    public function edit(array $validatedData, string $status = null): array
    {
        return [
            'title'  => $this->indexTitle . ' - ' . __('Edit'),
            'box'    => $this->boxService->findBoxes($validatedData)->first(),
            'colors' => $this->availableColors->colors(),
            'status' => $status,
        ];
    }

    public function update(array $validatedData): string
    {
        return $this->boxService->update($validatedData);
    }
}
