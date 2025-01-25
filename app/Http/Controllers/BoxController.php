<?php

namespace App\Http\Controllers;

use App\Services\BoxService;
use Illuminate\Http\Request;

class BoxController extends Controller
{
    private BoxService $boxService;

    private string $headTitle;

    public function __construct(BoxService $boxService)
    {
        $this->boxService = $boxService;
        $this->headTitle  = config('app.name') . ' | ' . 'Boxes';
    }

    public function index()
    {
        return view('pages.boxes.index', [
            'title' => $this->headTitle,
            'boxes' => $this->boxService->findBoxes(),
        ]);
    }

    public function edit(string $id)
    {
        dd($this->boxService->findBoxes(['id' => $id]));

        return view('pages.boxes.edit', [
            'title' => $this->headTitle . ' - ' . 'Edit',
            'box'   => $this->boxService->findBoxes(['id' => $id]),
        ]);
    }

    public function update(Request $request, string $id)
    {
    }
}
