<li class="relative z-50 mx-1 mb-2 flex lg:my-0 lg:w-auto">
    <a @class([
        "flex w-full justify-center rounded-md border-2 border-neutral-600 px-4 py-2 text-nowrap duration-150 ease-in-out hover:backdrop-brightness-200",
        "backdrop-brightness-200" => $selected
    ]) href="{{ $redirect }}">
        {{ $name }}
    </a>
</li>