@extends('layouts.master')
@section('title', 'Student Spotlight Project Videos | Code With Us')
@section('content')
    <div>
        <section class="py-10 md:py-20">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 md:px-8 text-center space-y-3">
                <h2>Student Spotlight Video</h2>
            </div>
        </section>

        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 px-3 md:px-0 ">
                @foreach ($student_spotlight_videos as $video)
                    @if ($video->link)
                        <div
                            class="flex-row items-stretch md:flex md:space-x-5 bg-white text-black-lighter-1 m-1 rounded-xl shadow ">
                            @if ($video->link)
                                <iframe id="{{ $video->id }}"
                                    class="md:w-2/5 rounded-t-xl md:rounded-none md:rounded-l-xl w-full h-64 md:h-auto object-cover"
                                    src="{{ $video->link }}" title="{{ $video->name }}" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen>
                                </iframe>
                                <div class="pb-5 md:pb-0">
                                    <h5 class="p-3">{{ $video->name }} |{{ $video->spotlight_month }}</h5>
                                    <p class="p-3 overflow-hidden">
                                        {{ $video->comment }}
                                    </p>
                                </div>
                            @else
                                <iframe id="{{ $video->id }}"
                                    class="md:w-2/5 rounded-t-xl md:rounded-none md:rounded-l-xl w-full h-64 md:h-auto object-cover"
                                    src="https://www.youtube.com/embed/v0prAZhW2wM" title="{{ $video->name }}"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen>
                                </iframe>
                                <div class="pb-5 md:pb-0">
                                    <h5 class="p-3">{{ $video->name }} |{{ $video->spotlight_month }}</h5>
                                    <p class="p-3 overflow-hidden">
                                        {{ $video->comment }}
                                    </p>
                                </div>
                            @endif
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        @include('layouts.FooterIcons')
    </div>
@endsection
