<?php

namespace App\Http\Controllers;

use App\Classes\PrepareBoxesControllerData;
use App\Http\Requests\Box\EditRequest;
use App\Http\Requests\Box\UpdateRequest;

class BoxController extends Controller
{
    private PrepareBoxesControllerData $prepareBoxes;

    public function __construct(PrepareBoxesControllerData $prepareBoxes)
    {
        $this->prepareBoxes = $prepareBoxes;
    }

    public function index()
    {
        return view('pages.boxes.index', $this->prepareBoxes->index());
    }

    public function edit(EditRequest $request)
    {
        return view('pages.boxes.edit', $this->prepareBoxes->edit($request->validated(), $request->session()->get('success')));
    }

    public function update(UpdateRequest $request)
    {
        return to_route('box.edit', ['box' => $request->validated('id')])
            ->with('success', $this->prepareBoxes->update($request->validated()));
    }
}
