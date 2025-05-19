@extends('layouts.master')
@section('title', $details->title . ' | Code With Us')
@section('schema')
    <script type="application/ld+json">
    {
      "@context": "https://schema.org/",
      "@type": "JobPosting",
      "title": "{{$details->title}}",
      "description": "{!! $details->description !!}",
      "hiringOrganization": {
        "@type": "Organization",
        "name": "Code With Us Inc",
        "sameAs": "https://codewithus.com/"
      },
      "industry": "{{\Str::upper('IT Education')}}",
      "employmentType": "{{\Str::upper($details->availability)}}",
      "datePosted": "{{\Carbon\Carbon::parse($details->created_at)->format('Y-m-d')}}",
      "validThrough": "{{\Carbon\Carbon::parse($details->created_at)->addMonths(3)->format('Y-m-d')}}",
      @if ($details->work_location=='Remote' || $details->work_location=='remote')
      "jobLocationType": "TELECOMMUTE",
      @else
      "jobLocation": {
        "@type": "Place",
        "address": {
          "@type": "PostalAddress",
          "streetAddress": "{{$details->location->address}}",
          "addressLocality": "{{$details->location->location_name}}",
          "postalCode": "{{$details->location->secret_code}}",
          "addressCountry": "CA",
          "addressRegion": "+1"
        }
      },
      @endif
      "baseSalary": {
        "@type": "MonetaryAmount",
        "currency": "USD",
        "value": {
          "@type": "QuantitativeValue",
          "unitText": "HOUR",
          @if($details->rate_from && $details->rate_to)
          "minValue": "{{$details->rate_from}}",
          "maxValue": "{{$details->rate_to}}"
          @elseif($details->rate_from && !$details->rate_to)
          "value": "{{$details->rate_from}}"
          @endif

        }
      },
      @if($details->education)
"qualifications": "{{$details->education}}",
      @endif

    }
    </script>
@endsection
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
                            <span class="block text-white">Jobs</span>
                        </h2>
                    </div>
                </div>
            </div>
        </section>
        @if ($details)
            <section class="relative z-20 -top-28 md:-top-20">
                <div
                    class="md:flex md:items-center md:justify-center md:space-x-10 md:max-w-3xl md:mx-auto bg-white shadow-card rounded-3xl m-2 p-2 text-center">
                    <div class="md:py-10 md:pl-10 md:pr-0">
                        <div
                            class="inline-flex items-center p-3 bg-info-lighter-4 rounded-full border border-transparent focus:outline-none w-32 h-32">
                            <button type="button"
                                class="inline-flex items-center p-3 border border-transparent rounded-full shadow-primary text-white bg-primary hover:bg-primary-darker-1 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                                <img src="/images/jobs/jobs.webp">
                            </button>
                        </div>
                    </div>
                    <div class="md:text-left">
                        <h4>{{ $details->title ? $details->title : null }}</h4>

                    </div>
                </div>
            </section>
        @endif
        @if ($details)
            <section class="py-0">
                <div id="form" class="bg-white shadow-card rounded-5xl max-w-6xl mx-auto p-3 md:px-6">
                    <div class="col-span-12">
                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <tbody>
                                    <tr class="bg-white dark:bg-gray-800">
                                        <th scope="row"
                                            class="font-bold  text-gray-900 px-6 py-4  whitespace-nowrap dark:text-white">
                                            Job Title:
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $details->title }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 font-bold  text-gray-900">
                                            Description:
                                        </td>
                                        <td class="px-6 py-4">
                                            {!! $details->description !!}
                                        </td>
                                    </tr>
                                    <tr class="bg-white dark:bg-gray-800">
                                        <th scope="row"
                                            class="font-bold  text-gray-900 px-6 py-4  whitespace-nowrap dark:text-white">
                                            Starting Wage:
                                        </th>
                                        <td class="px-6 py-4">
                                            @if ($details->rate_from and !$details->rate_to)
                                                <span>{{ __('$') . $details->rate_from . __('/hour') }}</span>
                                            @elseif ($details->rate_from and $details->rate_to)
                                                <span>{{ __('$') . $details->rate_from . __(' - ') . __('$') . $details->rate_to . __('/hour') }}</span>
                                            @endif

                                        </td>

                                    </tr>
                                    <tr class="bg-white dark:bg-gray-800">
                                        <td class="px-6 py-4 font-bold  text-gray-900">
                                            Job Types:
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $details->availability ? $details->availability : null }}
                                        </td>

                                    </tr>
                                    <tr class="bg-white dark:bg-gray-800">
                                        <td class="px-6 py-4 font-bold  text-gray-900">
                                            Work Location:
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $details->work_location ? $details->work_location : null }}
                                        </td>

                                    </tr>
                                    @if ($details->education)
                                        <tr class="bg-white dark:bg-gray-800">
                                            <td class="px-6 py-4 font-bold  text-gray-900">
                                                Education :
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $details->education ? $details->education : null }}
                                            </td>

                                        </tr>
                                    @endif
                                    <tr class="bg-white dark:bg-gray-800">
                                        <th scope="row"
                                            class="font-bold  text-gray-900 px-6 py-4  whitespace-nowrap dark:text-white">
                                            Location:
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $details->location ? $details->location->location_name : null }}
                                        </td>

                                    </tr>
                                    <tr class="bg-white dark:bg-gray-800">
                                        <td class="px-6 py-4 font-bold  text-gray-900">
                                            Address:
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $details->location ? $details->location->address : null }}
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        {{-- <section class="py-10 md:py-16 text-center">
            <jobs-form />
        </section> --}}
        @include('layouts.FooterIcons')
    </div>
@endsection
