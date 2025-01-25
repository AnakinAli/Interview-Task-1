<?php

namespace App\View\Components;

use App\Classes\Colors;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BoxComponent extends Component
{
    public string $editUrl;

    public string $title;

    public ?Colors $color;

    public ?string $url;

    public function __construct(int $id, string $title, ?string $url = null, ?Colors $color = null)
    {
        $this->editUrl = route('box.edit', $id);
        $this->title   = $title;
        $this->color   = $color;
        $this->url     = $url;
    }

    public function render(): View|Closure|string
    {
        return view('components.box-component');
    }
}
