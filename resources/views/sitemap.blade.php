@extends('layouts.master')
@section('title', 'Site Map | Code With Us')
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
                                <span class="block text-white">{{ trans('page_titles.sitemap') }}</span>
                            </h1>
                        </slot>
                    </div>
                </div>
            </div>
        </section>

        <section class="relative z-20 -top-24 md:-top-10">
            <div
                class="md:flex md:flex-col md:items-center md:justify-center md:max-w-5xl md:mx-auto bg-white shadow-card rounded-3xl m-2 p-5">
                <div class="bg-info-lighter-4 w-full rounded p-3 mb-3">
                    <div class="grid sm:grid-cols-1 md:grid-cols-2">
                        <div>{{ trans('sitemap.Pages') }}</div>
                        <ul>
                            <li><a href="/coding_classes" class="text-info">{{ trans('sitemap.coding_classes') }}</a></li>
                            <li><a href="/camps" class="text-info">{{ trans('sitemap.coding_camps') }}</a></li>
                            <li><a href="/faqs" class="text-info">{{ trans('sitemap.frequently_asked_questions') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="bg-info-lighter-4 w-full rounded p-3 mb-3">
                    <div class="grid sm:grid-cols-1 md:grid-cols-2">
                        <div>{{ trans('sitemap.Categories') }}</div>
                        <ul>
                            @foreach ($all['landing_page_category_links'] as $landing_page_category_link)
                                <li>
                                    <a href="/categories/{{ $landing_page_category_link->slug }}"
                                        class="text-info">{{ $landing_page_category_link->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="bg-info-lighter-4 w-full rounded p-3 mb-3">
                    <div class="grid sm:grid-cols-1 md:grid-cols-2">
                        <div>{{ trans('sitemap.blog_categories') }}</div>
                        <ul>
                            @foreach ($all['blog_categories'] as $blog_category)
                                <li>
                                    <a href="/blogs/categories/{{ $blog_category->slug }}"
                                        class="text-info">{{ $blog_category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="bg-info-lighter-4 w-full rounded p-3 mb-3">
                    <div class="grid sm:grid-cols-1 md:grid-cols-2">
                        <div>{{ trans('sitemap.Referrals') }}</div>
                        <ul>
                            @foreach ($all['referral_links'] as $referral_link)
                                <li>
                                    <a href="/referral_link/{{ $referral_link->code }}"
                                        class="text-info">{{ $referral_link->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="bg-info-lighter-4 w-full rounded p-3 mb-3">
                    <div class="grid sm:grid-cols-1 md:grid-cols-2">
                        <div>{{ trans('sitemap.school_pages') }}</div>
                        <ul>
                            @foreach ($all['country_names'] as $country_name)
                                <li>
                                    <a href="/computer-science-standards/united-states/{{ $country_name->slug }}"
                                        class="text-info">{{ $country_name->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>


                @if ($all['projects'])
                    @foreach ($all['projects'] as $key => $projects)
                        <div class="bg-info-lighter-4 w-full rounded p-3 mb-3">
                            <div class="grid sm:grid-cols-1 md:grid-cols-2">
                                <div>{{ trans('sitemap.projects') }} - ({{ $key }})</div>
                                <ul>
                                    @foreach ($projects as $project)
                                        @php
                                            $encrypted_id = base64_encode($project['id']);
                                            $url =
                                                $project['language'] != 'Web'
                                                    ? '/view-project/' . $encrypted_id
                                                    : '/web-project/' . $encrypted_id;
                                        @endphp
                                        <li>
                                            <a href="{{ $url }}" class="text-info">{{ $project['save_as'] }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
        </section>

        @include('layouts.FooterIcons')
    </div>
@endsection
