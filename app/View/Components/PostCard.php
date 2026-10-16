<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Carbon\Carbon;

class PostCard extends Component
{
    public int $imageWidth;
    public int $imageHeight;
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $href,
        public string $title,
        public string $description,
        public bool $highlighted,
        public bool $pinned,
        public string $image,
        public Carbon $date,
        public ?Carbon $updated = null,
    ) {
        $this->imageWidth = $highlighted ? 1440 : 720;
        $this->imageHeight = $highlighted ? 720 : 360;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.post-card');
    }
}
