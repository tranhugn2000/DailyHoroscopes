@extends('clients.layouts.main')

@section('title', '')
@section('description', "")
@section('content')
<div class="container mx-auto">
    <div class="border-b border-grey-lighter py-16 lg:py-20">
        <h1 class="pt-3 font-body text-4xl font-semibold text-primary dark:text-white md:text-4xl lg:text-5xl">
            {{ $post['post_today']->translation->title}}
        </h1>
        <p class="pt-3 font-body text-xl font-light text-primary dark:text-white">
            {{ $post['post_today']->translation->description }}
        </p>
    </div>

    <div class="border-b border-grey-lighter py-16 lg:py-20">
        @foreach ($post['content_post_today'] as $key => $post)
        @if ($key % 2 == 0)
        <div class="grid grid-cols-12 mb-20 gap-10">
            <div class="col-span-6 items-center pb-6">
                <h3 class="ml-3 font-body text-2xl font-semibold text-primary dark:text-white">
                    {{ __('common.' . $post->name) }}
                </h3>
                <div class="flex justify-center items-center w-full h-fit">
                    <img class="h-56" src="{{ asset('assets/images/horoscope/' . $post->name . '.png') }}" alt="{{ __('common.' . $post->name) }}" />
                </div>
            </div>
            <div class="col-span-6">
                <p class="font-body font-light text-primary dark:text-white">
                    {{ $post->content }}
                </p>
            </div>
        </div>
        @else
        <div class="grid grid-cols-12 mb-20 gap-10">
            <div class="col-span-6">
                <p class="font-body font-light text-primary dark:text-white">
                    {{ $post->content }}
                </p>
            </div>
            <div class="col-span-6 items-center pb-6">
                <h3 class="ml-3 font-body text-2xl font-semibold text-primary dark:text-white">
                    {{ __('common.' . $post->name) }}
                </h3>
                <div class="flex justify-center items-center w-full h-fit">
                    <img class="h-56" src="{{ asset('assets/images/horoscope/' . $post->name . '.png') }}" alt="{{ __('common.' . $post->name) }}" />
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</div>

@endsection

@section('javascript')
@endsection