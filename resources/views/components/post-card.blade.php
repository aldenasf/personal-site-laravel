<a href={{ $href }} @class([
    "group flex flex-col rounded-xl border-2 border-neutral-600 bg-neutral-800 p-4 transition-all duration-150 hover:bg-neutral-600",
    "p-4 lg:p-10 lg:pb-4" => $highlighted,
    "max-h-96 lg:h-96" => !$highlighted
])>
    <div class="flex transition-colors duration-150">
        <img src={{$image}} alt={{$title}} width={{$imageWidth}} height={{$imageHeight}} loading={{$highlighted ? 'eager' : 'lazy'}} class="h-full w-full object-cover object-center">
    </div>
    <div @class([
        "mt-3 flex h-full flex-col transition-colors duration-150",
        "items-start lg:mt-4 lg:items-center" => $highlighted,
        "items-start" => !$highlighted
    ])>
        <p @class([
            "line-clamp-2 font-bold transition-colors duration-150 group-hover:text-blue-500",
            "text-2xl lg:mb-1 lg:text-3xl" => $highlighted,
            "text-2xl" => !$highlighted
        ])>
            {{ $title }}
        </p>
        <p @class([
            "mb-2 line-clamp-3 text-neutral-400 transition-colors duration-150 group-hover:text-blue-500 lg:line-clamp-2",
            "items-start lg:items-center lg:text-center" => $highlighted,
            "items-start" => !$highlighted
        ])>
            {{ $description }}
        </p>
        <p
            class="lg:text-md mt-auto pt-1 text-sm text-neutral-400 transition-colors duration-150 group-hover:text-blue-500">
            <time :datetime="$date->toIso8601String()">{{ $date->format('M j, Y') }}</time>
            @if($updated)
                <span>
                    <time datetime="{{ $updated->toIso8601String() }}">
                        (updated {{ $updated->format('M j, Y') }})
                    </time>
                </span>
            @endif
        </p>
        @if($pinned === true)
            <div class="absolute flex place-self-end">
                <x-mdi-pin class="mt-4 text-lg text-white h-12 w-12" />
            </div>
        @endif
    </div>
</a>