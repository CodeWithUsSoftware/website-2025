@extends('layouts.master')

@section('title', 'Pricing | Coding Classes for Kids | Code With Us')

@section('content')

    @php
    $topic = "";
    @endphp

    <x-pricing :topic="$topic" />

    {{-- <section class="py-20">
        <schedule-a-phone-class schedule_a_phone_call_title="{{ trans('phone_call.schedule_a_phone_call_title') }}" />
    </section> --}}

    <section>
        @include('layouts.FooterIcons')
    </section>
@endsection
