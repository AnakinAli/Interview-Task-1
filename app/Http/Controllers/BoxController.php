<?php

namespace App\Http\Controllers;

use App\Classes\PrepareBoxesControllerData;
use App\Http\Requests\Box\EditRequest;
use App\Http\Requests\Box\UpdateRequest;
use Illuminate\Http\Request;

class BoxController extends Controller
{
    private PrepareBoxesControllerData $prepareBoxes;

    public function __construct(PrepareBoxesControllerData $prepareBoxes)
    {
        $this->prepareBoxes = $prepareBoxes;
    }

    public function index(Request $request)
    {
        return view('pages.boxes.index', $this->prepareBoxes->index($request->session()->get('status')));
    }

    public function edit(EditRequest $request)
    {
        return view('pages.boxes.edit', $this->prepareBoxes->edit($request->validated()));
    }

    public function update(UpdateRequest $request)
    {
        return to_route('box.index', ['box' => $request->validated('id')])
            ->with('status', $this->prepareBoxes->update($request->validated()));
    }
}
