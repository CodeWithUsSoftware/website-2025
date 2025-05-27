@extends('layouts.master')
@section('title', 'Jobs | Code With Us')
@section('content')
    <div>
        <section class="pb-0">
            <div class="relative max-w-full mx-auto ">
                <div class="relative py-10 px-8 overflow-hidden lg:px-16 page-banner-topic">
                    <div class="absolute inset-0  mix-blend-multiply">
                        <img src="/images/jobs/jobs_banner.webp" alt="" class="w-full h-auto object-cover" />
                    </div>
                    {{-- <div class="absolute inset-0 mix-blend-multiply">
                        <img v-if="image_overlay" :src="image_overlay" alt="" class="w-full h-auto object-cover" />
                    </div> --}}
                    <div class="relative lg:top-1/4 -top-8">
                        <h2 class="text-center text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl py-10">
                            <span class="block text-white">{{ trans('jobs.jobs_banner_title') }}</span>
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
                            <img src="/images/jobs/jobs.webp">
                        </button>
                    </div>
                </div>
                <div class="md:text-left">
                    <h4>{{ trans('jobs.work_with_us') }}</h4>
                    <p class="text-sm">
                        {{ trans('jobs.work_with_us_description') }}
                    </p>
                </div>
            </div>
        </section>

        <section class="py-0">
            <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-3 md:space-x-3">
                <div class="px-5 py-2 mt-5 md:mt-0">
                    <h6
                        class="bg-primary text-white inline-block flex items-center justify-center w-10 h-10 rounded-full text-center">
                        1</h6>
                    <h5>{{ trans('jobs.Fill_out_an_application') }}</h5>
                    <p>{{ trans('jobs.Fill_out_an_application_description') }}</p>
                </div>

                <div class="px-5 py-2 mt-5 md:mt-0">
                    <h6
                        class="bg-primary text-white inline-block flex items-center justify-center w-10 h-10 rounded-full text-center">
                        2</h6>
                    <h5>{{ trans('jobs.Wait_for_contact') }} </h5>
                    <p>{{ trans('jobs.Wait_for_contact_description') }}</p>
                </div>

                <div class="px-5 py-2 mt-5 md:mt-0">
                    <h6
                        class="bg-primary text-white inline-block flex items-center justify-center w-10 h-10 rounded-full text-center">
                        3</h6>
                    <h5>{{ trans('jobs.Confirm_interview') }} </h5>
                    <p>{{ trans('jobs.Confirm_interview_description') }}</p>
                </div>
            </div>
        </section>

        <section class="py-10 md:py-32">
            <div class="max-w-5xl mx-auto">
                <div class="text-white p-2 z-20 mx-auto max-w-sm text-xl font-bold z-20 text-center bg-primary">
                    {{ trans('jobs.Available_Jobs_at_Code_With_Us') }}
                </div>
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="flex flex-col mt-5">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                               @if(count($jobs) > 0)
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Position
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Location
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Starting Wage
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Availability
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @forelse ($jobs as $job)
                                        <tr class="bg-white">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{($job->title)?$job->title:null}} <a href="{{route('show.jobs',$job->slug)}}" class="hidden">{{($job->title)?$job->title:null}}</a></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{($job->location)?$job->location->location_name:null}}<a href="{{route('show.jobs',$job->slug)}}" class="hidden">{{($job->location)?$job->location->location_name:null}}</a></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                @if($job->rate_from and !$job->rate_to)
                                                <span>{{__('$').$job->rate_from.__('/hour')}}</span>
                                                @elseif ($job->rate_from and $job->rate_to)
                                                <span>{{__('$').$job->rate_from.__(' - ').__('$').$job->rate_to.__('/hour')}}</span>
                                                @endif
                                                </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{($job->availability)?$job->availability:null}}</td>
                                        </tr>
                                        @empty

                                        @endforelse
                                    </tbody>
                                </table>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-10 md:py-16 text-center">
            <jobs-form />
        </section>
        @include('layouts.FooterIcons')
    </div>
@endsection
