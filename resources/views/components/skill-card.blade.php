<a
    href={{ $url }}
    class="flex flex-col items-center rounded-md border-2 border-neutral-600 bg-neutral-700 px-3 py-2 text-lg font-medium duration-150 ease-in-out hover:bg-neutral-500"
    {{ $title }}
    >
    <div class="flex flex-row items-center">
        <img src={{ $icon }} alt={{ $text }} class="mr-2 h-5 w-5 rounded-xs" />
        <span @class(["underline" => $title !== null])>{{ $text }}</span>
    </div>
</a>
