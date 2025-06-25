@extends('layouts.master')
@section('title', 'Coding Camps For Kids | Code With Us')
@section('style')
    <style>
        .grecaptcha-badge {
            display: block !important;
        }
    </style>
@endsection

@section('title', 'Coding Camps For Kids | Code With Us')

@section('content')
    <div>
        <section class="pb-0 hidden md:block">
            <div class="relative max-w-full mx-auto ">
                <div class="relative py-10 px-8 overflow-hidden lg:px-16 takeover-panel-topic">
                    <div class="absolute inset-0  mix-blend-multiply">
                        <img src="/images/camps/banner_camps_overlay.webp" alt="" class="w-full h-full object-cover" />
                    </div>
                    <div class="relative lg:top-1/4 md:top-2/3">
                        <slot>
                            <div class="md:pl-36">
                                <h1 class="text-center text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl py-6">
                                    <span class="block text-white">{{ trans('camps.coding_camps') }}</span>
                                </h1>
                                <p class="text-white text-center -mt-5">{{ trans('camps.coding_camps_available') }}</p>
                                <p
                                    class="flex flex-col md:flex-row items-center md:justify-center mx-auto space-y-5 md:space-y-0 mt-6 max-w-lg md:space-x-10 mx-auto text-center text-xl text-indigo-200 sm:max-w-3xl">
                                    <a href="#campsForm"
                                        class="w-48 space-x-4 inline-flex items-center justify-center py-2 border border-white rounded-full text-white hover:text-white focus:outline-none">
                                        <span>{{ trans('camps.find_out_more') }}</span>
                                    </a>
                                    <a href="#campsForm"
                                        class="w-48 space-x-4 inline-flex items-center justify-center py-2 border border-white rounded-full text-white hover:text-white focus:outline-none">
                                        <span>{{ trans('camps.reserve') }}</span>
                                    </a>
                                </p>
                            </div>
                        </slot>
                    </div>
                </div>
            </div>
        </section>

        <section class="pt-10 md:pt-20 pb-5 md:pb-10 hidden md:block">
            <div class="max-w-5xl mx-auto ">
                <div class="text-center">
                    <h4 id="campsForm">{{ trans('camps.camps_signup') }}</h4>
                    <p>{{ trans('camps.camps_signup_detail') }}</p>
                </div>
            </div>
        </section>

        <!-- Trust Banner -->
        <section class="py-4 bg-gradient-to-r from-blue-50 to-indigo-50 hidden md:block">
            <div class="max-w-5xl mx-auto">
                <div class="flex items-center justify-center">
                    <div class="relative overflow-hidden rounded-lg shadow-md bg-white p-6 border border-blue-100">
                        <!-- Decorative elements -->
                        <div class="absolute -top-6 -left-6 w-16 h-16 bg-primary/10 rounded-full"></div>
                        <div class="absolute -bottom-6 -right-6 w-16 h-16 bg-primary/10 rounded-full"></div>

                        <div class="flex flex-col md:flex-row items-center gap-4 relative z-10">
                            <!-- Trust badge -->
                            <div class="flex-shrink-0">
                                <div class="p-3 bg-primary/10 rounded-full">
                                    <svg class="w-10 h-10 text-primary" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <path
                                            d="M12 2L4 5v6.09c0 5.05 3.41 9.76 8 10.91 4.59-1.15 8-5.86 8-10.91V5l-8-3zm-1.06 13.54L7.4 12l1.41-1.41 2.12 2.12 4.24-4.24 1.41 1.41-5.64 5.66z" />
                                    </svg>
                                </div>
                            </div>

                            <div class="text-center md:text-left">
                                <p class="text-lg text-gray-800">
                                    Trusted by over <span class="text-primary font-bold">2100+</span> schools and
                                    <span class="relative inline-block">
                                        thousands
                                        <span class="absolute bottom-0 left-0 w-full h-1 bg-yellow-300"></span>
                                    </span>
                                    of students around the world.
                                </p>

                                <!-- Partner logos could go here -->
                                <div class="flex justify-center md:justify-start gap-4 mt-2">
                                    <div class="w-2 h-2 rounded-full bg-primary mt-2"></div>
                                    <div class="w-2 h-2 rounded-full bg-primary mt-2"></div>
                                    <div class="w-2 h-2 rounded-full bg-primary mt-2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="max-w-5xl mx-auto">
                <div id="desktop-form">
                    <camps-form :drive_link="'https://drive.google.com/file/d/{!! trans('email_tc_file.tc_file_link') !!}/view'"
                        :seasonal_camps_dp="'{!! trans('pricing.seasonal_camps_discounted_price') !!}'" :seasonal_camps_fp="'{!! trans('pricing.seasonal_camps_full_price') !!}'" />
                </div>
                <div id="mobile-form">
                    <camps-form-mobile :drive_link="'https://drive.google.com/file/d/{!! trans('email_tc_file.tc_file_link') !!}/view'"
                        :seasonal_camps_dp="'{!! trans('pricing.seasonal_camps_discounted_price') !!}'" :seasonal_camps_fp="'{!! trans('pricing.seasonal_camps_full_price') !!}'" />
                </div>
            </div>
        </section>

        <section class="py-10 md:py-20 hidden md:block">
            <custom-camps-form />
        </section>

        <section class="py-10 md:py-20 hidden md:block">
            <div class="max-w-5xl mx-auto px-2">
                <h4 class="text-center">{{ trans('camps.exciting_code_camps') }}</h4>
                <div class="text-center -mt-4 pb-10">
                    <a href="#campsForm">{{ trans('camps.click_here_to_see_camp') }}</a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 flex items-center justify-center">
                    <div>
                        <img loading="lazy" class="rounded" src="/images/camps/1.jpg" alt="">
                    </div>
                    <div>
                        {!! trans('camps.camp_availability_detial') !!}
                    </div>
                </div>
            </div>
        </section>

        <section class="py-10 md:py-20 hidden md:block">
            <div class="max-w-5xl mx-auto px-2">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 flex items-center justify-center">
                    <div class="md:order-2">
                        <img loading="lazy" class="" src="/images/camps/2.jpg" alt="">
                    </div>
                    <div>
                        <h5>{{ trans('camps.about_camp') }}</h5>
                        <p>{{ trans('camps.about_camp_description') }}</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-10 md:py-20 hidden md:block">
            <div class="max-w-5xl mx-auto px-2">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 flex items-center justify-center">
                    <div>
                        <img loading="lazy" class="rounded" src="/images/camps/3.jpg" alt="">
                    </div>
                    <div>
                        <h5>{{ trans('camps.project_based_camps') }}</h5>
                        <p>{{ trans('camps.project_based_camp_description') }}</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-10 md:py-20 hidden md:block">
            <div class="max-w-5xl mx-auto px-2">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 flex items-center justify-center">
                    <div class="md:order-2">
                        <img loading="lazy" class="rounded" src="/images/camps/4.jpg" alt="">
                    </div>
                    <div>
                        <h5>{{ trans('camps.Also') }}</h5>
                        <p>{{ trans('camps.Also_description') }}</p>
                    </div>
                </div>
            </div>
        </section>
        {{-- Camps Pricing --}}
        <section class="py-20 hidden md:block">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8 text-center">
                {!! trans('camps.prices_for_kids_coding') !!}
            </div>
            <div
                class="max-w-3xl mx-auto grid grid-cols-1 md:grid-cols-2 p-10 md:p-2 space-y-5 md:space-y-0 md:space-x-5 md:pt-10">
                <div class="bg-white rounded-3xl shadow-card">
                    <div><img class="h-44 w-full rounded-t-3xl" src="/images/pricing_guide/camps/1.webp" alt="coding_camps">
                    </div>
                    <div class="pt-6 pb-8 px-10">
                        <div class="text-center">
                            <span
                                class="inline-flex px-8 py-2 text-sm text-camps">{{ trans('camps.half_day_camp') }}</span>
                        </div>
                        <h3 class="text-black-lighter-2 tracking-wide text-center">
                            {!! trans('camps.half_day_camp_amount') !!}
                        </h3>
                        <p class="text-center">{{ trans('camps.online_In_person') }}</p>
                        <ul role="list" class="mt-6 pb-8 space-y-7">
                            {!! trans('camps.online_In_person_detail') !!}
                        </ul>
                        <div class="text-center">
                            <a href="#campsForm"
                                class="space-x-4 inline-flex items-center px-5 py-2 border border-camps rounded-full text-camps hover:bg-camps hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-camps">
                                Book Now
                            </a>
                        </div>
                    </div>
                    <div class="bg-camps h-8 rounded-b-3xl"></div>
                </div>
                <div class="bg-white rounded-3xl shadow-card">
                    <div><img class="h-44 w-full rounded-t-3xl" src="/images/pricing_guide/camps/2.webp"
                            alt="coding_camps">
                    </div>
                    <div class="pt-6 pb-8 px-10">
                        <div class="text-center">
                            <span
                                class="inline-flex px-8 py-2 text-sm text-camps">{{ trans('camps.full_day_camp') }}</span>
                        </div>
                        <h3 class="text-black-lighter-2 tracking-wide text-center">
                            {!! trans('camps.full_day_camp_amount') !!}
                        </h3>
                        <p class="text-center">{{ trans('camps.online_in_person') }}</p>

                        <ul role="list" class="mt-6 pb-8 space-y-7">
                            {!! trans('camps.full_day_camp_details') !!}
                        </ul>
                        <div class="text-center">
                            <a href="#campsForm"
                                class="space-x-4 inline-flex items-center px-5 py-2 border border-camps rounded-full text-camps hover:bg-camps hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-camps">
                                Book Now
                            </a>
                        </div>
                    </div>
                    <div class="bg-camps h-8 rounded-b-3xl"></div>
                </div>
            </div>
        </section>
        <section class="py-10 md:py-20">
            @include('layouts.TrustedBySiliconValley')
        </section>

        @include('layouts.FooterIcons')
    </div>
