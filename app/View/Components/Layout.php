<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Layout extends Component
{
    public string $pageTitle;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $page,
        public ?string $name,
    ) {
        $this->pageTitle = $name ? "$name - aldenasf" : "aldenasf";
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layout');
    }
}
