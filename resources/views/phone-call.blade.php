@extends('layouts.master')
@section('title', 'Book a Phone Call | Code With Us')
@section('content')

    <div>
        <section class="py-10 md:py-20">
           {{-- <div class="hidden md:block">
                <div class="bg-white border shadow w-32 mx-auto p-5 rounded-lg">
                    <img class="w-20 h-20 mx-auto" width="24" height="24" src="/phone_call.webp" alt="">
                </div>
                <div class="text-center">
                    <h4> {{ trans('phone_call.schedule_a_phone_call_title') }}</h4>
                </div>
            </div> --}}

            <!-- Desktop Version - Hidden on mobile, visible on md screens and up -->
            <div class="hidden md:block">
                <schedule-a-phone-class schedule_a_phone_call_title="{{trans('phone_call.schedule_a_phone_call_title')}}"  schedule_a_phone_call_text="{{trans('phone_call.schedule_a_phone_call_text')}}"/>
            </div>

            <!-- Mobile Version - Visible on mobile, hidden on md screens and up -->
            <div class="block md:hidden">
                <schedule-a-phone-class-mobile schedule_a_phone_call_title="{{trans('phone_call.schedule_a_phone_call_title')}}"  schedule_a_phone_call_text="{{trans('phone_call.schedule_a_phone_call_text')}}"/>
            </div>
        </section>

        <section>
            @include('layouts.FooterIcons')
        </section>
    </div>
@endsection
