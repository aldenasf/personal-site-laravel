<div class="my-2 flex flex-col items-center lg:my-1 lg:flex-row lg:items-stretch">
    <div
        {{ $title }}
        class="mb-1 flex w-full flex-row items-center justify-center rounded-md border-2 border-neutral-800 bg-neutral-900 px-3 py-5 lg:mr-2 lg:mb-0 lg:max-w-40"
    >
        <p @class([
            "text-lg font-medium",
            "underline" => $title !== null
        ])>
            {{ $text }}
        </p>
    </div>
    <div class="flex w-full flex-row flex-wrap gap-2 rounded-md bg-neutral-800 p-3">
        {{ $slot }}
    </div>
</div>