@endsection

@section('footer_scripts')
    <script>
        (function() {
            'use strict';

            // Store form templates for recreation
            let desktopFormHTML = '';
            let mobileFormHTML = '';
            let formContainer = null;

            // Immediate cleanup to prevent ID conflicts
            function immediateCleanup() {
                const isMobile = window.innerWidth < 768;
                const desktopForm = document.getElementById('desktop-form');
                const mobileForm = document.getElementById('mobile-form');

                if (isMobile && desktopForm) {
                    desktopForm.remove();
                } else if (!isMobile && mobileForm) {
                    mobileForm.remove();
                }
            }

            function storeFormTemplates() {
                const desktopForm = document.getElementById('desktop-form');
                const mobileForm = document.getElementById('mobile-form');

                if (desktopForm) {
                    desktopFormHTML = desktopForm.outerHTML;
                    formContainer = desktopForm.parentElement;
                }
                if (mobileForm) {
                    mobileFormHTML = mobileForm.outerHTML;
                    if (!formContainer) {
                        formContainer = mobileForm.parentElement;
                    }
                }
            }

            function updateFormVisibility() {
                const isMobile = window.innerWidth < 768;
                const desktopForm = document.getElementById('desktop-form');
                const mobileForm = document.getElementById('mobile-form');

                if (isMobile) {
                    // Remove desktop form if it exists
                    if (desktopForm) {
                        desktopForm.remove();
                    }
                    // Create mobile form if it doesn't exist
                    if (!mobileForm && mobileFormHTML && formContainer) {
                        formContainer.insertAdjacentHTML('beforeend', mobileFormHTML);
                        // Give Vue a moment to initialize the new component
                        setTimeout(() => {
                            if (window.Vue && window.Vue.nextTick) {
                                window.Vue.nextTick();
                            }
                        }, 50);
                    }
                } else {
                    // Remove mobile form if it exists
                    if (mobileForm) {
                        mobileForm.remove();
                    }
                    // Create desktop form if it doesn't exist
                    if (!desktopForm && desktopFormHTML && formContainer) {
                        formContainer.insertAdjacentHTML('beforeend', desktopFormHTML);
                        // Give Vue a moment to initialize the new component
                        setTimeout(() => {
                            if (window.Vue && window.Vue.nextTick) {
                                window.Vue.nextTick();
                            }
                        }, 50);
                    }
                }
            }

            // Handle resize events efficiently
            let resizeTimeout;

            function handleResize() {
                clearTimeout(resizeTimeout);
                resizeTimeout = setTimeout(updateFormVisibility, 100);
            }

            // Execute immediate cleanup first
            immediateCleanup();

            // Initial setup
            function initForms() {
                storeFormTemplates();
                updateFormVisibility();
                window.addEventListener('resize', handleResize);
            }

            // Execute when DOM is ready
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', initForms);
            } else {
                initForms();
            }
        })();
    </script>
@endsection
