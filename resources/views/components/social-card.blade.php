<a
    href={{ $url }}
    class="flex h-12 w-full flex-row items-center rounded-md border-2 border-neutral-600 bg-neutral-800 px-4 py-9 duration-150 ease-in-out hover:bg-neutral-600 lg:mb-4"
>
    <div class="flex w-full items-center">
        {{ $slot }} <p class="ml-1 text-lg">{{ $platform }}</p>
    </div>
    <x-mdi-arrow-top-right  class="w-5 h-5" />
</a>
