<!DOCTYPE html>
<html lang="en">

<x-layout.head>
    <title>{{ $pageTitle }}</title>

    <meta property="og:title" content={{ $pageTitle }} />
    <meta
        property="og:description"
        content="Self-taught developer since 2020 and Software Engineering (RPL) student from Indonesia at SMKN 1 Jenangan. Building with TypeScript, Node.js, and Astro. Exploring hardware networking, game modding, and automation."
    />
    <meta property="og:type" content="website" />
    <meta property="og:url" content={{ request()->fullUrl() }} />
    <meta property="og:locale" content="en" />
    <meta property="og:image" content="https://avatars.githubusercontent.com/u/63831735?v=4" />

    <meta name="theme-color" content="#ff6467" data-react-helmet="true" />
    <link rel="icon" href="https://avatars.githubusercontent.com/u/63831735?v=4" />
</x-layout.head>

<x-layout.body>
    <header>
        <x-navbar :page="$page" />
    </header>

    <main>
        {{ $slot }}
    </main>

    <x-footer />
</x-layout.body>

</html>
