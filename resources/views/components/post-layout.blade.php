<x-layout name="Projects" page="/projects">
    <main class="flex flex-col items-center justify-center py-2 lg:py-8">
        <div class="flex w-full max-w-screen flex-col flex-wrap items-center lg:max-w-280">
            <div class="flex w-full flex-row lg:justify-start">
                <a href="/projects"
                    class="mb-4 flex h-14 w-full flex-row items-center border-y-2 border-neutral-600 bg-neutral-800 px-2 transition-colors duration-150 ease-in-out hover:bg-neutral-600 lg:mb-8 lg:h-12 lg:w-24 lg:justify-center lg:rounded-md lg:border-2">
                    <x-mdi-arrow-left class="mr-1 h-5 w-5"></x-mdi-arrow-left><span class="">Back</span>
                </a>
            </div>
            <div
                class="flex w-full flex-col flex-wrap border-y-2 border-neutral-600 bg-neutral-800 px-2 py-8 md:px-4 lg:items-center lg:rounded-xl lg:border-2 lg:px-0">
                <p class="flex flex-row items-center text-sm text-neutral-400 md:text-base lg:text-xl">
                    <span class="mx-0 flex flex-row items-center">
                        {{ $date->format('M j, Y') }}
                    </span>
                    @if($updated !== null)
                    <span class="ml-1">
                        (updated {{ $updated->format('M j, Y') }})
                    </span>
                    @endif
                    @if($pinned === true)
                    <span class="mx-1.5">|</span>
                    <span class="mx-0 flex flex-row items-center text-red-400">
                        {{-- <Icon class="mx-1 text-sm lg:text-lg" name="mdi:pin" /> --}}
                        <x-mdi-pin class="mx-1 h-4 w-4 lg:h-6 lg:w-6" />
                        Pinned
                    </span>
                    @endif
                </p>
                <h1
                    class="mt-2 text-xl font-bold md:text-3xl lg:mx-10 lg:mt-4 lg:max-w-none lg:text-center lg:text-4xl">
                    {{ $title }}
                </h1>
                <p class="mt-3 text-sm text-neutral-400 md:text-base lg:max-w-none lg:text-center lg:text-lg">
                    {{ $description }}
                </p>
            </div>

            @if($imageURL !== null)
                <div id="image" class="mt-0 flex w-full lg:mt-10">
                    <img src={{ $imageURL }} alt={{ $title }}
                        class="max-h-[1080px] w-[1920px] overflow-clip border-neutral-600 lg:rounded-xl lg:border-2" />
                </div>
            @endif
        </div>
        <div
            class="mt-0 flex w-full justify-center border-y-2 border-neutral-600 bg-neutral-800 lg:mt-10 lg:w-auto lg:max-w-screen lg:rounded-xl lg:border-2 lg:p-12">
            <article
                class="prose prose-base prose-neutral prose-invert lg:prose-lg max-w-none p-4 md:p-8 lg:max-w-5xl lg:p-0">
                {{ $slot }}
            </article>
        </div>
    </main>
</x-layout>
