@extends('layouts.master')
@section('title', $project->save_as)
@section('meta_keywords', $project->meta_keywords)
@section('meta_description', $project->meta_description)
@section('content')
    <div>
        <section class="py-2 md:py-2">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 md:px-8 text-center space-y-3">
                <h4>{{$project->save_as}}</h4>
            </div>
        </section>
        <project-view project_id="{{$project->id}}" image_url="{{env('MIX_IMAGE_URL')}}"></project-view>
@include('layouts.FooterIcons')
    </div>
@endsection
