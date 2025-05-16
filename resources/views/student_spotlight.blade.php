@extends('layouts.master')

@section('title', 'Student Spotlight | Code With Us')

@section('content')

    <x-student_spot_light :studentSpotLights="$studentSpotLights" />

        <section>
            @include('layouts.FooterIcons')
        </section>
    @endsection
