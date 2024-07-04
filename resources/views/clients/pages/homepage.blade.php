@extends('clients.layouts.main')

@section('title', '')
@section('description', "")
@section('content')
<div class="container mx-auto">
    <div class="border-b border-grey-lighter py-16 lg:py-20">
        <h1 class="pt-3 font-body text-4xl font-semibold text-primary dark:text-white md:text-4xl lg:text-5xl">
            {{ $post['post_today']->title}}
        </h1>
        <p class="pt-3 font-body text-xl font-light text-primary dark:text-white">
            {{ $post['post_today']->description }}
        </p>
    </div>

    <div class="border-b border-grey-lighter py-16 lg:py-20">
        @foreach ($post['content_post_today'] as $key => $post)
        @if ($key % 2 == 0)
        <div class="grid grid-cols-12 mb-20 gap-10">
            <div class="col-span-4 items-center pb-6">
                <img src="https://static.toiimg.com/thumb/msid-109322970,width-400,resizemode-4/109322970.jpg" alt="icon story" />
                <h3 class="ml-3 font-body text-2xl font-semibold text-primary dark:text-white">
                    My Story
                </h3>
            </div>
            <div class="col-span-8">
                <p class="font-body font-light text-primary dark:text-white">
                    {{ $post->content }}
                </p>
            </div>
        </div>
        @else
        <div class="grid grid-cols-12 mb-20 gap-10">
            <div class="col-span-8">
                <p class="font-body font-light text-primary dark:text-white">
                    {{ $post->content }}
                </p>
            </div>
            <div class="col-span-4 items-center pb-6">
                <img src="https://static.toiimg.com/thumb/msid-109322970,width-400,resizemode-4/109322970.jpg" alt="icon story" />
                <h3 class="ml-3 font-body text-2xl font-semibold text-primary dark:text-white">
                    My Story
                </h3>
            </div>
        </div>
        @endif
        @endforeach
    </div>
    <div class="py-16 lg:py-20">
        <div class="flex items-center pb-6">
            <img src="" alt="icon story" />
            <h3 class="ml-3 font-body text-2xl font-semibold text-primary dark:text-white">
                My Story
            </h3>
            <a href="/blog" class="flex items-center pl-10 font-body italic text-green transition-colors hover:text-secondary dark:text-green-light dark:hover:text-secondary">
                All posts
                <img src="" class="ml-3" alt="arrow right" />
            </a>
        </div>
        <div class="pt-8">
            <div class="border-b border-grey-lighter pb-8">
                <span class="mb-4 inline-block rounded-full bg-green-light px-2 py-1 font-body text-sm text-green">category</span>
                <a href="/post" class="block font-body text-lg font-semibold text-primary transition-colors hover:text-green dark:text-white dark:hover:text-secondary">Quis
                    hendrerit dolor magna eget est lorem ipsum dolor sit</a>
                <div class="flex items-center pt-4">
                    <p class="pr-2 font-body font-light text-primary dark:text-white">
                        July 19, 2020
                    </p>
                    <span class="font-body text-grey dark:text-white">//</span>
                    <p class="pl-2 font-body font-light text-primary dark:text-white">
                        4 min read
                    </p>
                </div>
            </div>
            <div class="border-b border-grey-lighter pt-10 pb-8">
                <div class="flex items-center">
                    <span class="mb-4 inline-block rounded-full bg-grey-light px-2 py-1 font-body text-sm text-blue-dark">category</span>
                    <span class="mb-4 ml-4 inline-block rounded-full bg-yellow-light px-2 py-1 font-body text-sm text-yellow-dark">category</span>
                </div>
                <a href="/post" class="block font-body text-lg font-semibold text-primary transition-colors hover:text-green dark:text-white dark:hover:text-secondary">Senectus
                    et netus et malesuada fames ac turpis egestas integer</a>
                <div class="flex items-center pt-4">
                    <p class="pr-2 font-body font-light text-primary dark:text-white">
                        June 30, 2020
                    </p>
                    <span class="font-body text-grey dark:text-white">//</span>
                    <p class="pl-2 font-body font-light text-primary dark:text-white">
                        5 min read
                    </p>
                </div>
            </div>
            <div class="border-b border-grey-lighter pt-10 pb-8">
                <span class="mb-4 inline-block rounded-full bg-blue-light px-2 py-1 font-body text-sm text-blue">category</span>
                <a href="/post" class="block font-body text-lg font-semibold text-primary transition-colors hover:text-green dark:text-white dark:hover:text-secondary">Vulputate
                    ut pharetra sit amet aliquam id diam maecenas ultricies</a>
                <div class="flex items-center pt-4">
                    <p class="pr-2 font-body font-light text-primary dark:text-white">
                        June 26, 2020
                    </p>
                    <span class="font-body text-grey dark:text-white">//</span>
                    <p class="pl-2 font-body font-light text-primary dark:text-white">
                        3 min read
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="pb-16 lg:pb-20">
        <div class="flex items-center pb-6">
            <img src="" alt="icon story" />
            <h3 class="ml-3 font-body text-2xl font-semibold text-primary dark:text-white">
                My Projects
            </h3>
        </div>
        <div>

            <a href=" / " class="mb-6 flex items-center justify-between border border-grey-lighter px-4 py-4 sm:px-6">
                <span class="w-9/10 pr-8">
                    <h4 class="font-body text-lg font-semibold text-primary dark:text-white">
                        TailwindCSS
                    </h4>
                    <p class="font-body font-light text-primary dark:text-white">
                        Rapidly build modern websites without ever leaving your HTML.
                    </p>
                </span>
                <span class="w-1/10">
                    <img src="" class="mx-auto" alt="chevron right" />
                </span>
            </a>

            <a href=" / " class="mb-6 flex items-center justify-between border border-grey-lighter px-4 py-4 sm:px-6">
                <span class="w-9/10 pr-8">
                    <h4 class="font-body text-lg font-semibold text-primary dark:text-white">
                        Maizzle
                    </h4>
                    <p class="font-body font-light text-primary dark:text-white">
                        Framework for Rapid Email Prototyping
                    </p>
                </span>
                <span class="w-1/10">
                    <img src="" class="mx-auto" alt="chevron right" />
                </span>
            </a>

            <a href=" / " class="mb-6 flex items-center justify-between border border-grey-lighter px-4 py-4 sm:px-6">
                <span class="w-9/10 pr-8">
                    <h4 class="font-body text-lg font-semibold text-primary dark:text-white">
                        Alpine.js
                    </h4>
                    <p class="font-body font-light text-primary dark:text-white">
                        Think of it like Tailwind for JavaScript.
                    </p>
                </span>
                <span class="w-1/10">
                    <img src="" class="mx-auto" alt="chevron right" />
                </span>
            </a>

            <a href=" / " class="mb-6 flex items-center justify-between border border-grey-lighter px-4 py-4 sm:px-6">
                <span class="w-9/10 pr-8">
                    <h4 class="font-body text-lg font-semibold text-primary dark:text-white">
                        PostCSS
                    </h4>
                    <p class="font-body font-light text-primary dark:text-white">
                        A tool for transforming CSS with JavaScript
                    </p>
                </span>
                <span class="w-1/10">
                    <img src="" class="mx-auto" alt="chevron right" />
                </span>
            </a>

        </div>
    </div>
</div>

@endsection

@section('javascript')
@endsection