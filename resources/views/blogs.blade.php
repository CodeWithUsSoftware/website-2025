@extends('layouts.master')

@section('header_scripts')
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
@endsection

@section('title', 'Blogs | Code With Us | CodeWithUs')

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

        <section class="relative z-20 -top-14 md:-top-10">
            <div
                class="md:flex md:items-center shadow-primary md:justify-center md:space-x-10 md:max-w-3xl md:mx-auto bg-white shadow-card rounded-3xl m-2 p-2 text-center">
                <div class="md:text-left">
                    <h4>Blogs</h4>
                </div>
            </div>
        </section>
        <div class="max-w-7xl mx-auto" id="myDiv">
            <!--    Blog content-->

            <div class="grid grid-cols-1 md:grid-cols-12 sm:grid-cols-12 gap-3">
                <div class="col-span-8">
                    <section class="py-10 md:py-20 ">
                        <div class="grid grid-cols-1 md:grid-cols-1 px-3 md:px-0" id="blogListing">
                            @if (count($all['blogs']) > 0)
                                @foreach ($all['blogs'] as $blog)
                                    <div
                                        class="flex-row items-stretch md:flex md:space-x-5 bg-white text-black-lighter-1 m-1 rounded-xl shadow ">
                                        <img loading="lazy"
                                            src="{{ env('MIX_IMAGE_URL') }}/images/blogs/{{ $blog->image_name }}"
                                            alt="{{ $blog->name }}"
                                            class="md:w-2/5 rounded-t-xl md:rounded-none md:rounded-l-xl w-full h-64 md:h-auto object-cover">

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
                                                            <a href="/blogs/{{ $blog->slug }}"
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
                                                        class="text-primary underline text-sm text-center md:text-right pr-4">READ
                                                        MORE</a>
                                                </span>
                                            @else
                                                <span class="flex justify-center md:justify-start px-3 mt-1">
                                                    <a href="/blogs/{{ $blog->slug }}"
                                                        class="text-primary underline text-sm text-center md:text-right pr-4">READ
                                                        MORE</a>
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
                                @endforeach
                            @else
                                <div class="text-center text-danger">No record found in this section.</div>
                            @endif
                        </div>
                        <div>
                        </div>
                    </section>
                </div>
                <div class="col-span-4 hidden md:block ">
                    <section class="py-10 md:py-20 max-w-7xl mx-auto ">
                        <div class="rounded-xl shadow p-3 px-10 bg-white">
                            <div>
                                <p class="py-1 text-lg font-bold text-center md:text-left text-primary">
                                    Search
                                </p>
                                <div class="border-b-2 w-10 mb-1"></div>
                                <div class=" p-1 text-center w-full mx-auto">
                                    <div class="relative mt-1">
                                        <form>
                                            <input id="searchQuery" name="query" type="text"
                                                placeholder="Search blog..." name="right-icon" id="right-icon"
                                                class="w-full p-2 pr-10 focus:outline-none bg-gray-200 w-full border-none rounded-full mb-2">
                                            <span id="svg-icon"
                                                class="ml-1 absolute z-10 right-2.5 top-2.5 inline-flex items-center sm:text-sm cursor-pointer">
                                                <svg class="h-5 w-4 text-gray-400" viewBox="0 0 18 18" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9 18C13.9235 18 18 13.9147 18 9C18 4.07647 13.9147 0 8.99118 0C4.07647 0 0 4.07647 0 9C0 13.9147 4.08529 18 9 18ZM5.88529 12.8471C5.48823 12.8471 5.16176 12.5118 5.16176 12.1059C5.16176 11.9118 5.24118 11.7353 5.37353 11.5941L7.95882 9.00882L5.37353 6.42353C5.24118 6.28235 5.16176 6.10588 5.16176 5.91176C5.16176 5.50588 5.48823 5.18824 5.88529 5.18824C6.09706 5.18824 6.26471 5.25882 6.39706 5.4L8.99118 7.98529L11.6118 5.39118C11.7618 5.24118 11.9206 5.17059 12.1147 5.17059C12.5118 5.17059 12.8382 5.49706 12.8382 5.89412C12.8382 6.09706 12.7765 6.25588 12.6265 6.41471L10.0324 9.00882L12.6176 11.5853C12.7588 11.7353 12.8294 11.9029 12.8294 12.1059C12.8294 12.5118 12.5029 12.8471 12.0971 12.8471C11.8941 12.8471 11.7176 12.7588 11.5765 12.6265L8.99118 10.0412L6.42353 12.6265C6.28235 12.7676 6.09706 12.8471 5.88529 12.8471Z"
                                                        fill="#B9B9B9" />
                                                </svg>
                                            </span>
                                            <button type="submit"
                                                class="shadow-primary space-x-1 inline-flex items-center px-4 py-2 text-sm border border-primary rounded-full text-white bg-primary hover:bg-primary-darker-1 hover:text-white focus:outline-none ">
                                                <span>Submit</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-white">
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
                            <x-blog-sidebar :all="$all" />
                            <div>
                                <p class="py-1 text-lg font-bold text-center md:text-left text-primary">
                                    <span class="flex items-center">
                                        <span>Locations</span>
                                    </span>
                                </p>
                                <div class="border-b-2 w-10"></div>
                                <p class="text-center md:text-left">
                                <ul class=" py-5 md:pr-10 hidden md:block text-gray-500 text-md">
                                    @foreach ($all['blog_locations'] as $blog_location)
                                        <li class="hover:ml-2 transition-all border-b py-3">
                                            <a href="/blogs/locations/{{ $blog_location->slug }}"
                                                class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                <span>{{ $blog_location->name }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                                </p>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            @include('layouts.FooterIcons')
        </div>
    </div>
@endsection
