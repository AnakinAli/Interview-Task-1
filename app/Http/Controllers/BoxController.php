<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Enums\Colors;
use App\Http\Requests\Box\EditRequest;
use App\Http\Requests\Box\UpdateRequest;
use App\Services\BoxService;
use Illuminate\Http\Request;

class BoxController extends Controller
{
    private string $indexTitle;

    private BoxService $boxService;

    public function __construct(BoxService $boxService)
    {
        $this->indexTitle = config('app.name') . ' | ' . __('Boxes');
        $this->boxService = $boxService;
    }

    public function index(Request $request)
    {
        return view('pages.boxes.index', [
            'title'  => $this->indexTitle,
            'boxes'  => $this->boxService->findBoxes(),
            'status' => $request->session()->get('status'),
        ]);
    }

    public function edit(EditRequest $request)
    {
        return view('pages.boxes.edit', [
            'title'  => $this->indexTitle . ' - ' . __('Edit'),
            'box'    => $this->boxService->findBoxes($request->validated())->first(),
            'colors' => [Colors::BLUE, Colors::GREEN, Colors::RED],
        ]);
    }

    public function update(UpdateRequest $request)
    {
        return to_route('box.index')
            ->with('status', $this->boxService->update($request->validated()));
    }
}
