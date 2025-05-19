@extends('layouts.master')
@section('title', 'United States K-12 Computer Science Standards | CodeWithUs | Code With Us')
@section('content')
    <div>

        <section>
            <div class="relative max-w-full mx-auto ">
                <div class="relative py-10 px-8 overflow-hidden lg:px-16 takeover-panel-topic">
                    <div class="absolute inset-0">

                        <img src="/images/computer_standerd/ban1.png" alt="Banner"
                            class="h-96 w-full md:w-full object-cover">

                    </div>

                    <div class="relative text-center">
                        <div class="max-w-3xl mx-auto">
                            <h2 class="display-3 font-weight-bolder text-white computer-heading">
                                {{ $data['school_pages']['title'] }}</h2>
                        </div>
                        {{-- @dd($data['school_pages']); --}}
                        <div class="max-w-4xl mx-auto mb-5">
                            <h6 class="text-white"> {{ strip_tags($data['school_pages']['description']) }} </h6>
                        </div>

                        <button type="submit"
                            class="w-52 shadow-primary inline-flex items-center justify-center text-sm
           border border-primary rounded-full text-white bg-primary hover:bg-primary-darker-1 focus:outline-none"
                            style="width: 19rem;
          padding: 10px;">
                            <span> <a href="/school-program#trial_form" class="hover:text-white">Schedule a Free Trial class
                                    for your school</a></span>
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-10">
            <div class="max-w-5xl bg-white py-10 rounded-2xl mx-auto shadow-card">
                <div class="p-5 text-center">

                    <h4>{{ trans('united_state.K-12_computer_science_standards') }}</h4>
                    <p>{{ trans('united_state.stay_tuned_more_state') }}</p>
                </div>

                <div class="p-5 w-1/2 mx-auto">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="p-2">
                            <a href="/computer-science-standards/united-states"
                                class="font-bold hover:text-primary-darker-5  focus:outline-none text-primary">United
                                States</a>
                        </div>

                        @foreach ($data['country_names'] as $country)
                            <div class="p-2">
                                @if ($country->slug === $data['school_pages']['slug'])
                                    <a href="/computer-science-standards/united-states/{{ $country->slug }}"
                                        class="font-bold hover:text-primary-darker-1 focus:outline-none text-primary'">{{ $country->country_name }}</a>
                                @else
                                    <a href="/computer-science-standards/united-states/{{ $country->slug }}"
                                        class="hover:text-primary-darker-1 focus:outline-none text-primary">{{ $country->country_name }}</a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <div class="max-w-5xl bg-white py-10 rounded-2xl mx-auto shadow-card mb-10">


            <section>
                <div class="p-5 space-y-3">
                    {!! $data['school_pages']['long_description'] !!}
                </div>
            </section>

        </div>

        @if ($data['rss_data'])
            <section class="py-10 md:py-20">
                <div class="md:max-w-5xl md:mx-auto">
                    <div class="p-5">
                        <h4>{{ trans('united_state.related_articles') }}</h4>
                    </div>
                    @foreach ($data['rss_data']['rss_data'] as $key => $rss)
                        <div class="bg-white shadow-card rounded-3xl m-2 p-5">
                            <span class="text-primary">{{ ++$key }}</span>
                            @if ($rss->title == null)
                                <a href="{{ $rss->link }}" target="_blank"> {{ $rss->title }}</a>
                            @else
                                <a href="{{ $rss->link }}" target="_blank"> {{ $rss->title }}</a>
                            @endif
                        </div>
                    @endforeach
                </div>
            </section>
        @endif
    </div>

@endsection
