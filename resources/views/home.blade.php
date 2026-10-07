<x-layout name="Home" page="/">
    <div class="mx-auto my-10 flex max-w-screen flex-col justify-center px-4 lg:max-w-4xl lg:px-0">
        <h1 class="text-3xl font-bold">hi, i'm <span class="text-red-400">alden!</span></h1>
        <p class="text-neutral-200">
            17-year-old <span class="text-red-400">Software Engineering student</span> and <span class="text-red-400"
                >self-taught developer</span
            > from Indonesia.
        </p>
        <hr class="my-8" />
        <h2 id="about-me" class="mr-6 pb-6 text-2xl font-semibold">About Me</h2>
        <section class="mb-4 rounded-md border-2 border-neutral-600 bg-neutral-800 p-3">
            <p class="text-lg">
                I am a <span class="underline decoration-zinc-500 underline-offset-2"
                    >Software Engineering (RPL) student</span
                > from Indonesia at SMKN 1 Jenangan and a <span class="underline decoration-zinc-500 underline-offset-2"
                    >self-taught developer since 2020</span
                >. I mostly do server-side stuff like Discord bots, but I also enjoy exploring networking, game modding,
                electronics, and tech stuff in general.
            </p>
        </section>
        <section class="flex flex-col gap-4 lg:flex-row">
            <div
                class="mb-0 flex w-full justify-center rounded-md border-2 border-neutral-600 bg-neutral-800 p-3 lg:mb-4 lg:w-1/3"
            >
                <div class="flex items-center space-x-2">
                    {{-- <Icon class="text-xl" name="mdi:clock" /> --}}
                        <x-mdi-clock class="w-5 h-5" />
                    <span class="text-neutral-500">UTC+7</span><span id="clock" class="w-16 text-start">19:59:42</span>
                </div>
            </div>
            <div
                class="mb-0 flex w-full justify-center rounded-md border-2 border-neutral-600 bg-neutral-800 p-3 lg:mb-4 lg:w-1/3"
            >
                <div class="flex items-center space-x-2">
                        <x-mdi-calendar class="w-5 h-5" />
                    <span id="date" class="">October 6, 2026</span>
                </div>
            </div>
            <a
                href="/projects"
                class="mb-0 flex w-full justify-between rounded-md border-2 border-red-600 bg-red-900 p-3 duration-150 ease-in-out hover:bg-red-700 lg:mb-4 lg:w-1/3"
            >
                <div class="flex items-center space-x-2">
                    <x-mdi-file-document class="w-5 h-5" /><span>Projects</span>
                </div>
                <x-mdi-arrow-top-right  class="w-5 h-5" />
            </a>
        </section>

        <h2 id="socials" class="mr-6 py-6 text-2xl font-semibold">Socials</h2>
        <section class="grid grid-cols-1 gap-4 lg:grid-cols-3">
            <x-social-card platform="GitHub" url="https://github.com/aldenasf">
                <x-mdi-github class="w-7 h-7 mr-2" />
            </x-social-card>
            <x-social-card platform="Discord" url="https://discord.com/users/529424782438170679">
                <x-si-discord class="w-7 h-7 mr-2" />
            </x-social-card>
            <x-social-card platform="AniList" url="https://anilist.co/user/aldenasf">
                <x-si-anilist class="w-7 h-7 mr-2" />
            </x-social-card>
        </section>


        <h2 id="projects" class="mr-6 py-6 text-2xl font-semibold">Projects</h2>
        <section class="grid grid-cols-1 gap-4 lg:grid-cols-2">
            <x-project-card
                author="aldenasf"
                repo="personal-site-laravel"
                description="Personal site, but in Laravel!"
                language="Blade" url="https://github.com/aldenasf/personal-site-laravel"
            />
            <x-project-card
                author="aldenasf"
                repo="personal-site-laravel"
                description="Personal site, but in Laravel!"
                language="Blade" url="https://github.com/aldenasf/personal-site-laravel"
            />
            <x-project-card
                author="aldenasf"
                repo="personal-site-laravel"
                description="Personal site, but in Laravel!"
                language="Blade" url="https://github.com/aldenasf/personal-site-laravel"
            />
            <x-project-card
                author="aldenasf"
                repo="personal-site-laravel"
                description="Personal site, but in Laravel!"
                language="Blade" url="https://github.com/aldenasf/personal-site-laravel"
            />
        </section>

        <h2 class="mr-6 py-6 text-2xl font-semibold">Tech Stack</h2>
        <section class="flex flex-col">
            <x-skill-container text="Backend">
                <x-skill-card
                    text="Node.js"
                    icon="https://nodejs.org/static/logos/jsIconGreen.svg"
                    url="https://nodejs.org/"
                />
                <x-skill-card
                    text="TypeScript"
                    icon="https://upload.wikimedia.org/wikipedia/commons/f/f5/Typescript.svg"
                    url="https://www.typescriptlang.org/"
                />
                <x-skill-card
                    text="Python"
                    icon="https://s3.dualstack.us-east-2.amazonaws.com/pythondotorg-assets/media/files/python-logo-only.svg"
                    url="https://python.org/"
                />
                <x-skill-card
                    text="Discord.js"
                    icon="https://avatars.githubusercontent.com/u/26492485?s=200&v=4"
                    url="https://discord.js.org/"
                />
            </x-skill-container>
            <x-skill-container text="Frontend">
                <x-skill-card
                    text="HTML"
                    icon="https://www.w3.org/html/logo/downloads/HTML5_Badge.svg"
                    url="https://en.wikipedia.org/wiki/HTML"
                />
                <x-skill-card
                    text="CSS"
                    icon="https://upload.wikimedia.org/wikipedia/commons/a/ab/Official_CSS_Logo.svg"
                    url="https://en.wikipedia.org/wiki/CSS"
                />
                <x-skill-card
                    text="JavaScript"
                    icon="https://upload.wikimedia.org/wikipedia/commons/6/6a/JavaScript-logo.png"
                    url="https://en.wikipedia.org/wiki/JavaScript"
                />
                <x-skill-card
                    text="Astro"
                    icon="https://astro.build/assets/press/astro-icon-light-gradient.svg"
                    url="https://astro.build/"
                />
                <x-skill-card
                    text="Tailwind CSS"
                    icon="https://upload.wikimedia.org/wikipedia/commons/d/d5/Tailwind_CSS_Logo.svg"
                    url="https://tailwindcss.com/"
                />
            </x-skill-container>
            <x-skill-container text="Tools">
                <x-skill-card
                    text="pnpm"
                    icon="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIj8+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgdmVyc2lvbj0iMS4xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiBwcmVzZXJ2ZUFzcGVjdFJhdGlvPSJ4TWlkWU1pZCBtZWV0IiB2aWV3Qm94PSI3Ni41ODk4NzI0NDg5Nzk1OCA0NCAxNjQuMDA3NzU1MTAyMDQwNjggMTY0IiB3aWR0aD0iMTYwLjAxIiBoZWlnaHQ9IjE2MCI+PGRlZnM+PHBhdGggZD0iTTIzNy42IDk1TDE4Ny42IDk1TDE4Ny42IDQ1TDIzNy42IDQ1TDIzNy42IDk1WiIgaWQ9ImI0NXZkVEQ4aHMiPjwvcGF0aD48cGF0aCBkPSJNMTgyLjU5IDk1TDEzMi41OSA5NUwxMzIuNTkgNDVMMTgyLjU5IDQ1TDE4Mi41OSA5NVoiIGlkPSJhNDBXdHhJbDhkIj48L3BhdGg+PHBhdGggZD0iTTEyNy41OSA5NUw3Ny41OSA5NUw3Ny41OSA0NUwxMjcuNTkgNDVMMTI3LjU5IDk1WiIgaWQ9ImgyQ045QUVFcGUiPjwvcGF0aD48cGF0aCBkPSJNMjM3LjYgMTUwTDE4Ny42IDE1MEwxODcuNiAxMDBMMjM3LjYgMTAwTDIzNy42IDE1MFoiIGlkPSJkcXY1MTMzRzgiPjwvcGF0aD48cGF0aCBkPSJNMTgyLjU5IDE1MEwxMzIuNTkgMTUwTDEzMi41OSAxMDBMMTgyLjU5IDEwMEwxODIuNTkgMTUwWiIgaWQ9ImIxTHY3OXlwdm0iPjwvcGF0aD48cGF0aCBkPSJNMTgyLjU5IDIwNUwxMzIuNTkgMjA1TDEzMi41OSAxNTVMMTgyLjU5IDE1NUwxODIuNTkgMjA1WiIgaWQ9Imh5MUlaV3dMWCI+PC9wYXRoPjxwYXRoIGQ9Ik0yMzcuNiAyMDVMMTg3LjYgMjA1TDE4Ny42IDE1NUwyMzcuNiAxNTVMMjM3LjYgMjA1WiIgaWQ9ImFrUWZqeFFlcyI+PC9wYXRoPjxwYXRoIGQ9Ik0xMjcuNTkgMjA1TDc3LjU5IDIwNUw3Ny41OSAxNTVMMTI3LjU5IDE1NUwxMjcuNTkgMjA1WiIgaWQ9ImJkU3J3RTVwayI+PC9wYXRoPjwvZGVmcz48Zz48Zz48dXNlIHhsaW5rOmhyZWY9IiNiNDV2ZFREOGhzIiBvcGFjaXR5PSIxIiBmaWxsPSIjZjlhZDAwIiBmaWxsLW9wYWNpdHk9IjEiPjwvdXNlPjwvZz48Zz48dXNlIHhsaW5rOmhyZWY9IiNhNDBXdHhJbDhkIiBvcGFjaXR5PSIxIiBmaWxsPSIjZjlhZDAwIiBmaWxsLW9wYWNpdHk9IjEiPjwvdXNlPjwvZz48Zz48dXNlIHhsaW5rOmhyZWY9IiNoMkNOOUFFRXBlIiBvcGFjaXR5PSIxIiBmaWxsPSIjZjlhZDAwIiBmaWxsLW9wYWNpdHk9IjEiPjwvdXNlPjwvZz48Zz48dXNlIHhsaW5rOmhyZWY9IiNkcXY1MTMzRzgiIG9wYWNpdHk9IjEiIGZpbGw9IiNmOWFkMDAiIGZpbGwtb3BhY2l0eT0iMSI+PC91c2U+PC9nPjxnPjx1c2UgeGxpbms6aHJlZj0iI2IxTHY3OXlwdm0iIG9wYWNpdHk9IjEiIGZpbGw9IiNmZmZmZmYiIGZpbGwtb3BhY2l0eT0iMSI+PC91c2U+PC9nPjxnPjx1c2UgeGxpbms6aHJlZj0iI2h5MUlaV3dMWCIgb3BhY2l0eT0iMSIgZmlsbD0iI2ZmZmZmZiIgZmlsbC1vcGFjaXR5PSIxIj48L3VzZT48L2c+PGc+PHVzZSB4bGluazpocmVmPSIjYWtRZmp4UWVzIiBvcGFjaXR5PSIxIiBmaWxsPSIjZmZmZmZmIiBmaWxsLW9wYWNpdHk9IjEiPjwvdXNlPjwvZz48Zz48dXNlIHhsaW5rOmhyZWY9IiNiZFNyd0U1cGsiIG9wYWNpdHk9IjEiIGZpbGw9IiNmZmZmZmYiIGZpbGwtb3BhY2l0eT0iMSI+PC91c2U+PC9nPjwvZz48L3N2Zz4="
                    url="https://pnpm.io/"
                />
                <x-skill-card
                    text="Git"
                    icon="https://git-scm.com/images/logos/downloads/Git-Icon-1788C.svg"
                    url="https://git-scm.com/"
                />
            </x-skill-container>
        </section>
    </div>
</x-layout>
