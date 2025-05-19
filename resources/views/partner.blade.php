@extends('layouts.master')
@section('title', 'Partners | Code With Us')
@section('content')
    <div>
        <section class="py-20">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 md:px-8 text-center space-y-3">
                <h2>{{ trans('partners.partners_with_us') }}</h2>
                <p>{!! trans('partners.partners_with_us_details') !!}</p>
            </div>
        </section>

        <section class="py-20">
            <div class="relative py-10">
                <div class="-mt-10">
                    <div class="max-w-7xl mx-auto md:max-w-5xl py-12 px-4 sm:px-6 lg:py-16 lg:px-8">
                        <img class="object-cover" src="/images/partnership_opportunities/brands.png" alt="salesforce" />
                    </div>
                </div>
                <div class="absolute top-0 w-full inset-0 hidden md:block">
                    <svg viewBox="0 0 1440 599" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.2"
                            d="M0 11.8672C0 11.8672 606.5 -14.834 938.5 11.8672C1270.5 38.5684 1440 11.8672 1440 11.8672V581.845C1440 581.845 805.5 543.248 493.5 581.845C181.5 620.443 0 581.845 0 581.845V11.8672Z"
                            fill="#D7E0EF">
                        </path>
                    </svg>
                </div>
            </div>
        </section>

    {{-- <section class="py-20">
        <partner-enquiry-form fill_partners_form="{{trans('partners.fill_partners_form')}}" send_us_your_partnership_idea="{{trans('partners.send_us_your_partnership_idea')}}" />
    </section> --}}

        @include('layouts.FooterIcons')
    </div>
@endsection
