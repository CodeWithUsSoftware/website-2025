@extends('layouts.master')
@section('header_scripts')
    {{-- OwlCarousel --}}
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
@endsection

@section('title', 'Silicon Valley Family Teams Up | Code With Us')
@section('content')
    <div>

        @if ($referral['referral']['layout'] === 'layout2')
            <section class="pt-10 md:max-w-5xl mx-auto pt-36">
                <h3 class="text-center px-3"> {{ $referral['referral']['heading'] }}</h3>
                <p class="text-center pb-10 px-3">
                    {!! $referral['referral']['heading_description'] !!}
                </p>
                @if (count($referral['referral']->images) > 0)
                    <div class="max-w-3xl mx-auto py-10">
                        <section>
                            <div class="flex items-center gap-5">
                                <div slot="prev">
                                    <button type="button"
                                        class="hidden md:inline-flex items-center p-3 rounded-full shadow-primary text-white bg-info hover:bg-info-lighter-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 font-bold" fill="none"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.75 19.5L8.25 12l7.5-7.5" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="owl-carousel owl-theme">
                                    @foreach ($referral['referral']->images as $image)
                                        <div class="item">
                                            <img loading="lazy"
                                                src="{{ env('MIX_IMAGE_URL') }}/images/referral_layouts/{{ $image->image_name }}">
                                        </div>
                                    @endforeach
                                </div>
                                {{-- Next --}}
                                <div slot="next">
                                    <button type="button"
                                        class="hidden md:inline-flex items-center p-3 rounded-full shadow-primary text-white bg-info hover:bg-info-lighter-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 font-bold" fill="none"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </section>
                    </div>
                @endif
                <div class="space-y-5 py-16 px-3">
                    <p>{!! $referral['referral']['text_section1'] !!}</p>
                    <p>{!! $referral['referral']['text_section2'] !!}</p>

                </div>
            </section>

            @if ($referral['rss'])
                <section class="py-10 md:py-20">
                    <div class="md:max-w-5xl md:mx-auto">
                        <div class="p-5">
                            <h4>Related Articles</h4>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-12 sm:grid-cols-12">
                            @foreach ($referral['rss'] as $r)
                                <div class="col-span-4">
                                    <div class="bg-white shadow-card rounded-3xl m-2 p-5">
                                        @if ($r->title == null)
                                            <a href="{{ $r->link }}" target="_blank" class="font-bold">
                                                {{ $r->link }} </a>
                                        @else
                                            <a href="{{ $r->link }}" target="_blank" class="font-bold">
                                                {{ $r->title }}</a>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </section>
            @endif
        @elseif($referral['referral']['layout'] === 'layout1')
            <section class="py-10 md:py-20 max-w-5xl mx-auto">
                <trial-form phone_number="{{ trans('free_session.phone_number') }}"
                    private_session_fee="{{ trans('free_session.private_session_fee') }}"
                    private_session="{{ trans('free_session.private_session') }}"
                    free_trial="{{ trans('free_session.free_trial') }}"
                    group_session="{{ trans('free_session.group_session') }}"
                    free_session_email="{{ trans('free_session.email') }}" trial="{{ trans('free_session.trial') }}" />
            </section>
        @endif
        @include('layouts.FooterIcons')

    </div>

    <div>

    </div>
@endsection


@section('script')
    <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel({
                margin: 15,
                loop: true,
                autoplay: true,
                autoplayTimeout: 2000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: false
                    },
                    600: {
                        items: 2,
                        nav: false
                    },
                    1000: {
                        items: 4,
                        nav: false
                    }
                }
            });
        });
    </script>
@endsection
