@extends('layouts.master')

@section('title', 'Code With Us')

@section('content')
    <div>
        <section class="pb-0">
            <div class="relative max-w-full mx-auto ">
                <div class="relative py-10 px-8 overflow-hidden lg:px-16 page-banner-topic">
                    <div class="absolute inset-0  mix-blend-multiply">
                        {{-- <img src="https://wbcomdesigns.com/wp-content/uploads/2017/01/blog-post-inspiration-for-WordPress.jpg"
                            alt="" class="w-full h-auto object-cover" /> --}}
                        <img src="/images/blog-banner.jpg" alt="" class="w-full h-auto object-cover" />
                    </div>
                    {{-- <div class="absolute inset-0 mix-blend-multiply">
                        <img v-if="image_overlay" :src="image_overlay" alt="" class="w-full h-auto object-cover" />
                    </div> --}}
                </div>
            </div>
        </section>
        @if ($data['blog_locations'] != null)
            <section class="relative z-20 -top-14 md:-top-10">
                <div
                    class="md:flex md:items-center shadow-primary md:justify-center md:space-x-10 md:max-w-3xl md:mx-auto bg-white shadow-card rounded-3xl m-2 p-2 text-center">
                    <div class="md:text-left">
                        <h4>{{ $data['blog_locations']->name }}</h4>
                    </div>
                </div>
            </section>
        @endif
        <div class="max-w-7xl mx-auto">
            <!--    Blog content-->
            @if ($data['blog_locations'] != null)
                <div class="grid grid-cols-1 md:grid-cols-12 sm:grid-cols-12 gap-3">
                    <div class="col-span-8">
                        <section class="py-10 md:py-20 ">
                            <div class="grid grid-cols-1 md:grid-cols-1 px-3 md:px-0">
                                @foreach ($data['popular_blogs'] as $blog)
                                    <div
                                        class="flex-row items-stretch md:flex md:space-x-5 bg-white text-black-lighter-1 m-1 rounded-xl shadow ">
                                        @if ($blog->image_name)
                                            <img loading="lazy"
                                                src="{{ env('MIX_IMAGE_URL') }}/images/blogs/{{ $blog->image_name }}"
                                                alt="{{ $blog->name }}"
                                                class="md:w-2/5 rounded-t-xl md:rounded-none md:rounded-l-xl w-full h-64 md:h-auto object-cover">
                                        @else
                                            <img loading="lazy" src="/images/blogs/default.jpg"
                                                class="md:w-2/5 rounded-t-xl md:rounded-none md:rounded-l-xl w-full h-64 md:h-auto object-cover">
                                        @endif
                                        <div class="flex flex-col flex-1 pb-3 md:pb-0">
                                            <div class="px-3">
                                                <div
                                                    class="pt-5 md:pt-2 text-sm text-black-lighter-3 text-center md:text-left">
                                                    {{ $blog->created_at->toDateString() }}, <span
                                                        class="capitalize">{{ $blog->author }}</span>
                                                </div>
                                                <p class="py-1 text-lg font-bold text-center md:text-left text-primary">
                                                    @if ($blog->type === 'link')
                                                        <span>
                                                            <a href="{{ $blog->external_link }}" target="_blank"
                                                                class="hover:text-primary-darker-1 focus:outline-none">{{ $blog->name }}</a>
                                                        </span>
                                                    @else
                                                        <span>
                                                            <a href="/blogs/locations/{{ $data['blog_locations']['slug'] }}/{{ $blog->slug }}"
                                                                target="_blank"
                                                                class="hover:text-primary-darker-1 focus:outline-none">{{ $blog->name }}</a>
                                                        </span>
                                                    @endif
                                                </p>
                                                <p class="text-center md:text-left">
                                                    <span
                                                        style="background-color: transparent;">{{ substr(strip_tags($blog->description), 0, 300) }}</span>
                                                </p>
                                            </div>
                                            @if ($blog->type === 'link')
                                                <span class="flex justify-center md:justify-start px-3 mt-1">
                                                    <a href="{{ $blog->external_link }}" target="_blank"
                                                        class="text-primary underline text-sm text-center md:text-right pr-4">READMORE</a>
                                                </span>
                                            @else
                                                <span class="flex justify-center md:justify-start px-3 mt-1">
                                                    <a href="/blogs/locations/{{ $data['blog_locations']['slug'] }}/{{ $blog->slug }}"
                                                        target="_blank"
                                                        class="text-primary underline text-sm text-center md:text-right pr-4">READMORE</a>
                                                </span>
                                            @endif
                                            <div
                                                class="mt-24 py-3 border-t-2 flex items-center justify-between px-5 md:justify-start space-x-5">
                                                <a href="#" class="flex items-center space-x-2 text-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                    </svg>
                                                    <span>{{ $blog->author }}</span>
                                                </a>
                                                <a href="/blogs/categories/{{ $blog->category->slug }}"
                                                    class="flex items-center space-x-2 text-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                                        <path
                                                            d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                                    </svg>
                                                    <span>{{ $blog->category->name }}</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div>
            @endforeach
        </div>
        <div>
        </div>
        </section>
    </div>

    <!--Right Sidebar-->
    <x-blog-sidebar :all="$data" />

    </div>
    @endif
    @include('layouts.FooterIcons')
    </div>

    </div>

@endsection
