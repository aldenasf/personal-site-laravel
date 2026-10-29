<div class="w-full">
    <div
        x-data="{ preview: false }"
        class="rounded-md border-2 border-neutral-600 bg-neutral-900 overflow-hidden"
    >
        <div class="flex gap-4 border-b-2 border-neutral-600 bg-neutral-800">
            <!-- Tabs view Mode -->
            <div class="flex border-r border-neutral-700">
                <button
                    type="button"
                    @click="preview = false"
                    :class="!preview ? 'text-white border-b-2 border-red-500 bg-neutral-900 font-semibold' : 'text-neutral-400 hover:text-neutral-200 hover:bg-neutral-700/50'"
                    class="px-4 py-2.5 text-sm transition-colors cursor-pointer"
                >
                    {{ __('livewire-markdown-editor::editor.write') }}
                </button>
                <button
                    type="button"
                    @click="preview = true"
                    :class="preview ? 'text-white border-b-2 border-red-500 bg-neutral-900 font-semibold' : 'text-neutral-400 hover:text-neutral-200 hover:bg-neutral-700/50'"
                    class="px-4 py-2.5 text-sm transition-colors cursor-pointer"
                >
                    {{ __('livewire-markdown-editor::editor.preview') }}
                </button>
            </div>

            <!-- Toolbar: only visible in write mode -->
            @if ($showToolbar)
                <div x-show="!preview" class="flex-1 flex justify-end">
                    <markdown-toolbar
                        for="markdown-textarea-{{ $this->getId() }}"
                        class="flex items-center gap-1 px-2"
                    >
                        <md-header>
                            <button type="button" class="p-1.5 rounded-md hover:bg-neutral-700 text-neutral-400 hover:text-white transition-colors cursor-pointer" title="{{ __('livewire-markdown-editor::editor.toolbars.heading') }}">
                                <x-phosphor-text-h class="size-5" aria-hidden="true" />
                            </button>
                        </md-header>

                        <md-bold>
                            <button type="button" class="p-1.5 rounded-md hover:bg-neutral-700 text-neutral-400 hover:text-white transition-colors cursor-pointer" title="{{ __('livewire-markdown-editor::editor.toolbars.bold') }}">
                                <x-phosphor-text-b class="size-5" aria-hidden="true" />
                            </button>
                        </md-bold>

                        <md-italic>
                            <button type="button" class="p-1.5 rounded-md hover:bg-neutral-700 text-neutral-400 hover:text-white transition-colors cursor-pointer" title="{{ __('livewire-markdown-editor::editor.toolbars.italic') }}">
                                <x-phosphor-text-italic class="size-5" aria-hidden="true" />
                            </button>
                        </md-italic>

                        <md-quote>
                            <button type="button" class="p-1.5 rounded-md hover:bg-neutral-700 text-neutral-400 hover:text-white transition-colors cursor-pointer" title="{{ __('livewire-markdown-editor::editor.toolbars.quote') }}">
                                <x-phosphor-quotes class="size-5" aria-hidden="true" />
                            </button>
                        </md-quote>

                        <md-code>
                            <button type="button" class="p-1.5 rounded-md hover:bg-neutral-700 text-neutral-400 hover:text-white transition-colors cursor-pointer" title="{{ __('livewire-markdown-editor::editor.toolbars.code') }}">
                                <x-phosphor-code-simple class="size-5" aria-hidden="true" />
                            </button>
                        </md-code>

                        <md-link>
                            <button type="button" class="p-1.5 rounded-md hover:bg-neutral-700 text-neutral-400 hover:text-white transition-colors cursor-pointer" title="{{ __('livewire-markdown-editor::editor.toolbars.link') }}">
                                <x-phosphor-link class="size-5" aria-hidden="true" />
                            </button>
                        </md-link>

                        <div class="w-px h-5 bg-neutral-700 mx-1"></div>

                        <md-unordered-list>
                            <button type="button" class="p-1.5 rounded-md hover:bg-neutral-700 text-neutral-400 hover:text-white transition-colors cursor-pointer" title="{{ __('livewire-markdown-editor::editor.toolbars.unordered_list') }}">
                                <x-phosphor-list-bullets class="size-5" aria-hidden="true" />
                            </button>
                        </md-unordered-list>

                        <md-ordered-list>
                            <button type="button" class="p-1.5 rounded-md hover:bg-neutral-700 text-neutral-400 hover:text-white transition-colors cursor-pointer" title="{{ __('livewire-markdown-editor::editor.toolbars.ordered_list') }}">
                                <x-phosphor-list-numbers class="size-5" aria-hidden="true" />
                            </button>
                        </md-ordered-list>

                        <md-task-list>
                            <button type="button" class="p-1.5 rounded-md hover:bg-neutral-700 text-neutral-400 hover:text-white transition-colors cursor-pointer" title="{{ __('livewire-markdown-editor::editor.toolbars.task_list') }}">
                                <x-phosphor-list-checks class="size-5" aria-hidden="true" />
                            </button>
                        </md-task-list>

                        <div class="w-px h-5 bg-neutral-700 mx-1"></div>

                        <md-mention>
                            <button type="button" class="p-1.5 rounded-md hover:bg-neutral-700 text-neutral-400 hover:text-white transition-colors cursor-pointer" title="{{ __('livewire-markdown-editor::editor.toolbars.mention') }}">
                                <x-phosphor-at-duotone class="size-5" aria-hidden="true" />
                            </button>
                        </md-mention>

                        @if ($showUpload)
                            @php
                                $uploadConfig = config('livewire-markdown-editor.upload');
                                $acceptAttribute = $uploadConfig['images_only']
                                    ? 'image/*'
                                    : collect($uploadConfig['allowed_extensions'])->map(fn ($ext) => '.'.$ext)->implode(',');
                            @endphp

                            <label class="p-1.5 rounded-md hover:bg-neutral-700 cursor-pointer text-neutral-400 hover:text-white transition-colors" title="{{ __('livewire-markdown-editor::editor.toolbars.attach_files') }}">
                                <input type="file" wire:model="attachments" multiple accept="{{ $acceptAttribute }}" class="hidden">
                                <x-phosphor-images-duotone class="size-5" aria-hidden="true" />
                            </label>
                        @endif
                    </markdown-toolbar>
                </div>
            @endif
        </div>

        <!-- Textarea (mode Write) -->
        <textarea
            x-show="!preview"
            id="markdown-textarea-{{ $this->getId() }}"
            wire:model.live.debounce.500ms="content"
            rows="{{ $rows }}"
            placeholder="{{ $placeholder }}"
            @class([
                'w-full h-auto p-4 border-0 max-h-138 resize-y focus:outline-hidden focus:ring-0 text-neutral-100 bg-neutral-900 placeholder:text-neutral-500',
                $class
            ])
        ></textarea>

        <!-- Preview -->
        <div
            x-show="preview"
            class="p-4 min-h-50 bg-neutral-900 text-neutral-200"
            wire:loading.class="opacity-50"
        >
            @if (blank($content))
                <div class="text-sm font-medium text-neutral-500">
                    {{ __('livewire-markdown-editor::editor.empty_preview') }}
                </div>
            @else
                <div class="prose prose-invert max-w-none prose-headings:font-heading prose-a:text-red-400 hover:prose-a:text-red-300">
                    {!! $this->parsedContent !!}
                </div>
            @endif
        </div>
    </div>
    <div class="mt-2 flex items-center justify-between">
        <a href="https://docs.github.com/en/get-started/writing-on-github/getting-started-with-writing-and-formatting-on-github/basic-writing-and-formatting-syntax" target="_blank" class="inline-flex items-center px-2 py-1 gap-1.5 rounded-md border border-neutral-700 bg-neutral-800 text-neutral-400 hover:text-white hover:bg-neutral-700 text-xs font-medium transition-colors">
            <x-phosphor-markdown-logo-duotone class="size-4" aria-hidden="true" />
            <span>
                {{ __('livewire-markdown-editor::editor.styling') }}
            </span>
        </a>

        @if ($showUpload)
            <div wire:loading.flex wire:target="attachments" class="flex items-center gap-2 text-xs text-neutral-400">
                <svg
                    class="animate-spin size-4 text-red-500"
                    fill="none"
                    viewBox="0 0 24 24"
                >
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" />
                    <path
                        class="opacity-75"
                        fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                    />
                </svg>
                {{ __('livewire-markdown-editor::editor.uploading') }}
            </div>
        @endif
    </div>
</div>
