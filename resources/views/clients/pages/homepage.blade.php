@extends('clients.layouts.main')

@section('title', '')
@section('description', "")
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css" />
@endsection
@section('content')
<div class="container mx-auto">
    <div class="grid grid-cols-5  pb-16 lg:pb-20">
        <div class="col-span-5 md:col-span-3 flex flex-col justify-center gap-6 ">
            <h1 class="font-body text-4xl font-semibold text-primary dark:text-white md:text-4xl lg:text-5xl">
                {{ $post['post_today']->translation->title}}
            </h1>
            <p class="font-body text-xl font-light text-primary dark:text-gray">
                {{ $post['post_today']->translation->description }}
            </p>
        </div>
        <div class="col-span-2 hidden md:flex justify-center">
            <img class="animate-spin-custom md:w-4/5 aspect-square object-contain" src="{{ asset('assets/images/astrology-circle.png') }}" alt="">
        </div>
    </div>
    <div class="responsive" data-slick='{"slidesToShow": 4, "slidesToScroll": 4}'>
        <div class="!flex justify-center ">
            <img class="aquarius max-w-[150px]">
        </div>
        <div class="!flex justify-center ">
            <img class="aries max-w-[150px]">
        </div>
        <div class="!flex justify-center ">
            <img class="cancer max-w-[150px]">
        </div>
        <div class="!flex justify-center ">
            <img class="capricorn max-w-[150px]">
        </div>
        <div class="!flex justify-center ">
            <img class="gemini max-w-[150px]">
        </div>
        <div class="!flex justify-center ">
            <img class="leo max-w-[150px]">
        </div>
        <div class="!flex justify-center ">
            <img class="libra max-w-[150px]">
        </div>
        <div class="!flex justify-center ">
            <img class="pisces max-w-[150px]">
        </div>
        <div class="!flex justify-center ">
            <img class="sagittarius max-w-[150px]">
        </div>
        <div class="!flex justify-center ">
            <img class="scorpio max-w-[150px]">
        </div>
        <div class="!flex justify-center ">
            <img class="taurus max-w-[150px]">
        </div>
        <div class="!flex justify-center ">
            <img class="virgo max-w-[150px]">
        </div>
    </div>

    <div class="border-b border-grey-lighter py-16 lg:py-20">
        @foreach ($post['content_post_today'] as $key => $post)
        @if ($key % 2 == 0)
        <div class="grid grid-cols-12 mb-20 gap-10 " id="{{$post->name}}">
            <div class="col-span-5 md:col-span-6 items-center pb-6 animate-slide from-left">
                <h3 class="ml-3 font-body text-2xl font-semibold text-primary dark:text-white">
                    {{ __('common.' . $post->name) }}
                </h3>
                <div class="flex justify-center items-center w-full h-fit">
                    <img class="h-56 object-contain {{ strtolower($post->name) }}" alt="{{ __('common.' . $post->name) }}" />
                </div>
            </div>
            <div class="col-span-7 md:col-span-6 animate-slide from-right">
                <p class="font-body font-light text-primary dark:text-white">
                    {{ $post->content }}
                </p>
            </div>
        </div>
        @else
        <div class="grid grid-cols-12 mb-20 gap-10" id="{{$post->name}}">
            <div class="col-span-7 md:col-span-6 animate-slide from-right">
                <p class="font-body font-light text-primary dark:text-white">
                    {{ $post->content }}
                </p>
            </div>
            <div class="col-span-5 md:col-span-6 items-center pb-6 animate-slide from-left">
                <h3 class="ml-3 font-body text-2xl font-semibold text-primary dark:text-white">
                    {{ __('common.' . $post->name) }}
                </h3>
                <div class="flex justify-center items-center w-full h-fit">
                    <img class="h-56 object-contain {{ strtolower($post->name) }}" alt="{{ __('common.' . $post->name) }}" />
                </div>
            </div>
        </div>

        @endif
        @endforeach
    </div>
</div>

@endsection

@section('javascript')
<script type="text/javascript" src="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.min.js"></script>

<script>
    $('.responsive').slick({
        dots: false,
        infinite: false,
        autoplay: true,
        autoplaySpeed: 4000,
        slidesToShow: 5,
        slidesToScroll: 2,
        arrows: false,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 2,
                    infinite: false,
                    dots: false
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            }
        ]
    });
    document.addEventListener('DOMContentLoaded', function() {

        let observerOptions = {
            threshold: 0.1
        };

        let observer = new IntersectionObserver(function(entries, observer) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    if (entry.target.classList.contains('from-left')) {
                        entry.target.classList.add('animate-slide-in-left');
                    } else {
                        entry.target.classList.add('animate-slide-in-right');
                    }
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        document.querySelectorAll('.animate-slide').forEach(item => {
            observer.observe(item);
        });
    })
</script>
@endsection