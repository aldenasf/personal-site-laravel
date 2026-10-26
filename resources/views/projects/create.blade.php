<x-layout page="/projects" title="Projects">
    <div>
        <form action="{{ route('projects.store') }}" method="post" class="flex flex-col max-w-lg">
            <label for="title">title</label>
            <input class="bg-white text-black" type="text" name="title" id="title">
            <label for="description">description</label>
            <input class="bg-white text-black" type="text" name="description" id="description">
            <label for="content">content</label>
            <input class="bg-white text-black" type="text" name="content" id="content">
            <label for="image">image</label>
            <input class="bg-white text-black" type="text" name="image" id="image">
            <label for="pinned">pinned</label>
            <input class="bg-white text-black" type="checkbox" name="pinned" id="pinned" value="1">
            <button type="submit">Submit</button>
        </form>
    </div>
</x-layout>
