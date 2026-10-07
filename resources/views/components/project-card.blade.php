<a
    class="flex flex-col rounded-md border-2 border-neutral-600 bg-neutral-800 p-5 duration-150 ease-in-out hover:bg-neutral-600"
    href={{ $url }}
>
    <div class="flex flex-row items-center">
        <img class="mr-2 max-h-5 max-w-5 rounded-sm" src={{ $avatar }} />
        <p class="text-md text-neutral-300">{{ $author }}</p>
    <x-mdi-arrow-top-right class="ml-auto w-5 h-5" />
    </div>
    <div class="my-1 flex flex-col items-start">
        <p class="text-lg font-bold">{{ $repo }}</p>
        <p class="text-sm text-neutral-100">{{ $description }}</p>
    </div>
    <div class="mt-auto flex flex-row items-center">
        <div class="mr-2 block h-4 w-4 rounded-sm" style='background-color: {{ $color }}'></div>
        <p>{{ $language }}</p>
    </div>
</a>
