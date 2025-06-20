@extends('layouts.master')
@section('title', 'Schedule a Make-up Class | Code With Us')
@section('content')
    <div>
        {{-- <section class="py-10 md:py-20">
            <div>
                <div class="bg-white border shadow w-32 mx-auto p-5 rounded-lg">
                    <img class="w-20 h-20 mx-auto" width="24" height="24" src="/images/trial_form/monthly_form.webp" alt="">
                </div>
                <div class="text-center">
                    <h4> {{ trans('reschedule.schedule_a_makeup_class_heading') }}</h4>
                </div>
            </div>
            <Reschedule schedule_a_makeup_class_heading="{{ trans('reschedule.schedule_a_makeup_class_heading') }}" schedule_a_makeup_class_text="{{ trans('reschedule.schedule_a_makeup_class_text') }}"/>
        </section> --}}

        <section class="py-10 md:py-20">
            <div class="hidden md:block">
                <Reschedule schedule_a_makeup_class_heading="{{ trans('reschedule.schedule_a_makeup_class_heading') }}" schedule_a_makeup_class_text="{{ trans('reschedule.schedule_a_makeup_class_text') }}"/>
            </div>
            <div class="block md:hidden">
                <reschedule-mobile schedule_a_makeup_class_heading="{{ trans('reschedule.schedule_a_makeup_class_heading') }}" schedule_a_makeup_class_text="{{ trans('reschedule.schedule_a_makeup_class_text') }}"/>
            </div>
        </section>
        <section>
            @include('layouts.FooterIcons')
        </section>
    </div>
@endsection
