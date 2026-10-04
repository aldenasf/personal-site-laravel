<nav class="full z-50 flex max-w-screen bg-neutral-900 px-4 text-gray-200 lg:p-0">
    <ul class="mx-auto my-3 flex max-w-4xl flex-row flex-wrap justify-start">
        @foreach ($links as $name => $redirect)
            <x-navbar.link :redirect="$redirect" :name="$name" :selected="$page == $redirect" ></x-navbar.link>
        @endforeach
    </ul>
</nav>
