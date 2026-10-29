<x-layout page="/projects" title="Projects">
    <div class="flex items-center justify-center max-w-4xl m-auto" x-data="{
                    title: '',
                    description: '',
                    image: '',
                    pinned: false
                }">
        <div class="flex flex-col  px-4 py-2 gap-4 lg:py-8 w-full">
            <div class="w-full flex flex-col">
                <h1 class="text-2xl font-black">New Project</h1>
                <p class="text-neutral-400">Create and publish a new project showcase, case study, or article in your
                    portfolio.</p>
            </div>
            <section class="mb-4 gap-4 rounded-md border-2 border-neutral-700 p-8 flex flex-col w-full">
                <div class="flex flex-row items-center gap-2">
                    <x-mdi-eye class="size-5 text-red-400" />
                    <p class="text-xs font-mono font-bold text-neutral-300">LIVE CARD PREVIEW</p>
                </div>
                <div>
                    <a href="#"
                        class="group flex flex-col rounded-xl border-2 border-neutral-600 bg-neutral-800 p-4 transition-all duration-150 hover:bg-neutral-600 p-4 lg:p-10 lg:pb-4">
                        <div class="flex transition-colors duration-150">
                            <template x-if="image">
                                <img :src="image" :alt="image" width="1440" height="720" loading="eager"
                                    class="h-full w-full object-cover object-center">
                            </template>
                            <template x-if="!image">
                                <div style="height:461px; width: 923px;"
                                    class="object-cover object-center bg-neutral-900 flex items-center justify-center">
                                    <p>No Image Provided</p>
                                </div>
                            </template>
                        </div>
                        <div
                            class="mt-3 flex h-full flex-col transition-colors duration-150 items-start lg:mt-4 lg:items-center">
                            <p class="line-clamp-2 font-bold transition-colors duration-150 group-hover:text-blue-500 text-2xl lg:mb-1 lg:text-3xl"
                                x-text="title || 'Your Project Title'">
                            </p>
                            <p class="mb-2 line-clamp-3 text-neutral-400 transition-colors duration-150 group-hover:text-blue-500 lg:line-clamp-2 items-start lg:items-center lg:text-center"
                                x-text="description || 'A concise summary of what this project does and technologies used...'">
                            </p>
                            <p
                                class="lg:text-md mt-auto pt-1 text-sm text-neutral-400 transition-colors duration-150 group-hover:text-blue-500">
                                <time :datetime="{{ now()->format('M j, Y') }}">{{ now()->format('M j, Y') }}</time>
                            </p>
                            <template x-if="pinned">
                                <div class="absolute flex place-self-end">
                                    <svg class="mt-4 text-lg text-white h-12 w-12" fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg" id="mdi-pin" viewBox="0 0 24 24">
                                        <path d="M16,12V4H17V2H7V4H8V12L6,14V16H11.2V22H12.8V16H18V14L16,12Z"></path>
                                    </svg>
                                </div>
                            </template>
                        </div>
                    </a>
                </div>
            </section>
            <form action="{{ route('projects.store') }}" method="post" class="flex flex-col w-full">
                <section
                    class="mb-4 gap-4 rounded-md border-2 border-neutral-600 bg-neutral-800 p-8 flex flex-col w-full">
                    <div class="flex flex-row justify-between">
                        <h1 class="text-xl font-bold">Project Overview</h1>
                        <p class="text-neutral-400 text-sm">* Required fields</p>
                    </div>
                    <hr class="border-neutral-700">
                    <div class="flex flex-col gap-2">
                        <label class="font-bold" for="title">Project Title <span class="text-red-400">*</span></label>
                        <input
                            class="focus:outline-hidden focus:ring-0 rounded-md border-2 border-neutral-600 bg-neutral-900 py-2 px-4"
                            placeholder="e.g. Turning an old TV Box into a Family Business NAS" type="text" name="title"
                            x-model="title" id="title">
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="font-bold" for="description">Short Description <span
                                class="text-red-400">*</span></label>
                        <textarea rows="2" cols="30"
                            class="focus:outline-hidden focus:ring-0 resize-none rounded-md border-2 border-neutral-600 bg-neutral-900 py-2 px-4"
                            placeholder="A concise summary of what this project does and technologies used..."
                            type="text" name="description" x-model="description" id="description"></textarea>
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="font-bold" for="image">Cover Image URL or Path <span
                                class="text-red-400">*</span></label>
                        <div
                            class="rounded-md border-2 justify-center align-middle border-neutral-600 bg-neutral-900 flex flex-row">
                            <x-mdi-image class="size-5 m-auto mx-4 text-neutral-500" />
                            <input class="w-full border-0 py-2 pr-4 focus:outline-hidden focus:ring-0"
                                placeholder="https://images.unsplash.com/... or /images/preview.png" type="text"
                                name="image" x-model="image" id="image">
                        </div>
                    </div>

                    <label for="pinned"
                        :class="pinned ? 'border-red-500/80 bg-red-500/10 hover:border-red-400 hover:bg-red-500/15' : 'border-neutral-600 bg-neutral-900/60 hover:border-neutral-500 hover:bg-neutral-900/80'"
                        class="flex items-center p-4 rounded-md border-2 transition-all duration-200 cursor-pointer group select-none">
                        <input type="checkbox" name="pinned" x-model="pinned" id="pinned" value="1"
                            class="sr-only">
                        <div class="flex items-center gap-3">
                            <div
                                :class="pinned ? 'bg-red-500 border-red-400 text-white shadow-xs shadow-red-500/50' : 'bg-neutral-800 border-neutral-700 text-neutral-400 group-hover:text-red-400 group-hover:border-neutral-600'"
                                class="p-2 rounded-md border transition-all duration-200">
                                <x-mdi-pin class="size-5" />
                            </div>
                            <div class="flex flex-col">
                                <p :class="pinned ? 'text-red-400' : 'text-white group-hover:text-red-400'"
                                    class="font-bold transition-colors">Pin to Featured Post</p>
                                <p :class="pinned ? 'text-neutral-300' : 'text-neutral-400'"
                                    class="text-xs transition-colors">Feature this project prominently at the top of your
                                    portfolio.</p>
                            </div>
                        </div>
                    </label>
                </section>
                <section
                    class="mb-4 gap-2 rounded-md border-2 border-neutral-600 bg-neutral-800 p-8 flex flex-col w-full">
                    <div class="flex flex-col">
                        <div>
                            <label class="font-bold text-2xl" for="content">Project Content</label>
                            <p class="text-neutral-400">Write detailed story, tech decisions, screenshots, and links.
                            </p>
                        </div>
                        <div></div>
                    </div>
                    <hr class="border-neutral-700 my-2">
                    {{-- <textarea class="rounded-md border-2 border-neutral-600 bg-neutral-900 py-2 px-4"
                        placeholder="Lorem ipsum dolor sit amet." type="text" name="content" id="content"></textarea>
                    --}}
                    <livewire:markdown-editor wire:model="content" placeholder="## Overview

Write about what inspired you, what technologies you used, challenges you encountered, and screenshots of your work" />
                </section>
                <section>
                    <button>Cancel</button>
                    <button type="submit">Submit</button>
                </section>
            </form>
        </div>
    </div>
</x-layout>