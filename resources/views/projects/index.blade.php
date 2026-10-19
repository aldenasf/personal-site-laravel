@php
    /** @var \App\Models\Post|null $highlightedPost */
    /** @var \Illuminate\Database\Eloquent\Collection<int, \App\Models\Post> $posts */
@endphp

<x-layout page="/projects" title="Projects">
    <div class="flex items-center justify-center">
        <div class="flex max-w-4xl flex-col items-center justify-center px-4 py-2 lg:py-8">
            <div id="pinned-post" class="flex flex-col">
                <div class="mb-4 flex justify-center">
                    <h1 class="text-xl font-semibold lg:text-3xl">
                        {{-- { ? "Pinned Post" : "Latest Post"} --}}
                        @if ($pinnedPost !== null)
                            Pinned Post
                        @else
                            Latest Post
                        @endif
                    </h1>
                </div>
                <div class="flex">
                    {{-- {
                    highlightedPost ? (
                    <BlogCard highlighted pinned={pinnedPostExists} {...getCardProps(highlightedPost)} />
                    ) : null
                    } --}}
                    @if ($highlightedPost !== null)
                        <x-post-card :title="$highlightedPost->title" :description="$highlightedPost->description"
                            :date="$highlightedPost->created_at" :updated="$highlightedPost->updated_at"
                            :image="asset($highlightedPost->image)" :highlighted="true" :pinned="$highlightedPost->pinned"
                            :href="route('projects.shows', $highlightedPost)" />
                    @endif
                </div>
            </div>
            <div id="posts" class="mt-4 grid grid-cols-1 gap-4 lg:grid-cols-2">
                @foreach ($posts as $post)

                    <x-post-card :title="$post->title" :description="$post->description" :date="$post->created_at"
                        :updated="$post->updated_at" :image="asset($post->image)" :highlighted="true"
                        :pinned="$post->pinned" :href="route('projects.shows', $post)" />
                @endforeach
                {{-- {posts.map((post) =>
                <BlogCard {...getCardProps(post)} />)} --}}
                {{-- {{ $posts }} --}}
            </div>
        </div>
    </div>
</x-layout>