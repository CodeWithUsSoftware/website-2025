@extends('layouts.master')
@section('title', 'Videos | Code With Us')

@section('meta_description', 'Code With us listens to the parents and helps students work on projects they are passionate about! We offer private or small group coding classes.')

@section('content')
    <div>
        <section class="py-10 md:py-20">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 md:px-8 text-center space-y-3">
            <h2>How To Videos</h2>
        </div>
        </section>

        <div class="grid grid-cols-1 md:grid-cols-2 max-w-7xl mx-auto">
            @foreach($how_to_videos as $video)
            <div class="flex-row items-center md:flex md:space-x-5 bg-white text-black-lighter-1 m-5  rounded-3xl shadow-card">
                <iframe width="auto" height="400" src="{{$video->link}}" class="rounded-t-3xl md:rounded-none w-full md:w-2/5 h-72 md:rounded-l-3xl md:h-full object-cover"  title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div class="pb-5 md:pb-0">
                    <div class="pl-3 pt-5 md:pt-2 text-sm text-black-lighter-3">18h ago</div>
                    <div class="p-3 text-xl">{{ $video->title}}</div>
                    <p class="p-3">
                        {{ $video->description }}
                    </p>
                    <div class="text-center md:text-right pr-8">
                        <a href="{{$video->link}}" class="text-primary underline text-sm" target="_blank">WATCH</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <section>
        @include('layouts.FooterIcons')
    </section>
@endsection


