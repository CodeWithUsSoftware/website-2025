@extends('layouts.master')

@section('header_scripts')
    {{-- OwlCarousel --}}
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
@endsection

@section('title', 'School Program | Code With Us')
@section('content')
    <div>
        <section class="pb-0">
            <img src="/images/school_programs/school_program.jpg" alt="" class="w-full h-auto" />
        </section>

        <section class="lg:py-10 md:py-10" style="margin-top:5%;">
            <div class="max-w-5xl mx-auto px-4 sm:px-6 md:px-8 text-center space-y-3">
                <h3>{{ trans('school_program.school_program_with_us') }} assa</h3>
                <p class="text-md">{!! trans('school_program.school_program_with_us_details') !!}</p>
            </div>
        </section>

        <section class="mb-10">
            <div class="items-center justify-center text-center py-3 pt-10 text-sm">
                <div>
                    <a href="/computer-science-standards/united-states">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-primary mx-auto" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </a>
                    <p class="underline text-xl text-primary py-3">
                        <a href="/computer-science-standards/united-states">
                            {{ trans('school.please_click_here') }}
                        </a>
                    </p>
                </div>
                <div>
                    <p class="text-lg text-black px-2">{{ trans('schools.united_states_K-12_computer') }}</p>
                </div>
            </div>
        </section>
        {{-- Owl Carousel --}}
        <section>
            <div class="max-w-5xl mx-auto">
                <div class="mb-10">
                    <h3 class="text-center">{{ trans('schools.most_popular_coding') }}</h3>
                </div>
                <div class="owl-carousel owl-theme">
                    <div class="item">
                        <a href="/curriculum/scratch.pdf" class="space-y-2" target="_blank">
                            <img loading="lazy" src="/images/topics/new_images/Scratch.jpg" alt="scratch"
                                class="rounded-3xl">
                            <div class="text-center">
                                <div class="text-center">
                                    <button type="button"
                                        class="mb-5 shadow-primary space-x-1 inline-flex items-center px-4 py-2 text-sm border border-primary rounded-full text-white bg-primary hover:bg-primary-darker-1 hover:text-white focus:outline-none">
                                        {{ trans('schools.scratch_curriculum') }}
                                    </button>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="/curriculum/python.pdf" class="space-y-2" target="_blank">
                            <img loading="lazy" src="/images/topics/new_images/Python.jpg" alt="scratch"
                                class="rounded-3xl">
                            <div class="text-center">
                                <button type="button"
                                    class="mb-5 shadow-primary space-x-1 inline-flex items-center px-4 py-2 text-sm border border-primary rounded-full text-white bg-primary hover:bg-primary-darker-1 hover:text-white focus:outline-none">
                                    {{ trans('schools.python_curriculum') }}
                                </button>
                            </div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="/curriculum/web_design.pdf" class="space-y-2" target="_blank">
                            <img loading="lazy" src="/images/topics/new_images/Web_Design.jpg" alt="scratch"
                                class="rounded-3xl">
                            <div class="text-center">
                                <button type="button"
                                    class="mb-5 shadow-primary space-x-1 inline-flex items-center px-4 py-2 text-sm border border-primary rounded-full text-white bg-primary hover:bg-primary-darker-1 hover:text-white focus:outline-none">
                                    {{ trans('schools.web_design_curriculum') }}
                                </button>
                            </div>

                        </a>
                    </div>
                    <div class="item">
                        <a href="/curriculum/java.pdf" class="space-y-2" target="_blank">
                            <img loading="lazy" src="/images/topics/new_images/Java.jpg" alt="scratch" class="rounded-3xl">
                            <div class="text-center">
                                <button type="button"
                                    class="mb-5 shadow-primary space-x-1 inline-flex items-center px-4 py-2 text-sm border border-primary rounded-full text-white bg-primary hover:bg-primary-darker-1 hover:text-white focus:outline-none">
                                    {{ trans('schools.java_curriculum') }}
                                </button>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-10 md:py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8 text-center">
                <h3 class="text-black-lighter-1">{{ trans('schools.school_programs_comparison_chart') }}</h3>
            </div>

            <section class="bg-white p-10">
                <div class="max-w-6xl mx-auto">
                    <div class="grid grid-cols-1 md:grid-col-12 sm:grid-cols-12 gap-10 flex flex-col">
                        <div class="col-span-4 flex-1">
                            <div class="relative card p-3 ">
                                <div class="absolute">
                                    <img src="/images/school_programs/blue.png" class="object-cover w-full -ml-3"
                                        style="margin-top: -2rem;">
                                </div>
                                <div class="absolute text-white p-2 text-md p-6">
                                    <span>IN-PERSON </span><br>
                                    <span>INSTRUCTION</span>
                                </div>
                                <div>
                                    <ul class="border-l-2  border-l-primary shadow-2xl">
                                        <li class="p-2  ml-0 text-xs">
                                            <div class="flex space-x-5">
                                                <div class="text-transparent">1</div>
                                            </div>
                                        </li>
                                        <li class="p-2 border-t border-indigo-200 ml-0 text-xs">
                                            <div class="flex space-x-5">
                                                <div class="text-transparent">1</div>
                                            </div>
                                        </li>
                                        <li class="p-2 border-t border-indigo-200 ml-0 text-xs">
                                            <div class="flex space-x-5">
                                                <div class="text-transparent">1</div>
                                            </div>
                                        </li>

                                        <li class="p-2 border-t border-indigo-200 ml-0 text-xs">
                                            <div class="flex space-x-5">
                                                <div class="flex space-x-3">
                                                    <div class="border border-2 border-black w-6 h-6">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-5 w-5 text-primary" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M5 13l4 4L19 7" />
                                                        </svg>
                                                    </div>
                                                    <p>{{ trans('school.in_person1') }}</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="p-2 border-t border-indigo-200 ml-0 text-xs">
                                            <div class="flex space-x-5">
                                                <div class="text-transparent">1</div>
                                            </div>
                                        </li>
                                        <li class="p-2 border-t border-indigo-200 ml-0 text-xs">
                                            <div class="flex space-x-5">
                                                <div class="flex space-x-3">
                                                    <div class="border border-2 border-black w-6 h-6">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-5 w-5 text-primary" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M5 13l4 4L19 7" />
                                                        </svg>
                                                    </div>
                                                    <p>{{ trans('school.in_person2') }}</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="p-2 border-t border-indigo-200 ml-0 text-xs">
                                            <div class="flex space-x-5">
                                                <div class="text-transparent">1</div>
                                            </div>
                                        </li>
                                        <li class="p-2 border-t border-indigo-200 ml-0 text-xs">
                                            <div class="flex space-x-5">
                                                <div class="flex space-x-3">
                                                    <div class="border border-2 border-black w-6 h-6">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-5 w-5 text-primary" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M5 13l4 4L19 7" />
                                                        </svg>
                                                    </div>
                                                    <p>{{ trans('school.in_person3') }}</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="p-2 border-t border-indigo-200 ml-0 text-xs">
                                            <div class="flex space-x-5">
                                                <div class="text-transparent">1</div>
                                            </div>
                                        </li>
                                        <li class="p-2 border-t border-indigo-200 ml-0 text-xs">
                                            <div class="flex space-x-5">
                                                <div class="flex space-x-3">
                                                    <div class="border border-2 border-black w-6 h-6">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-5 w-5 text-primary" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M5 13l4 4L19 7" />
                                                        </svg>
                                                    </div>
                                                    <p>{{ trans('school.in_person4') }}</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="p-2 border-t border-indigo-200 ml-0 text-xs">
                                            <div class="flex space-x-5">
                                                <div class="text-transparent">1</div>
                                            </div>
                                        </li>
                                        <li class="p-2 border-t border-indigo-200 ml-0 text-xs">
                                            <div class="flex space-x-5">
                                                <div class="flex space-x-3">
                                                    <div class="border border-2 border-black w-6 h-6">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-5 w-5 text-primary" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M5 13l4 4L19 7" />
                                                        </svg>
                                                    </div>
                                                    <p>{{ trans('school.in_person5') }}</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="p-2 border-t border-indigo-200 ml-0 text-xs">
                                            <div class="flex space-x-5">
                                                <div class="text-transparent">1</div>
                                            </div>
                                        </li>
                                        <li class="p-2 border-t border-indigo-200 border-indigo-200 ml-0 text-xs">
                                            <div class="flex space-x-5">
                                                <div class="flex space-x-3">
                                                    <div class="border border-2 border-black w-6 h-6">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-5 w-5 text-primary" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M5 13l4 4L19 7" />
                                                        </svg>
                                                    </div>
                                                    <p>{{ trans('school.in_person6') }}</p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-4 flex-1">
                            <div class="relative card p-3 ">
                                <div class="absolute">
                                    <img src="/images/school_programs/green.png" class="object-cover w-full -ml-0"
                                        style="margin-top: -1.8rem;">
                                </div>
                                <div class="absolute text-white p-2 text-md p-6">
                                    <span>LIVE VIRTUAL </span><br>
                                    <span>INSTRUCTION</span>
                                </div>
                                <div>
                                    <ul class="border-l-2  border-l-success shadow-2xl">
                                        <li class="p-2  ml-0 text-xs">
                                            <div class="flex space-x-5">
                                                <div class="text-transparent">1</div>
                                            </div>
                                        </li>
                                        <li class="p-2 border-t border-indigo-200 ml-0 text-xs">
                                            <div class="flex space-x-5">
                                                <div class="text-transparent">1</div>
                                            </div>
                                        </li>
                                        <li class="p-2 border-t border-indigo-200 ml-0 text-xs">
                                            <div class="flex space-x-5">
                                                <div class="text-transparent">1</div>
                                            </div>
                                        </li>

                                        <li class="p-2 border-t border-indigo-200 ml-0 text-xs">
                                            <div class="flex space-x-5">
                                                <div class="flex space-x-3">
                                                    <div class="border border-2 border-black w-6 h-6">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-5 w-5 text-success" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M5 13l4 4L19 7" />
                                                        </svg>
                                                    </div>
                                                    <p>{{ trans('school.live_virtual1') }}</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="p-2 border-t border-indigo-200 ml-0 text-xs">
                                            <div class="flex space-x-5">
                                                <div class="text-transparent">1</div>
                                            </div>
                                        </li>
                                        <li class="p-2 border-t border-indigo-200 ml-0 text-xs">
                                            <div class="flex space-x-5">
                                                <div class="flex space-x-3">
                                                    <div class="border border-2 border-black w-6 h-6">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-5 w-5 text-success" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M5 13l4 4L19 7" />
                                                        </svg>
                                                    </div>
                                                    <p>{{ trans('school.live_virtual2') }}</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="p-2 border-t border-indigo-200 ml-0 text-xs">
                                            <div class="flex space-x-5">
                                                <div class="text-transparent">1</div>
                                            </div>
                                        </li>
                                        <li class="p-2 border-t border-indigo-200 ml-0 text-xs">
                                            <div class="flex space-x-5">
                                                <div class="flex space-x-3">
                                                    <div class="border border-2 border-black w-6 h-6">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-5 w-5 text-success" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M5 13l4 4L19 7" />
                                                        </svg>
                                                    </div>
                                                    <p>{{ trans('school.live_virtual3') }}</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="p-2 border-t border-indigo-200 ml-0 text-xs">
                                            <div class="flex space-x-5">
                                                <div class="text-transparent">1</div>
                                            </div>
                                        </li>
                                        <li class="p-2 border-t border-indigo-200 ml-0 text-xs">
                                            <div class="flex space-x-5">
                                                <div class="flex space-x-3">
                                                    <div class="border border-2 border-black w-6 h-6">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-5 w-5 text-success" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M5 13l4 4L19 7" />
                                                        </svg>
                                                    </div>
                                                    <p>{{ trans('school.live_virtual4') }}</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="p-2 border-t border-indigo-200 ml-0 text-xs">
                                            <div class="flex space-x-5">
                                                <div class="text-transparent">1</div>
                                            </div>
                                        </li>
                                        <li class="p-2 border-t border-indigo-200 ml-0 text-xs">
                                            <div class="flex space-x-5">
                                                <div class="flex space-x-3">
                                                    <div class="border border-2 border-black w-6 h-6">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-5 w-5 text-success" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M5 13l4 4L19 7" />
                                                        </svg>
                                                    </div>
                                                    <p>{{ trans('school.live_virtual5') }}</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="p-2 border-t border-indigo-200 ml-0 text-xs">
                                            <div class="flex space-x-5">
                                                <div class="text-transparent">1</div>
                                            </div>
                                        </li>
                                        <li class="p-2 border-t border-indigo-200 border-indigo-200 ml-0 text-xs">
                                            <div class="flex space-x-5">
                                                <div class="flex space-x-3">
                                                    <div class="border border-2 border-black w-6 h-6">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-5 w-5 text-success" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M5 13l4 4L19 7" />
                                                        </svg>
                                                    </div>
                                                    <p>{{ trans('school.live_virtual6') }}</p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-4 flex-1">
                            <div class="relative card p-3 ">
                                <div class="absolute">
                                    <img src="/images/school_programs/red.png" class="object-cover w-full -ml-1"
                                        style="margin-top: -2rem;">
                                </div>
                                <div class="absolute text-white p-2 text-md p-6">
                                    <span>PROFESSIONAL</span><br>
                                    <span>DEVELOPMENT</span>
                                </div>
                                <div>
                                    <ul class="border-l-2  border-l-danger shadow-2xl">
                                        <li class="p-2  ml-0 text-xs">
                                            <div class="flex space-x-5">
                                                <div class="text-transparent">1</div>
                                            </div>
                                        </li>
                                        <li class="p-2 border-t border-indigo-200 ml-0 text-xs">
                                            <div class="flex space-x-5">
                                                <div class="text-transparent">1</div>
                                            </div>
                                        </li>
                                        <li class="p-2 border-t border-indigo-200 ml-0 text-xs">
                                            <div class="flex space-x-5">
                                                <div class="text-transparent">1</div>
                                            </div>
                                        </li>

                                        <li class="p-2 border-t border-indigo-200 ml-0 text-xs">
                                            <div class="flex space-x-5">
                                                <div class="flex space-x-3">
                                                    <div class="border border-2 border-black w-6 h-6">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-5 w-5 text-danger" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M5 13l4 4L19 7" />
                                                        </svg>
                                                    </div>
                                                    <p>{{ trans('school.professional1') }}</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="p-2 border-t border-indigo-200 ml-0 text-xs">
                                            <div class="flex space-x-5">
                                                <div class="text-transparent">1</div>
                                            </div>
                                        </li>
                                        <li class="p-2 border-t border-indigo-200 ml-0 text-xs">
                                            <div class="flex space-x-5">
                                                <div class="flex space-x-3">
                                                    <div class="border border-2 border-black w-6 h-6">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-5 w-5 text-danger" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M5 13l4 4L19 7" />
                                                        </svg>
                                                    </div>
                                                    <p>{{ trans('school.professional2') }} </p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="p-2 border-t border-indigo-200 ml-0 text-xs">
                                            <div class="flex space-x-5">
                                                <div class="text-transparent">1</div>
                                            </div>
                                        </li>
                                        <li class="p-2 border-t border-indigo-200 ml-0 text-xs">
                                            <div class="flex space-x-5">
                                                <div class="flex space-x-3">
                                                    <div class="border border-2 border-black w-6 h-6">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-5 w-5 text-danger" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M5 13l4 4L19 7" />
                                                        </svg>
                                                    </div>
                                                    <p>{{ trans('school.professional3') }}</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="p-2 border-t border-indigo-200 ml-0 text-xs">
                                            <div class="flex space-x-5">
                                                <div class="text-transparent">1</div>
                                            </div>
                                        </li>
                                        <li class="p-2 border-t border-indigo-200 ml-0 text-xs">
                                            <div class="flex space-x-5">
                                                <div class="flex space-x-3">
                                                    <div class="border border-2 border-black w-6 h-6">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-5 w-5 text-danger" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M5 13l4 4L19 7" />
                                                        </svg>
                                                    </div>
                                                    <p>{{ trans('school.professional4') }}</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="p-2 border-t border-indigo-200 ml-0 text-xs">
                                            <div class="flex space-x-5">
                                                <div class="text-transparent">1</div>
                                            </div>
                                        </li>
                                        <li class="p-2 border-t border-indigo-200 ml-0 text-xs">
                                            <div class="flex space-x-5">
                                                <div class="flex space-x-3">
                                                    <div class="border border-2 border-black w-6 h-6">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-5 w-5 text-danger" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M5 13l4 4L19 7" />
                                                        </svg>
                                                    </div>
                                                    <p>{{ trans('school.professional5') }}</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="p-2 border-t border-indigo-200 ml-0 text-xs">
                                            <div class="flex space-x-5">
                                                <div class="text-transparent">1</div>
                                            </div>
                                        </li>
                                        <li class="p-2 border-t border-indigo-200 border-indigo-200 ml-0 text-xs">
                                            <div class="flex space-x-5">
                                                <div class="flex space-x-3">
                                                    <div class="border border-2 border-black w-6 h-6">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-5 w-5 text-danger" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M5 13l4 4L19 7" />
                                                        </svg>
                                                    </div>
                                                    <p>{{ trans('school.professional6') }}</p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="text-center pb-8">
                    <a href="#schoolProgram"
                        class="hover:text-primary text-primary space-x-4 inline-flex items-center px-5 py-2 border border-primary shadow-primary text-base font-medium rounded-full hover:text-white focus:outline-none  ">
                        <span>Request Information</span>
                    </a>
                </div>
            </section>
        </section>

        {{-- <section class="py-10 md:py-20 max-w-5xl mx-auto" id="trial_form">
            <!-- <trial-form phone_number="{{ trans('free_session.phone_number') }}" private_session_fee="{{ trans('free_session.private_session_fee') }}" private_session="{{ trans('free_session.private_session') }}" free_trial="{{ trans('free_session.free_trial') }}" group_session="{{ trans('free_session.group_session') }}" free_session_email="{{ trans('free_session.email') }}" trial="{{ trans('free_session.trial') }}" /> -->
            <trial-form-for-schools-checkout free_session_email="{{ trans('free_session.email') }}"
                technology_requirements="{{ trans('school_free_session.technology_requirements') }}"
                phone_number="{{ trans('free_session.phone_number') }}"
                :drive_link="'https://drive.google.com/file/d/{!! trans('email_tc_file.tc_file_link') !!}/view'"/>
        </section> --}}

        <section>
            <div class="items-center justify-center text-center py-3 pt-10 text-sm">
                <div>
                    <a href="https://calendly.com/info-cwu" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-primary mx-auto" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </a>
                </div>
                <p class="underline text-xl text-primary py-3">
                    <a href="https://calendly.com/info-cwu" target="_blank">
                        {{ trans('school.please_click_here') }}
                    </a>
                </p>
                <p class="text-lg text-black px-3">
                    {{ trans('schools.schedule_meeting_with_our_school_program_team.') }}
                </p>
            </div>
        </section>

        {{-- <section class="py-10 md:py-20">
            <school-program-form
                send_us_your_school_program_details="{{ trans('school_program.send_us_your_school_program_details') }}"
                fill_school_program_form="{{ trans('school_program.fill_school_program_form') }}" />
        </section> --}}

        <section class="py-10" id="faqs">
            <div class="px-3 md:px-0">
                <div class="bg-white p-5 shadow md:max-w-5xl md:mx-auto rounded-xl space-y-2">
                    <div class="bg-primary p-5 rounded-lg">
                        <p class="text-white">{{ trans('FAQs.school_heading') }}</p>
                    </div>
                    <div tabindex="0" class="border rounded-lg border-transparent ">
                        <div
                            class="accordion flex items-center justify-between p-4 rounded text-black-lighter-1  cursor-pointer bg-gray-100">
                            <div>{{ trans('FAQs.school_q1') }}</div>
                            <svg class="w-4 h-4 text-black-lighter-1 duration-300" viewBox="0 0 13 7" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.072 1.07143C12.072 0.982143 12.0274 0.881696 11.9604 0.814732L11.4024 0.256696C11.3354 0.189732 11.235 0.145089 11.1457 0.145089C11.0564 0.145089 10.956 0.189732 10.889 0.256696L6.50285 4.64286L2.11669 0.256696C2.04973 0.189732 1.94928 0.145089 1.85999 0.145089C1.75955 0.145089 1.67026 0.189732 1.6033 0.256696L1.04526 0.814732C0.978298 0.881696 0.933655 0.982143 0.933655 1.07143C0.933655 1.16071 0.978298 1.26116 1.04526 1.32812L6.24615 6.52902C6.31312 6.59598 6.41357 6.64062 6.50285 6.64062C6.59214 6.64062 6.69258 6.59598 6.75955 6.52902L11.9604 1.32812C12.0274 1.26116 12.072 1.16071 12.072 1.07143Z"
                                    fill="black"></path>
                            </svg>
                        </div>
                        <div class="py-2 px-6 panel">
                            <p>{{ trans('FAQs.school_a1') }}</p>
                        </div>
                    </div>
                    <div tabindex="0" class="border rounded-lg border-transparent ">
                        <div
                            class="accordion flex items-center justify-between p-4 rounded text-black-lighter-1  cursor-pointer bg-gray-100">
                            <div>{{ trans('FAQs.school_q2') }}</div>
                            <svg class="w-4 h-4 text-black-lighter-1 duration-300" viewBox="0 0 13 7" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.072 1.07143C12.072 0.982143 12.0274 0.881696 11.9604 0.814732L11.4024 0.256696C11.3354 0.189732 11.235 0.145089 11.1457 0.145089C11.0564 0.145089 10.956 0.189732 10.889 0.256696L6.50285 4.64286L2.11669 0.256696C2.04973 0.189732 1.94928 0.145089 1.85999 0.145089C1.75955 0.145089 1.67026 0.189732 1.6033 0.256696L1.04526 0.814732C0.978298 0.881696 0.933655 0.982143 0.933655 1.07143C0.933655 1.16071 0.978298 1.26116 1.04526 1.32812L6.24615 6.52902C6.31312 6.59598 6.41357 6.64062 6.50285 6.64062C6.59214 6.64062 6.69258 6.59598 6.75955 6.52902L11.9604 1.32812C12.0274 1.26116 12.072 1.16071 12.072 1.07143Z"
                                    fill="black"></path>
                            </svg>
                        </div>
                        <div class="py-2 px-6 panel">
                            <p>{!! trans('FAQs.school_a2') !!}</p>
                        </div>
                    </div>
                    <div tabindex="0" class="border rounded-lg border-transparent ">
                        <div
                            class="accordion flex items-center justify-between p-4 rounded text-black-lighter-1  cursor-pointer bg-gray-100">
                            <div>{{ trans('FAQs.school_q3') }}</div>
                            <svg class="w-4 h-4 text-black-lighter-1 duration-300" viewBox="0 0 13 7" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.072 1.07143C12.072 0.982143 12.0274 0.881696 11.9604 0.814732L11.4024 0.256696C11.3354 0.189732 11.235 0.145089 11.1457 0.145089C11.0564 0.145089 10.956 0.189732 10.889 0.256696L6.50285 4.64286L2.11669 0.256696C2.04973 0.189732 1.94928 0.145089 1.85999 0.145089C1.75955 0.145089 1.67026 0.189732 1.6033 0.256696L1.04526 0.814732C0.978298 0.881696 0.933655 0.982143 0.933655 1.07143C0.933655 1.16071 0.978298 1.26116 1.04526 1.32812L6.24615 6.52902C6.31312 6.59598 6.41357 6.64062 6.50285 6.64062C6.59214 6.64062 6.69258 6.59598 6.75955 6.52902L11.9604 1.32812C12.0274 1.26116 12.072 1.16071 12.072 1.07143Z"
                                    fill="black"></path>
                            </svg>
                        </div>
                        <div class="py-2 px-6 panel">
                            <p>{{ trans('FAQs.school_a3') }}</p>
                        </div>
                    </div>
                    <div tabindex="0" class="border rounded-lg border-transparent ">
                        <div
                            class="accordion flex items-center justify-between p-4 rounded text-black-lighter-1  cursor-pointer bg-gray-100">
                            <div>{{ trans('FAQs.school_q4') }}</div>
                            <svg class="w-4 h-4 text-black-lighter-1 duration-300" viewBox="0 0 13 7" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.072 1.07143C12.072 0.982143 12.0274 0.881696 11.9604 0.814732L11.4024 0.256696C11.3354 0.189732 11.235 0.145089 11.1457 0.145089C11.0564 0.145089 10.956 0.189732 10.889 0.256696L6.50285 4.64286L2.11669 0.256696C2.04973 0.189732 1.94928 0.145089 1.85999 0.145089C1.75955 0.145089 1.67026 0.189732 1.6033 0.256696L1.04526 0.814732C0.978298 0.881696 0.933655 0.982143 0.933655 1.07143C0.933655 1.16071 0.978298 1.26116 1.04526 1.32812L6.24615 6.52902C6.31312 6.59598 6.41357 6.64062 6.50285 6.64062C6.59214 6.64062 6.69258 6.59598 6.75955 6.52902L11.9604 1.32812C12.0274 1.26116 12.072 1.16071 12.072 1.07143Z"
                                    fill="black"></path>
                            </svg>
                        </div>
                        <div class="py-2 px-6 panel">
                            <p>{{ trans('FAQs.school_a4') }}</p>
                        </div>
                    </div>
                    <div tabindex="0" class="border rounded-lg border-transparent ">
                        <div
                            class="accordion flex items-center justify-between p-4 rounded text-black-lighter-1  cursor-pointer bg-gray-100">
                            <div>{{ trans('FAQs.school_q5') }}</div>
                            <svg class="w-4 h-4 text-black-lighter-1 duration-300" viewBox="0 0 13 7" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.072 1.07143C12.072 0.982143 12.0274 0.881696 11.9604 0.814732L11.4024 0.256696C11.3354 0.189732 11.235 0.145089 11.1457 0.145089C11.0564 0.145089 10.956 0.189732 10.889 0.256696L6.50285 4.64286L2.11669 0.256696C2.04973 0.189732 1.94928 0.145089 1.85999 0.145089C1.75955 0.145089 1.67026 0.189732 1.6033 0.256696L1.04526 0.814732C0.978298 0.881696 0.933655 0.982143 0.933655 1.07143C0.933655 1.16071 0.978298 1.26116 1.04526 1.32812L6.24615 6.52902C6.31312 6.59598 6.41357 6.64062 6.50285 6.64062C6.59214 6.64062 6.69258 6.59598 6.75955 6.52902L11.9604 1.32812C12.0274 1.26116 12.072 1.16071 12.072 1.07143Z"
                                    fill="black"></path>
                            </svg>
                        </div>
                        <div class="py-2 px-6 panel">
                            <p>{{ trans('FAQs.school_a5') }}</p>
                        </div>
                    </div>
                    <div tabindex="0" class="border rounded-lg border-transparent ">
                        <div
                            class="accordion flex items-center justify-between p-4 rounded text-black-lighter-1  cursor-pointer bg-gray-100">
                            <div>{{ trans('FAQs.school_q6') }}</div>
                            <svg class="w-4 h-4 text-black-lighter-1 duration-300" viewBox="0 0 13 7" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.072 1.07143C12.072 0.982143 12.0274 0.881696 11.9604 0.814732L11.4024 0.256696C11.3354 0.189732 11.235 0.145089 11.1457 0.145089C11.0564 0.145089 10.956 0.189732 10.889 0.256696L6.50285 4.64286L2.11669 0.256696C2.04973 0.189732 1.94928 0.145089 1.85999 0.145089C1.75955 0.145089 1.67026 0.189732 1.6033 0.256696L1.04526 0.814732C0.978298 0.881696 0.933655 0.982143 0.933655 1.07143C0.933655 1.16071 0.978298 1.26116 1.04526 1.32812L6.24615 6.52902C6.31312 6.59598 6.41357 6.64062 6.50285 6.64062C6.59214 6.64062 6.69258 6.59598 6.75955 6.52902L11.9604 1.32812C12.0274 1.26116 12.072 1.16071 12.072 1.07143Z"
                                    fill="black"></path>
                            </svg>
                        </div>
                        <div class="py-2 px-6 panel">
                            <p>{{ trans('FAQs.school_a6') }}</p>
                        </div>
                    </div>
                    <div tabindex="0" class="border rounded-lg border-transparent ">
                        <div
                            class="accordion flex items-center justify-between p-4 rounded text-black-lighter-1  cursor-pointer bg-gray-100">
                            <div>{{ trans('FAQs.school_q7') }}</div>
                            <svg class="w-4 h-4 text-black-lighter-1 duration-300" viewBox="0 0 13 7" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.072 1.07143C12.072 0.982143 12.0274 0.881696 11.9604 0.814732L11.4024 0.256696C11.3354 0.189732 11.235 0.145089 11.1457 0.145089C11.0564 0.145089 10.956 0.189732 10.889 0.256696L6.50285 4.64286L2.11669 0.256696C2.04973 0.189732 1.94928 0.145089 1.85999 0.145089C1.75955 0.145089 1.67026 0.189732 1.6033 0.256696L1.04526 0.814732C0.978298 0.881696 0.933655 0.982143 0.933655 1.07143C0.933655 1.16071 0.978298 1.26116 1.04526 1.32812L6.24615 6.52902C6.31312 6.59598 6.41357 6.64062 6.50285 6.64062C6.59214 6.64062 6.69258 6.59598 6.75955 6.52902L11.9604 1.32812C12.0274 1.26116 12.072 1.16071 12.072 1.07143Z"
                                    fill="black"></path>
                            </svg>
                        </div>
                        <div class="py-2 px-6 panel">
                            <p>{{ trans('FAQs.school_a7') }}</p>
                        </div>
                    </div>
                    <div tabindex="0" class="border rounded-lg border-transparent ">
                        <div
                            class="accordion flex items-center justify-between p-4 rounded text-black-lighter-1  cursor-pointer bg-gray-100">
                            <div>{{ trans('FAQs.school_q8') }}</div>
                            <svg class="w-4 h-4 text-black-lighter-1 duration-300" viewBox="0 0 13 7" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.072 1.07143C12.072 0.982143 12.0274 0.881696 11.9604 0.814732L11.4024 0.256696C11.3354 0.189732 11.235 0.145089 11.1457 0.145089C11.0564 0.145089 10.956 0.189732 10.889 0.256696L6.50285 4.64286L2.11669 0.256696C2.04973 0.189732 1.94928 0.145089 1.85999 0.145089C1.75955 0.145089 1.67026 0.189732 1.6033 0.256696L1.04526 0.814732C0.978298 0.881696 0.933655 0.982143 0.933655 1.07143C0.933655 1.16071 0.978298 1.26116 1.04526 1.32812L6.24615 6.52902C6.31312 6.59598 6.41357 6.64062 6.50285 6.64062C6.59214 6.64062 6.69258 6.59598 6.75955 6.52902L11.9604 1.32812C12.0274 1.26116 12.072 1.16071 12.072 1.07143Z"
                                    fill="black"></path>
                            </svg>
                        </div>
                        <div class="py-2 px-6 panel">
                            <p>{{ trans('FAQs.school_a8') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('layouts.FooterIcons')
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel({
                margin: 20,
                loop: false,
                autoplay: false,
                autoplayTimeout: 2000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: false
                    },
                    600: {
                        items: 2,
                        nav: false
                    },
                    1000: {
                        items: 4,
                        nav: false
                    }
                }
            });

            // FAQs
            var acc = document.getElementsByClassName("accordion");
            var i;

            for (i = 0; i < acc.length; i++) {
                acc[i].addEventListener("click", function() {
                    this.classList.toggle("active");
                    var panel = this.nextElementSibling;
                    var c = this.children;

                    if (panel.style.display === "block") {
                        panel.style.display = "none";
                        c[1].classList.remove("svg_arrow_up");
                    } else {
                        panel.style.display = "block";
                        c[1].classList.add("svg_arrow_up");

                    }
                });
            }
        });
    </script>
@endsection
