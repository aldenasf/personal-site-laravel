<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\File;

class ProjectCard extends Component
{
    public string $avatar;
    public string $color;
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $author,
        public string $repo,
        public string $description,
        public string $language,
        public string $url,
    ) {
        $this->avatar = 'https://github.com/' . $author . '.png';

        $path = resource_path('json/colors.json');

        $colors = [];
        if (File::exists($path)) {
            $colors = json_decode(File::get($path), true);
        }

        $this->color = $colors[$language]['color'] ?? '#ffffff';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.project-card');
    }
}
