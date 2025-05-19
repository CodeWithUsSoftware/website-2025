@extends('layouts.master')
@section('title', 'Student Projects | Code With Us')
@section('content')
    <div>
        <section class="pb-0">
            <div class="relative max-w-full mx-auto ">
                <div class="relative py-10 px-8 overflow-hidden lg:px-16 page-banner-topic">
                    <div class="absolute inset-0  mix-blend-multiply">
                        <img src="/images/projects/project.png" alt="" class="w-full h-auto object-cover" />
                    </div>
                    <div class="relative lg:top-1/4 -top-8">
                        <h2 class="text-center text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl py-10">
                            {{-- <span class="block text-white">{{ trans('jobs.jobs_banner_title') }}</span> --}}
                        </h2>
                    </div>
                </div>
            </div>
        </section>

        <section class="relative z-20 -top-28 md:-top-20">
            <div
                class="md:flex md:items-center md:justify-center md:space-x-10 md:max-w-3xl md:mx-auto bg-white shadow-card rounded-3xl m-2 p-2 text-center">
                <div class="md:py-10 md:pl-10 md:pr-0">
                    <div
                        class="inline-flex items-center p-3 bg-info-lighter-4 rounded-full border border-transparent focus:outline-none w-32 h-32">
                        <button type="button"
                            class="inline-flex items-center p-3 border border-transparent rounded-full shadow-primary text-white bg-primary hover:bg-primary-darker-1 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary cursor-pointer">
                            <img src="/images/topic_page/icons/open_topic.webp">
                        </button>
                    </div>
                </div>
                <div class="md:text-left">
                    <h4>{{ trans('projects.projects_card_title') }}</h4>
                    <p class="text-sm">
                        {{ trans('projects.projects_card_desc') }}
                    </p>
                </div>
            </div>
        </section>

        <!--Search -->
        {{-- <div class="max-w-7xl mx-auto  p-5 bg-white rounded-2xl mb-5">
            <form class="">
                <div class="mt-6 grid grid-cols-1 md:grid-cols-12 sm:grid-cols-12 gap-3">
                    <div class="col-span-5">
                        <div class="mt-1">
                            <input type="text" name="name" value="{{ request('name') }}" class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-full" placeholder="Name..">
                        </div>
                    </div>
                    <div class="col-span-4">
                        <div class="mt-1">
                            <select name="topic" class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-100 bg-gray-100 rounded-full">
                                <option value="">Select Topic</option>
                                <option value="JavaScript" {{ request('topic') == 'JavaScript' ? 'selected' : '' }}>JavaScript</option>
                                <option value="Python" {{ request('topic') == 'Python' ? 'selected' : '' }}>Python</option>
                                <option value="Web" {{ request('topic') == 'Web' ? 'selected' : '' }}>Web</option>
                                <option value="Scratch 2" {{ request('topic') == 'Scratch 2' ? 'selected' : '' }}>Scratch 2</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-span-3">
                        <div class="flex items-center gap-3">
                            <button type="submit" class="shadow-primary space-x-1 inline-flex items-center px-4 py-2 text-sm border border-primary rounded-full text-white bg-primary hover:bg-primary-darker-1 hover:text-white focus:outline-none">Search</button>
                            <a href="/projects" type="reset" class="shadow-primary space-x-1 inline-flex items-center px-4 py-2 text-sm border border-danger rounded-full text-white bg-red-500 hover:bg-red-700 hover:text-white focus:outline-none">Reset</a>
                        </div>
                    </div>
                </div>
            </form>
        </div> --}}

        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-4 px-3 md:px-0">
                @if($projects->isEmpty())
                    <div class="col-span-1 md:col-span-4 text-center py-5">
                        <p class="text-red-600">No projects found.</p>
                    </div>
                @else
                    @foreach($projects as $project)
                    @if($project->is_public)
                    @php
                        $encrypted_id = base64_encode($project->id);
                    @endphp
                    @if($project->language != 'Web')
                    <a href="/view-project/{{$encrypted_id}}">
                    @elseif($project->language == 'Web')
                    <a href="/web-project/{{$encrypted_id}}">
                    @endif
                        <div class="flex items-center flex-row bg-white text-black-lighter-1 m-1 rounded-xl shadow ">
                         
                            @if($project->language == 'JavaScript')
                            <img class=" w-32 h-32 md:h-auto object-cover" src="/images/topic_page/icons/javascript.webp" />
                            @elseif($project->language == 'Python')
                            <img class=" w-32 h-32 md:h-auto object-cover" src="/images/topic_page/icons/python.webp" />
                            @elseif($project->language == 'Web')
                            <img class=" w-32 h-32 md:h-auto object-cover" src="/images/topic_page/icons/open_topic.webp" />
                            @elseif($project->language == 'Scratch 2')
                            <img class=" w-32 h-32 md:h-auto object-cover" src="/images/topic_page/icons/scratch.webp" />
                            @endif

                            <div class="pb-5 md:pb-0">
                                <h6 class="font-bold text-md break-all pr-2">{{$project->save_as}}</h6>
                                <p class="overflow-hidden break-all">
                                    {{$project->language}}
                                </p>
                            </div>
                        </div>
                    </a>
                    @endif
                    @endforeach
                @endif
            </div>
            {{-- {{ $projects->links('vendor.pagination.tailwind') }} --}}
        </div>
@include('layouts.FooterIcons')
    </div>
@endsection
