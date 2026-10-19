@php
  /** @var \App\Models\Post $post */
@endphp

<x-blog-layout :title="$post->title" :description="$post->description" :date="$post->created_at" :pinned="$post->pinned"
  :updated="$post->updated_at" :imageURL="asset($post->image)">
  <x-markdown class="prose prose-base prose-neutral prose-invert lg:prose-lg max-w-none p-4 md:p-8 lg:max-w-5xl lg:p-0">
    {{ $post->content }}
  </x-markdown>
</x-blog-layout>