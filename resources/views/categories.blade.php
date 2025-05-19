@extends('layouts.master')
@section('title')
    {{ $landing_page_category->title }} | Code With Us | Code With Us
@endsection
@section('content')
    <div>
        <section class="pb-0">
            <div class="relative max-w-full mx-auto ">
                <div class="relative px-8 overflow-hidden lg:px-16 page-banner-topic">
                    <div class="absolute inset-0  mix-blend-multiply">
                        <img src="/images/pages/banner.webp" alt="" class="w-full h-auto object-cover" />
                    </div>
                    <div class="absolute inset-0 mix-blend-multiply">
                        <img src="/images/pages/banner_overlay.webp" alt="" class="w-full h-auto object-cover" />
                    </div>
                    <div class="relative lg:top-1/4 -top-8">
                        <slot>
                            <h2 class="text-center text-3xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl py-10">
                                <span class="block text-white">{{ $landing_page_category->title }}</span>
                            </h2>
                        </slot>
                    </div>
                </div>
            </div>
        </section>
        <section class="relative z-20 -top-24 md:-top-32">
            <div
                class="md:flex md:items-center md:justify-center md:max-w-4xl md:mx-auto bg-white shadow-card rounded-3xl m-2 p-5">
                <p>{{ $landing_page_category->description }}</p>
            </div>
        </section>

        <section class="py-10 md:py-20 max-w-5xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                @foreach ($landing_page_category['landing_pages'] as $landing_page)
                    <div class="bg-white p-3 space-y-3 text-center">
                        <div class="flex justify-center">
                            <a href="/category-page/{{ $landing_page->slug }}" class="font-bold">
                                @if ($landing_page->image)
                                    <img loading="lazy" class="w-52 h-52 rounded-3xl shadow object-cover"
                                        src="{{ env('MIX_IMAGE_URL') }}/images/images_landing_pages/{{ $landing_page->image }}">
                                @else
                                    <img loading="lazy" class="w-52 h-52 rounded-3xl shadow object-cover"
                                        src="/default_square.webp">
                                @endif
                            </a>
                        </div>
                        <p>
                            <a href="/category-page/{{ $landing_page->slug }}"
                                class="font-bold">{{ $landing_page->title }}</a>
                        </p>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection
