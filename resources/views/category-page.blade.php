@extends('layouts.master')
@section('title')
    {{ $landing_page->title }} | Code With Us | Code With Us
@endsection
@section('content')
    <div>
        <section class="pb-0">
            <div class="relative max-w-full mx-auto ">
                <div class="relative py-10 px-8 overflow-hidden lg:px-16 page-banner-topic">
                    <div class="absolute inset-0  mix-blend-multiply">
                        <img src="/images/pages/banner.webp" alt="" class="w-full h-auto object-cover" />
                    </div>
                    <div class="absolute inset-0 mix-blend-multiply">
                        <img src="/images/pages/banner_overlay.webp" alt="" class="w-full h-auto object-cover" />
                    </div>
                    <div class="relative lg:top-1/4 -top-8">
                        <slot>
                            <h1 class="text-center text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl py-10">
                                <span class="block text-white">{{ $landing_page->title }}</span>
                            </h1>
                        </slot>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-10 md:py-20">
            <div class="md:max-w-5xl md:mx-auto bg-white shadow-card rounded-3xl m-2 p-5">
                <p>{!! $landing_page->short_description !!}</p>
            </div>
            <div class="md:max-w-5xl md:mx-auto bg-white shadow-card rounded-3xl m-2 p-5">
                <p>{!! $landing_page->long_description !!}</p>
            </div>
        </section>

        <section class="py-5 md:max-w-5xl md:mx-auto flex space-x-2">
            <a href="/coding_classes"
                class="shadow-primary space-x-1 inline-flex items-center px-4 py-2 text-sm border border-primary rounded-full text-white bg-primary hover:bg-primary-darker-1 hover:text-white focus:outline-none ">
                {{ trans('coding_classes.learn_more') }}
            </a>
            <a href="/coding_classes#trial_form"
                class="shadow-primary space-x-1 inline-flex items-center px-4 py-2 text-sm border border-secondary rounded-full text-white bg-secondary hover:bg-secondary hover:text-white focus:outline-none ">
                {{ trans('coding_classes.try_a_class_for_free') }}
            </a>
        </section>


        <div class="max-w-5xl bg-white py-10 rounded-2xl mx-auto shadow-card mb-10">
            @if ($landing_page['rss_data'])
                <section class="py-10 md:py-20">
                    <div class="md:max-w-5xl md:mx-auto">
                        <div class="p-5">
                            <h4>Related Articles</h4>
                        </div>
                        @foreach ($landing_page['rss_data'] as $key => $rss)
                            <div class="bg-white shadow-card rounded-3xl m-2 p-5">
                                <span class="text-primary">{{ ++$key }}</span>
                                @if ($rss->title == null)
                                    <a href="{{ $rss->link }}" target="_blank"> {{ $rss->link }}</a>
                                @else
                                    <a href="{{ $rss->link }}" target="_blank"> {{ $rss->title }}</a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </section>
            @endif
        </div>

        @include('layouts.FooterIcons')
    </div>
@endsection
