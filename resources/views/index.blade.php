@extends('layouts.master')

@section('title')
    {{ trans('page_titles.home') . ' | Code With Us' }}
@endsection

@section('header_scripts')
    {{-- OwlCarousel --}}
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
@endsection

@section('meta_description',
    'We teach online coding classes for kids ages 5-18. Your child will have fun coding video
    games, websites, apps and robots! Try a free one hour class today!')
@section('style')
    <style>
        .showText {
            height: 30px;
        }

        .showText.active {
            height: auto;
        }
    </style>
@endsection
@section('content')
    {{-- Slider Section --}}
    @include('layouts.slider')

    {{-- Pramotional Banner --}}
    @include('layouts.pramotional_banner')
    {{-- Content --}}
    <div>
        <section class="pb-20 pt-10">
            <div class="md:max-w-2xl md:m-auto px-3 text-center ">
                <h3>{{ trans('HOME.browse_our_top_coding_classes') }}</h3>
                <p>{{ trans('HOME.browse_our_top_coding_classes_descritpion') }}</p>
            </div>
        </section>

        {{-- Carousel --}}
        <x-topic :topics="$topics" />

        <section class="py-10 md:py-20">
            <div class="max-w-7xl mx-auto px-0 md:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-2 flex items-center">
                    <img loading="lazy" class="w-full h-auto" src="/images/home_page/we_teach_15_plus_topics.webp" />
                    <div class="md:max-w-2xl md:m-auto px-3 text-center md:text-left">
                        <h3>{{ trans('HOME.we_teach_15_plus_coding_topics') }}</h3>
                        <p>{{ trans('HOME.we_teach_15_plus_coding_topics_description') }}</p>
                    </div>
                </div>
            </div>
        </section>


        <section class="py-20">
            <div class="bg-white">
                <div class="max-w-6xl shadow-card rounded-3xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8">
                    <div
                        class="mt-6 grid grid-cols-1 space-y-10 md:space-y-0 md:gap-15 gap-0.5 md:grid-cols-3 lg:mt-8 md:gap-y-24">
                        <div class="flex items-end justify-center relative">
                            <div class="flex flex-col items-center justify-center">
                                <a href="/topics/python">
                                    <img loading="lazy" class="h-20 w-auto" src="/images/home_page/topics/python.webp"
                                        alt="python" />
                                </a>
                                <a href="/topics/python">
                                    <p>{{ trans('HOME.code_applications_with_python') }}</p>
                                </a>
                            </div>
                        </div>
                        <div class="flex items-end justify-center relative">
                            <div class="flex flex-col items-center justify-center">
                                <a href="/topics/minecraft">
                                    <img loading="lazy" class="h-20 w-auto" src="/images/home_page/topics/minecraft.webp"
                                        alt="minecraft" />
                                </a>
                                <a href="/topics/minecraft">
                                    <p>{{ trans('HOME.minecraft_modding_with_javascript') }}</p>
                                </a>
                            </div>
                        </div>
                        <div class="flex items-end justify-center">
                            <div class="flex flex-col items-center justify-center">
                                <a href="/topics/scratch">
                                    <img loading="lazy" class="h-20 w-auto" src="/images/home_page/topics/scratch.webp"
                                        alt="scratch" />
                                </a>
                                <a href="/topics/scratch">
                                    <p> {{ trans('HOME.create_games_with_scratch') }}</p>
                                </a>
                            </div>
                        </div>
                        <div class="flex items-end justify-center relative">
                            <div class="flex flex-col items-center justify-center">
                                <a href="/topics/javascript">
                                    <img loading="lazy" class="h-20 w-auto" src="/images/home_page/topics/js.webp"
                                        alt="javascript" style="height:127px;" />
                                </a>
                                <a href="/topics/javascript">
                                    <p> {{ trans('HOME.web_design_with_javascript') }} </p>
                                </a>
                            </div>
                        </div>
                        <div class="flex items-end justify-center relative">
                            <div class="flex flex-col items-center justify-center">
                                <a href="/topics/arduino">
                                    <img loading="lazy" class="h-32 w-auto" src="/images/home_page/topics/3d_printing.webp"
                                        alt="3d_printing" />
                                </a>
                                <a href="/topics/arduino">
                                    <p>{{ trans('HOME.robotics_with_arduino_c_plus_plus') }} </p>
                                </a>
                            </div>
                        </div>
                        <div class="flex items-end justify-center">
                            <div class="flex flex-col items-center justify-center">
                                <a href="/topics/roblox">
                                    <img loading="lazy" class="h-32 w-auto" src="/images/home_page/topics/roblox.webp"
                                        alt="roblox" />
                                </a>
                                <a href="/topics/roblox">
                                    <p> {{ trans('HOME.roblox_game_design') }} </p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-20">
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                <div
                    class="mt-12 space-y-4 sm:mt-16 sm:space-y-0 sm:grid sm:grid-cols-2 sm:gap-6 md:max-w-4xl md:mx-auto md:max-w-none md:mx-0">

                    <div class="bg-white rounded-3xl shadow-card">
                        <div class="">
                            <img loading="lazy" src="/images/ongoing_lessons.webp" alt="ongoing_lessons">
                        </div>


                        <div class="pt-6 pb-8 px-10">
                            <div class="inline-flex px-8 py-2 rounded-full text-sm bg-info-lighter-4 text-info">
                                {{ trans('HOME.weekly_classes_age') }}</div>
                            <h3 class="text-black-lighter-2 tracking-wide"> {{ trans('HOME.weekly_classes') }}</h3>
                            <ul role="list" class="mt-6 pb-8 space-y-7">
                                {!! trans('HOME.weekly_classes_description') !!}
                            </ul>

                            <div class="text-center">
                                <a href='/monthly-subscriptions'
                                    class="space-x-4 inline-flex items-center px-5 py-2 border border-transparent text-base font-medium rounded-full text-white bg-primary hover:bg-primary-darker-1 hover:text-white focus:outline-none focus:ring-primary">
                                    <span>Learn More</span>
                                    <svg width="13" height="11" viewBox="0 0 13 11" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 5.5H12M12 5.5L8.03644 1.5M12 5.5L8.03644 9.5" stroke="white"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-3xl shadow-card">
                        <div class="">
                            <img loading="lazy" src="/images/camps.webp" alt="ongoing_lessons">
                        </div>
                        <div class="pt-6 pb-8 px-10">
                            <div class="inline-flex px-8 py-2 rounded-full text-sm bg-info-lighter-4 text-info">
                                {{ trans('HOME.camps_age') }}</div>
                            <h3 class="text-black-lighter-2 tracking-wide">{{ trans('HOME.camps') }}</h3>

                            <ul role="list" class="mt-6 pb-8 space-y-7">
                                {!! trans('HOME.camps_description') !!}
                            </ul>

                            <div class="text-center">
                                <a href='/camps#campsForm'
                                    class="space-x-4 inline-flex items-center px-5 py-2 border border-transparent text-base font-medium rounded-full text-white bg-primary hover:bg-primary-darker-1 hover:text-white focus:outline-none focus:ring-primary">
                                    <span>Learn More</span>
                                    <svg width="13" height="11" viewBox="0 0 13 11" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 5.5H12M12 5.5L8.03644 1.5M12 5.5L8.03644 9.5" stroke="white"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="py-20">
            @include('layouts.TrustedBySiliconValley')
        </section>

        <section class="py-10">
            @include('layouts.StudentFeedbacks')
        </section>

        <section>
            @include('layouts.FooterIcons')
        </section>

    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {

            $('.owl-carousel').owlCarousel({
                margin: 20,
                loop: true,
                autoplay: true,
                autoplayTimeout: 2000,
                autoplayHoverPause: true,
                nav: true,
                navText: ["<div class='nav-button owl-prev'>‹</div>",
                    "<div class='nav-button owl-next'>›</div>"
                ],
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 4
                    }
                }
            });

            $(".read").click(function() {
                $(this).toggleClass("active");
                $(this).closest('.item').find(".showText").toggleClass("active");
                if ($(this).hasClass("active")) {
                    $(this).text("Read Less");
                    $(this).closest('.item').find('.text').addClass('hidden');
                    $(this).closest('.item').find('.more').removeClass('hidden');
                } else {
                    $(this).text("Read More");
                    $(this).closest('.item').find('.text').removeClass('hidden');
                    $(this).closest('.item').find('.more').addClass('hidden');
                }
            });
        });
    </script>
@endsection
