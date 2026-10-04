<?php

namespace App\View\Components\Navbar;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Link extends Component
{

    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $redirect,
        public string $name,
        public bool $selected = false,
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar.link');
    }
}
