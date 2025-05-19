@extends('layouts.master')
@section('title', 'CodeWithUs')
@section('content')
    <div>
        <div class="max-w-7xl mx-auto">
            <!--    Blog content-->
            <div class="grid grid-cols-1 md:grid-cols-12 sm:grid-cols-12 gap-3">
                <!--Left Sidebar-->
                <div class="col-span-8">
                    <section class="py-10 md:py-20">
                        <div class=" pb-3 md:pb-0 border shadow rounded-xl">
                            <div>
                                <h1 class="py-1 text-3xl font-bold text-center md:text-left text-primary space-y-8 mb-2 m-4">
                                    {{ $all['blogs']->name }}
                                </h1>
                                <div class="pt-5 md:pt-2 mb-8 text-sm text-black-lighter-3 text-center md:text-left m-4">
                                    {{ $all['blogs']->created_at->toDateString() }}, {{ $all['blogs']->author }}
                                    <div class="border-b-2 border-b-primary w-10 mb-3 border-b-primary"></div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-6 mt-6">
                            <img src="{{ env('MIX_IMAGE_URL') }}/images/blogs/{{ $all['blogs']->image_name }}"
                                alt=" {{ $all['blogs']->name }}" class="h-auto w-full object-cover rounded-xl" />
                        </div>
                        <div class=" pb-3 md:pb-0 px-4">
                            <div class="space-y-3 text-justify">
                                <p>
                                    <span style="background-color: transparent;">{!! $all['blogs']->description !!}</span>
                                </p>
                            </div>
                        </div>
                        <div class="rounded-xl bg-white shadow p-3 px-10 border  border-2 mt-8">
                            <!--          Book A FREE Trial-->
                            <div class="space-y-5">
                                <p class="py-1 text-lg font-bold text-primary text-center">
                                    {{ trans('blogs.book_a_free_trial') }}
                                </p>
                                <p class="text-center md:text-left">
                                <p class="text-center">
                                    <span style="background-color: transparent;">
                                        {{ trans('blogs.book_a_free_trial_description') }}
                                    </span>
                                </p>
                                <ul class="px-3 py-5 md:pr-10 md:flex md:justify-center hidden md:block">
                                    <li class="pl-10 md:px-1">
                                        <a href="/coding_classes#trial_form" target="_blank"
                                            class="shadow-primary space-x-1 inline-flex items-center px-4 py-2 text-sm border border-primary rounded-full text-white bg-primary hover:bg-primary-darker-1 hover:text-white focus:outline-none ">
                                            <span>Book Now</span>
                                            <svg width="13" height="11" viewBox="0 0 13 11" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 5.5H12M12 5.5L8.03644 1.5M12 5.5L8.03644 9.5" stroke="white"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </section>
                </div>

                <!--Right Sidebar-->
                <div class="col-span-4 hidden md:block ">
                    <section class="py-10 md:py-20 max-w-7xl mx-auto ">
                        <div class="rounded-xl shadow p-3 px-10 bg-white">
                            <div>
                                <p class="py-1 text-lg font-bold text-center md:text-left text-primary">
                                    {{ trans('blogs.book_a_free_trial') }}
                                </p>
                                <div class="border-b-2 w-10 mb-5"></div>
                                <p class="text-center md:text-left">
                                <p>
                                    <span style="background-color: transparent;">
                                        {{ trans('blogs.book_a_free_trial_description') }}
                                    </span>
                                </p>
                                <ul class="px-3 py-5 md:pr-10 md:flex md:justify-center hidden md:block">
                                    <li class="pl-10 md:px-1">
                                        <a href="/coding_classes#trial_form"
                                            class="shadow-primary space-x-1 inline-flex items-center px-4 py-2 text-sm border border-primary rounded-full text-white bg-primary hover:bg-primary-darker-1 hover:text-white focus:outline-none ">
                                            <span>Book Now</span>
                                            <svg width="13" height="11" viewBox="0 0 13 11" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 5.5H12M12 5.5L8.03644 1.5M12 5.5L8.03644 9.5" stroke="white"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                </path>
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                                </p>
                            </div>
                            <div>
                                <p class="py-1 text-lg font-bold text-center md:text-left text-primary">
                                    {{ trans('blogs.popular_posts') }}
                                </p>
                                <div class="border-b-2 w-10 mb-2"></div>
                                <p class="text-center md:text-left">
                                <ul class=" py-5 md:pr-10 hidden md:block text-gray-500 text-md">
                                    @foreach ($all['popular_posts'] as $popular_post)
                                        <li class="hover:ml-2 transition-all border-b py-3">
                                            <span>
                                                @if ($popular_post->type === 'link')
                                                    <a href="/blogs/{{ $popular_post->external_link }}" target="_blank"
                                                        class="flex items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                            viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd"
                                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                        <span>{{ $popular_post->name }}</span>
                                                    </a>
                                                @else
                                                    <a href="/blogs/{{ $popular_post->slug }}" class="flex items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                            viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd"
                                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                        <span>{{ $popular_post->name }}</span>
                                                    </a>
                                                @endif
                                            </span>
                                        </li>
                                    @endforeach
                                </ul>
                                </p>
                            </div>
                            <x-blog-sidebar :all="$all" />
                        </div>
                    </section>
                </div>
            </div>
        </div>

        @include('layouts.relatedstory')
        @include('layouts.FooterIcons')
    </div>
@endsection
