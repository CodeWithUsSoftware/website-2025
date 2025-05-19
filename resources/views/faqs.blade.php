@extends('layouts.master')
@section('header_scripts')
    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
@endsection
@section('title', 'FAQs | Code With Us')
@section('content')
    <div>
        <section class="py-10">
            <h3 class="max-w-7xl mx-auto text-center">{{ trans('FAQs.faqs_page_title') }}</h3>
            <div class="px-3 md:px-0">
                <div class="relative z-20 bg-white p-5 shadow md:max-w-5xl md:mx-auto rounded-xl space-y-2">
                    <div class="bg-primary p-5 rounded-lg">
                        <p class="text-white">{{ trans('FAQs.code_with_us') }}</p>
                        <p class="text-sm text-white">{{ trans('FAQs.detail_about_code_with_us') }}</p>
                    </div>

                    <div tabindex="0" class="border rounded-lg border-transparent">
                        <div
                            class="accordion flex items-center justify-between p-4 rounded text-black-lighter-1  cursor-pointer bg-gray-100">
                            <div>{{ trans('FAQs.about_cwu_question') }}</div>
                            <svg class="w-4 h-4 text-black-lighter-1 duration-300" viewBox="0 0 13 7" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.072 1.07143C12.072 0.982143 12.0274 0.881696 11.9604 0.814732L11.4024 0.256696C11.3354 0.189732 11.235 0.145089 11.1457 0.145089C11.0564 0.145089 10.956 0.189732 10.889 0.256696L6.50285 4.64286L2.11669 0.256696C2.04973 0.189732 1.94928 0.145089 1.85999 0.145089C1.75955 0.145089 1.67026 0.189732 1.6033 0.256696L1.04526 0.814732C0.978298 0.881696 0.933655 0.982143 0.933655 1.07143C0.933655 1.16071 0.978298 1.26116 1.04526 1.32812L6.24615 6.52902C6.31312 6.59598 6.41357 6.64062 6.50285 6.64062C6.59214 6.64062 6.69258 6.59598 6.75955 6.52902L11.9604 1.32812C12.0274 1.26116 12.072 1.16071 12.072 1.07143Z"
                                    fill="black"></path>
                            </svg>
                        </div>
                        <div class="py-2 px-6 panel">
                            <p> {{ trans('FAQs.about_cwu_answer') }}</p>
                        </div>
                    </div>

                    <div tabindex="0" class="border rounded-lg border-transparent">
                        <div
                            class="accordion flex items-center justify-between p-4 rounded text-black-lighter-1  cursor-pointer bg-gray-100">
                            <div>{{ trans('FAQs.location_of_classes_question') }}</div>
                            <svg class="w-4 h-4 text-black-lighter-1 duration-300" viewBox="0 0 13 7" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.072 1.07143C12.072 0.982143 12.0274 0.881696 11.9604 0.814732L11.4024 0.256696C11.3354 0.189732 11.235 0.145089 11.1457 0.145089C11.0564 0.145089 10.956 0.189732 10.889 0.256696L6.50285 4.64286L2.11669 0.256696C2.04973 0.189732 1.94928 0.145089 1.85999 0.145089C1.75955 0.145089 1.67026 0.189732 1.6033 0.256696L1.04526 0.814732C0.978298 0.881696 0.933655 0.982143 0.933655 1.07143C0.933655 1.16071 0.978298 1.26116 1.04526 1.32812L6.24615 6.52902C6.31312 6.59598 6.41357 6.64062 6.50285 6.64062C6.59214 6.64062 6.69258 6.59598 6.75955 6.52902L11.9604 1.32812C12.0274 1.26116 12.072 1.16071 12.072 1.07143Z"
                                    fill="black"></path>
                            </svg>
                        </div>
                        <div class="py-2 px-6 panel">
                            <p> {{ trans('FAQs.location_of_classes_answer') }}</p>
                        </div>
                    </div>

                    <div tabindex="0" class="border rounded-lg border-transparent">
                        <div
                            class="accordion flex items-center justify-between p-4 rounded text-black-lighter-1  cursor-pointer bg-gray-100">
                            <div>{{ trans('FAQs.classes_offered_by_cwu_question') }}</div>
                            <svg class="w-4 h-4 text-black-lighter-1 duration-300" viewBox="0 0 13 7" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.072 1.07143C12.072 0.982143 12.0274 0.881696 11.9604 0.814732L11.4024 0.256696C11.3354 0.189732 11.235 0.145089 11.1457 0.145089C11.0564 0.145089 10.956 0.189732 10.889 0.256696L6.50285 4.64286L2.11669 0.256696C2.04973 0.189732 1.94928 0.145089 1.85999 0.145089C1.75955 0.145089 1.67026 0.189732 1.6033 0.256696L1.04526 0.814732C0.978298 0.881696 0.933655 0.982143 0.933655 1.07143C0.933655 1.16071 0.978298 1.26116 1.04526 1.32812L6.24615 6.52902C6.31312 6.59598 6.41357 6.64062 6.50285 6.64062C6.59214 6.64062 6.69258 6.59598 6.75955 6.52902L11.9604 1.32812C12.0274 1.26116 12.072 1.16071 12.072 1.07143Z"
                                    fill="black"></path>
                            </svg>
                        </div>
                        <div class="py-2 px-6 panel" style="color:#818181;">
                            <p> {!! trans('FAQs.classes_offered_by_cwu_answer') !!}</p>
                        </div>
                    </div>
                    <div tabindex="0" class="border rounded-lg border-transparent">
                        <div
                            class="accordion flex items-center justify-between p-4 rounded text-black-lighter-1  cursor-pointer bg-gray-100">
                            <div>{{ trans('FAQs.teaching_methods_at_cwu_question') }}</div>
                            <svg class="w-4 h-4 text-black-lighter-1 duration-300" viewBox="0 0 13 7" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.072 1.07143C12.072 0.982143 12.0274 0.881696 11.9604 0.814732L11.4024 0.256696C11.3354 0.189732 11.235 0.145089 11.1457 0.145089C11.0564 0.145089 10.956 0.189732 10.889 0.256696L6.50285 4.64286L2.11669 0.256696C2.04973 0.189732 1.94928 0.145089 1.85999 0.145089C1.75955 0.145089 1.67026 0.189732 1.6033 0.256696L1.04526 0.814732C0.978298 0.881696 0.933655 0.982143 0.933655 1.07143C0.933655 1.16071 0.978298 1.26116 1.04526 1.32812L6.24615 6.52902C6.31312 6.59598 6.41357 6.64062 6.50285 6.64062C6.59214 6.64062 6.69258 6.59598 6.75955 6.52902L11.9604 1.32812C12.0274 1.26116 12.072 1.16071 12.072 1.07143Z"
                                    fill="black"></path>
                            </svg>
                        </div>
                        <div class="py-2 px-6 panel">
                            <p> {{ trans('FAQs.teaching_methods_at_cwu_answer') }}</p>
                        </div>
                    </div>
                    <div tabindex="0" class="border rounded-lg border-transparent">
                        <div
                            class="accordion flex items-center justify-between p-4 rounded text-black-lighter-1  cursor-pointer bg-gray-100">
                            <div>{{ trans('FAQs.who_are_teachers_question') }}</div>
                            <svg class="w-4 h-4 text-black-lighter-1 duration-300" viewBox="0 0 13 7" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.072 1.07143C12.072 0.982143 12.0274 0.881696 11.9604 0.814732L11.4024 0.256696C11.3354 0.189732 11.235 0.145089 11.1457 0.145089C11.0564 0.145089 10.956 0.189732 10.889 0.256696L6.50285 4.64286L2.11669 0.256696C2.04973 0.189732 1.94928 0.145089 1.85999 0.145089C1.75955 0.145089 1.67026 0.189732 1.6033 0.256696L1.04526 0.814732C0.978298 0.881696 0.933655 0.982143 0.933655 1.07143C0.933655 1.16071 0.978298 1.26116 1.04526 1.32812L6.24615 6.52902C6.31312 6.59598 6.41357 6.64062 6.50285 6.64062C6.59214 6.64062 6.69258 6.59598 6.75955 6.52902L11.9604 1.32812C12.0274 1.26116 12.072 1.16071 12.072 1.07143Z"
                                    fill="black"></path>
                            </svg>
                        </div>
                        <div class="py-2 px-6 panel">
                            <p> {{ trans('FAQs.who_are_teachers_answer') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-10">
            <div class="px-3 md:px-0">
                <div class="bg-white p-5 shadow md:max-w-5xl md:mx-auto rounded-xl space-y-2">
                    <div class="bg-primary p-5 rounded-lg">
                        <p class="text-white">{{ trans('FAQs.billing_policy') }}</p>
                        <p class="text-sm text-white">{{ trans('FAQs.sub_heading_billing_policy') }}</p>
                    </div>
                    <div tabindex="0" class="border rounded-lg border-transparent">
                        <div
                            class="accordion flex items-center justify-between p-4 rounded text-black-lighter-1  cursor-pointer bg-gray-100">
                            <div class="">{{ trans('FAQs.class_and_price_options') }}</div>
                            <svg class="w-4 h-4 text-black-lighter-1 duration-300" viewBox="0 0 13 7" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.072 1.07143C12.072 0.982143 12.0274 0.881696 11.9604 0.814732L11.4024 0.256696C11.3354 0.189732 11.235 0.145089 11.1457 0.145089C11.0564 0.145089 10.956 0.189732 10.889 0.256696L6.50285 4.64286L2.11669 0.256696C2.04973 0.189732 1.94928 0.145089 1.85999 0.145089C1.75955 0.145089 1.67026 0.189732 1.6033 0.256696L1.04526 0.814732C0.978298 0.881696 0.933655 0.982143 0.933655 1.07143C0.933655 1.16071 0.978298 1.26116 1.04526 1.32812L6.24615 6.52902C6.31312 6.59598 6.41357 6.64062 6.50285 6.64062C6.59214 6.64062 6.69258 6.59598 6.75955 6.52902L11.9604 1.32812C12.0274 1.26116 12.072 1.16071 12.072 1.07143Z"
                                    fill="black"></path>
                            </svg>
                        </div>
                        <div class="py-2 px-6 panel">
                            <p>
                                </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>
                                    {{ trans('FAQs.small_group_class_label') }}
                                </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>
                                    {{ trans('FAQs.private_class_label') }}
                                </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>
                                    {{ trans('FAQs.weekly_camps_label') }}
                                </b><br><br>

                                {!! trans('FAQs.pricing_options') !!}

                                {{-- <table><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - 3 students to 1 teacher</td><td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - 1 student to 1 teacher</td><td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - 6 students to 1 teacher</td></tr><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - In-person or Online</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - In-person or Online</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - In-person or Online</td></tr><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Starting at $37/class</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Starting at $60/class</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Starting at $295/camp</td></tr>
                                </table> --}}
                            </p>
                        </div>
                    </div>
                    <div tabindex="0" class="border rounded-lg border-transparent">
                        <div
                            class="accordion flex items-center justify-between p-4 rounded text-black-lighter-1  cursor-pointer bg-gray-100">
                            <div class="">{{ trans('FAQs.trying_a_class_before_signup_question') }}</div>
                            <svg class="w-4 h-4 text-black-lighter-1 duration-300" viewBox="0 0 13 7" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.072 1.07143C12.072 0.982143 12.0274 0.881696 11.9604 0.814732L11.4024 0.256696C11.3354 0.189732 11.235 0.145089 11.1457 0.145089C11.0564 0.145089 10.956 0.189732 10.889 0.256696L6.50285 4.64286L2.11669 0.256696C2.04973 0.189732 1.94928 0.145089 1.85999 0.145089C1.75955 0.145089 1.67026 0.189732 1.6033 0.256696L1.04526 0.814732C0.978298 0.881696 0.933655 0.982143 0.933655 1.07143C0.933655 1.16071 0.978298 1.26116 1.04526 1.32812L6.24615 6.52902C6.31312 6.59598 6.41357 6.64062 6.50285 6.64062C6.59214 6.64062 6.69258 6.59598 6.75955 6.52902L11.9604 1.32812C12.0274 1.26116 12.072 1.16071 12.072 1.07143Z"
                                    fill="black"></path>
                            </svg>
                        </div>
                        <div class="py-2 px-6 panel">
                            <p> {{ trans('FAQs.trying_a_class_before_signup_answer') }}</p>
                        </div>
                    </div>
                    <div tabindex="0" class="border rounded-lg border-transparent">
                        <div
                            class="accordion flex items-center justify-between p-4 rounded text-black-lighter-1  cursor-pointer bg-gray-100">
                            <div>{{ trans('FAQs.refund_policy_on_camps_question') }}</div>
                            <svg class="w-4 h-4 text-black-lighter-1 duration-300" viewBox="0 0 13 7" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.072 1.07143C12.072 0.982143 12.0274 0.881696 11.9604 0.814732L11.4024 0.256696C11.3354 0.189732 11.235 0.145089 11.1457 0.145089C11.0564 0.145089 10.956 0.189732 10.889 0.256696L6.50285 4.64286L2.11669 0.256696C2.04973 0.189732 1.94928 0.145089 1.85999 0.145089C1.75955 0.145089 1.67026 0.189732 1.6033 0.256696L1.04526 0.814732C0.978298 0.881696 0.933655 0.982143 0.933655 1.07143C0.933655 1.16071 0.978298 1.26116 1.04526 1.32812L6.24615 6.52902C6.31312 6.59598 6.41357 6.64062 6.50285 6.64062C6.59214 6.64062 6.69258 6.59598 6.75955 6.52902L11.9604 1.32812C12.0274 1.26116 12.072 1.16071 12.072 1.07143Z"
                                    fill="black"></path>
                            </svg>
                        </div>
                        <div class="py-2 px-6 panel" style="color:#818181">
                            <p> {!! trans('FAQs.refund_policy_on_camps_answer') !!}</p>
                        </div>
                    </div>
                    <div tabindex="0" class="border rounded-lg border-transparent">
                        <div
                            class="accordion flex items-center justify-between p-4 rounded text-black-lighter-1  cursor-pointer bg-gray-100">
                            <div>{{ trans('FAQs.siblings_discount_question') }}</div>
                            <svg class="w-4 h-4 text-black-lighter-1 duration-300" viewBox="0 0 13 7" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.072 1.07143C12.072 0.982143 12.0274 0.881696 11.9604 0.814732L11.4024 0.256696C11.3354 0.189732 11.235 0.145089 11.1457 0.145089C11.0564 0.145089 10.956 0.189732 10.889 0.256696L6.50285 4.64286L2.11669 0.256696C2.04973 0.189732 1.94928 0.145089 1.85999 0.145089C1.75955 0.145089 1.67026 0.189732 1.6033 0.256696L1.04526 0.814732C0.978298 0.881696 0.933655 0.982143 0.933655 1.07143C0.933655 1.16071 0.978298 1.26116 1.04526 1.32812L6.24615 6.52902C6.31312 6.59598 6.41357 6.64062 6.50285 6.64062C6.59214 6.64062 6.69258 6.59598 6.75955 6.52902L11.9604 1.32812C12.0274 1.26116 12.072 1.16071 12.072 1.07143Z"
                                    fill="black"></path>
                            </svg>
                        </div>
                        <div class="py-2 px-6 panel">
                            <p> {{ trans('FAQs.siblings_discount_answer') }}</p>
                        </div>
                    </div>
                    <div tabindex="0" class="border rounded-lg border-transparent">
                        <div
                            class="accordion flex items-center justify-between p-4 rounded text-black-lighter-1  cursor-pointer bg-gray-100">
                            <div>{{ trans('FAQs.long_term_commitment_with_cwu_question') }}</div>
                            <svg class="w-4 h-4 text-black-lighter-1 duration-300" viewBox="0 0 13 7" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.072 1.07143C12.072 0.982143 12.0274 0.881696 11.9604 0.814732L11.4024 0.256696C11.3354 0.189732 11.235 0.145089 11.1457 0.145089C11.0564 0.145089 10.956 0.189732 10.889 0.256696L6.50285 4.64286L2.11669 0.256696C2.04973 0.189732 1.94928 0.145089 1.85999 0.145089C1.75955 0.145089 1.67026 0.189732 1.6033 0.256696L1.04526 0.814732C0.978298 0.881696 0.933655 0.982143 0.933655 1.07143C0.933655 1.16071 0.978298 1.26116 1.04526 1.32812L6.24615 6.52902C6.31312 6.59598 6.41357 6.64062 6.50285 6.64062C6.59214 6.64062 6.69258 6.59598 6.75955 6.52902L11.9604 1.32812C12.0274 1.26116 12.072 1.16071 12.072 1.07143Z"
                                    fill="black"></path>
                            </svg>
                        </div>
                        <div class="py-2 px-6 panel" id="c9">
                            <p> {{ trans('FAQs.long_term_commitment_with_cwu_answer') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-10">
            <div class="px-3 md:px-0">
                <div class="bg-white p-5 shadow md:max-w-5xl md:mx-auto rounded-xl space-y-2">
                    <div class="bg-primary p-5 rounded-lg">
                        <p class="text-white">{{ trans('FAQs.classes_heading') }}</p>
                        <p class="text-sm text-white">{{ trans('FAQs.classes_sub_heading') }}</p>
                    </div>
                    <div tabindex="0" class="border rounded-lg border-transparent">
                        <div
                            class="accordion flex items-center justify-between p-4 rounded text-black-lighter-1  cursor-pointer bg-gray-100">
                            <div>{{ trans('FAQs.deciding_the_level_and_topic_for_students_question') }}</div>
                            <svg class="w-4 h-4 text-black-lighter-1 duration-300" viewBox="0 0 13 7" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.072 1.07143C12.072 0.982143 12.0274 0.881696 11.9604 0.814732L11.4024 0.256696C11.3354 0.189732 11.235 0.145089 11.1457 0.145089C11.0564 0.145089 10.956 0.189732 10.889 0.256696L6.50285 4.64286L2.11669 0.256696C2.04973 0.189732 1.94928 0.145089 1.85999 0.145089C1.75955 0.145089 1.67026 0.189732 1.6033 0.256696L1.04526 0.814732C0.978298 0.881696 0.933655 0.982143 0.933655 1.07143C0.933655 1.16071 0.978298 1.26116 1.04526 1.32812L6.24615 6.52902C6.31312 6.59598 6.41357 6.64062 6.50285 6.64062C6.59214 6.64062 6.69258 6.59598 6.75955 6.52902L11.9604 1.32812C12.0274 1.26116 12.072 1.16071 12.072 1.07143Z"
                                    fill="black"></path>
                            </svg>
                        </div>
                        <div class="py-2 px-6 panel">
                            <p> {!! trans('FAQs.deciding_the_level_and_topic_for_students_answer') !!}</p>
                        </div>
                    </div>
                    <div tabindex="0" class="border rounded-lg border-transparent">
                        <div
                            class="accordion flex items-center justify-between p-4 rounded text-black-lighter-1  cursor-pointer bg-gray-100">
                            <div>{{ trans('FAQs.staying_upto_date_with_students_progress_question') }}</div>
                            <svg class="w-4 h-4 text-black-lighter-1 duration-300" viewBox="0 0 13 7" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.072 1.07143C12.072 0.982143 12.0274 0.881696 11.9604 0.814732L11.4024 0.256696C11.3354 0.189732 11.235 0.145089 11.1457 0.145089C11.0564 0.145089 10.956 0.189732 10.889 0.256696L6.50285 4.64286L2.11669 0.256696C2.04973 0.189732 1.94928 0.145089 1.85999 0.145089C1.75955 0.145089 1.67026 0.189732 1.6033 0.256696L1.04526 0.814732C0.978298 0.881696 0.933655 0.982143 0.933655 1.07143C0.933655 1.16071 0.978298 1.26116 1.04526 1.32812L6.24615 6.52902C6.31312 6.59598 6.41357 6.64062 6.50285 6.64062C6.59214 6.64062 6.69258 6.59598 6.75955 6.52902L11.9604 1.32812C12.0274 1.26116 12.072 1.16071 12.072 1.07143Z"
                                    fill="black"></path>
                            </svg>
                        </div>
                        <div class="py-2 px-6 panel">
                            <p> {!! trans('FAQs.staying_upto_date_with_students_progress_answer') !!}</p>
                        </div>
                    </div>
                    <div tabindex="0" class="border rounded-lg border-transparent">
                        <div
                            class="accordion flex items-center justify-between p-4 rounded text-black-lighter-1  cursor-pointer bg-gray-100">
                            <div>{{ trans('FAQs.student_work_can_be_reviewed_question') }}</div>
                            <svg class="w-4 h-4 text-black-lighter-1 duration-300" viewBox="0 0 13 7" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.072 1.07143C12.072 0.982143 12.0274 0.881696 11.9604 0.814732L11.4024 0.256696C11.3354 0.189732 11.235 0.145089 11.1457 0.145089C11.0564 0.145089 10.956 0.189732 10.889 0.256696L6.50285 4.64286L2.11669 0.256696C2.04973 0.189732 1.94928 0.145089 1.85999 0.145089C1.75955 0.145089 1.67026 0.189732 1.6033 0.256696L1.04526 0.814732C0.978298 0.881696 0.933655 0.982143 0.933655 1.07143C0.933655 1.16071 0.978298 1.26116 1.04526 1.32812L6.24615 6.52902C6.31312 6.59598 6.41357 6.64062 6.50285 6.64062C6.59214 6.64062 6.69258 6.59598 6.75955 6.52902L11.9604 1.32812C12.0274 1.26116 12.072 1.16071 12.072 1.07143Z"
                                    fill="black"></path>
                            </svg>
                        </div>
                        <div class="py-2 px-6 panel">
                            <p> {{ trans('FAQs.student_work_can_be_reviewed_answer') }}</p>
                        </div>
                    </div>
                    <div tabindex="0" class="border rounded-lg border-transparent">
                        <div
                            class="accordion flex items-center justify-between p-4 rounded text-black-lighter-1  cursor-pointer bg-gray-100">
                            <div>{{ trans('FAQs.in_person_class_look_like_question') }}</div>
                            <svg class="w-4 h-4 text-black-lighter-1 duration-300" viewBox="0 0 13 7" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.072 1.07143C12.072 0.982143 12.0274 0.881696 11.9604 0.814732L11.4024 0.256696C11.3354 0.189732 11.235 0.145089 11.1457 0.145089C11.0564 0.145089 10.956 0.189732 10.889 0.256696L6.50285 4.64286L2.11669 0.256696C2.04973 0.189732 1.94928 0.145089 1.85999 0.145089C1.75955 0.145089 1.67026 0.189732 1.6033 0.256696L1.04526 0.814732C0.978298 0.881696 0.933655 0.982143 0.933655 1.07143C0.933655 1.16071 0.978298 1.26116 1.04526 1.32812L6.24615 6.52902C6.31312 6.59598 6.41357 6.64062 6.50285 6.64062C6.59214 6.64062 6.69258 6.59598 6.75955 6.52902L11.9604 1.32812C12.0274 1.26116 12.072 1.16071 12.072 1.07143Z"
                                    fill="black"></path>
                            </svg>
                        </div>
                        <div class="py-2 px-6 panel">
                            <p> {{ trans('FAQs.in_person_class_look_like_answer') }}</p>
                        </div>
                    </div>
                    <div tabindex="0" class="border rounded-lg border-transparent">
                        <div
                            class="accordion flex items-center justify-between p-4 rounded text-black-lighter-1  cursor-pointer bg-gray-100">
                            <div>{{ trans('FAQs.online_class_looklike_question') }}</div>
                            <svg class="w-4 h-4 text-black-lighter-1 duration-300" viewBox="0 0 13 7" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.072 1.07143C12.072 0.982143 12.0274 0.881696 11.9604 0.814732L11.4024 0.256696C11.3354 0.189732 11.235 0.145089 11.1457 0.145089C11.0564 0.145089 10.956 0.189732 10.889 0.256696L6.50285 4.64286L2.11669 0.256696C2.04973 0.189732 1.94928 0.145089 1.85999 0.145089C1.75955 0.145089 1.67026 0.189732 1.6033 0.256696L1.04526 0.814732C0.978298 0.881696 0.933655 0.982143 0.933655 1.07143C0.933655 1.16071 0.978298 1.26116 1.04526 1.32812L6.24615 6.52902C6.31312 6.59598 6.41357 6.64062 6.50285 6.64062C6.59214 6.64062 6.69258 6.59598 6.75955 6.52902L11.9604 1.32812C12.0274 1.26116 12.072 1.16071 12.072 1.07143Z"
                                    fill="black"></path>
                            </svg>
                        </div>
                        <div class="py-2 px-6 panel" style="color:#818181">
                            <p> {!! trans('FAQs.online_class_looklike_answer') !!}</p>
                        </div>
                    </div>
                    <div tabindex="0" class="border rounded-lg border-transparent">
                        <div
                            class="accordion flex items-center justify-between p-4 rounded text-black-lighter-1  cursor-pointer bg-gray-100">
                            <div>{{ trans('FAQs.technical_requirement_for_online_class_question') }}</div>
                            <svg class="w-4 h-4 text-black-lighter-1 duration-300" viewBox="0 0 13 7" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.072 1.07143C12.072 0.982143 12.0274 0.881696 11.9604 0.814732L11.4024 0.256696C11.3354 0.189732 11.235 0.145089 11.1457 0.145089C11.0564 0.145089 10.956 0.189732 10.889 0.256696L6.50285 4.64286L2.11669 0.256696C2.04973 0.189732 1.94928 0.145089 1.85999 0.145089C1.75955 0.145089 1.67026 0.189732 1.6033 0.256696L1.04526 0.814732C0.978298 0.881696 0.933655 0.982143 0.933655 1.07143C0.933655 1.16071 0.978298 1.26116 1.04526 1.32812L6.24615 6.52902C6.31312 6.59598 6.41357 6.64062 6.50285 6.64062C6.59214 6.64062 6.69258 6.59598 6.75955 6.52902L11.9604 1.32812C12.0274 1.26116 12.072 1.16071 12.072 1.07143Z"
                                    fill="black"></path>
                            </svg>
                        </div>
                        <div class="py-2 px-6 panel" style="color:#818181">
                            <p> {!! trans('FAQs.technical_requirement_for_online_class_answer') !!}</p>
                        </div>
                    </div>

                    <div tabindex="0" class="border rounded-lg border-transparent">
                        <div
                            class="accordion flex items-center justify-between p-4 rounded text-black-lighter-1  cursor-pointer bg-gray-100">
                            <div>{{ trans('FAQs.class_reschedule_policy_question') }}</div>
                            <svg class="w-4 h-4 text-black-lighter-1 duration-300" viewBox="0 0 13 7" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.072 1.07143C12.072 0.982143 12.0274 0.881696 11.9604 0.814732L11.4024 0.256696C11.3354 0.189732 11.235 0.145089 11.1457 0.145089C11.0564 0.145089 10.956 0.189732 10.889 0.256696L6.50285 4.64286L2.11669 0.256696C2.04973 0.189732 1.94928 0.145089 1.85999 0.145089C1.75955 0.145089 1.67026 0.189732 1.6033 0.256696L1.04526 0.814732C0.978298 0.881696 0.933655 0.982143 0.933655 1.07143C0.933655 1.16071 0.978298 1.26116 1.04526 1.32812L6.24615 6.52902C6.31312 6.59598 6.41357 6.64062 6.50285 6.64062C6.59214 6.64062 6.69258 6.59598 6.75955 6.52902L11.9604 1.32812C12.0274 1.26116 12.072 1.16071 12.072 1.07143Z"
                                    fill="black"></path>
                            </svg>
                        </div>
                        <div class="py-2 px-6 panel" style="color:#818181">
                            <p> {!! trans('FAQs.class_reschedule_policy_answer') !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-10">
            <div class="px-3 md:px-0">
                <div class="bg-white p-5 shadow md:max-w-5xl md:mx-auto rounded-xl space-y-2">
                    <div class="bg-primary p-5 rounded-lg">
                        <p class="text-white">{{ trans('FAQs.security_heading') }}</p>
                        <p class="text-sm text-white">{{ trans('FAQs.security_sub_heading') }}</p>
                    </div>
                    <div tabindex="0" class="border rounded-lg border-transparent">
                        <div
                            class="accordion flex items-center justify-between p-4 rounded text-black-lighter-1  cursor-pointer bg-gray-100">
                            <div>{{ trans('FAQs.cwu_addresses_security_concern_question') }}</div>
                            <svg class="w-4 h-4 text-black-lighter-1 duration-300 " viewBox="0 0 13 7" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.072 1.07143C12.072 0.982143 12.0274 0.881696 11.9604 0.814732L11.4024 0.256696C11.3354 0.189732 11.235 0.145089 11.1457 0.145089C11.0564 0.145089 10.956 0.189732 10.889 0.256696L6.50285 4.64286L2.11669 0.256696C2.04973 0.189732 1.94928 0.145089 1.85999 0.145089C1.75955 0.145089 1.67026 0.189732 1.6033 0.256696L1.04526 0.814732C0.978298 0.881696 0.933655 0.982143 0.933655 1.07143C0.933655 1.16071 0.978298 1.26116 1.04526 1.32812L6.24615 6.52902C6.31312 6.59598 6.41357 6.64062 6.50285 6.64062C6.59214 6.64062 6.69258 6.59598 6.75955 6.52902L11.9604 1.32812C12.0274 1.26116 12.072 1.16071 12.072 1.07143Z"
                                    fill="black"></path>
                            </svg>
                        </div>
                        <div class="py-2 px-6 panel" style="color:#818181;">
                            <p> {!! trans('FAQs.cwu_addresses_security_concern_answer') !!}</p>
                        </div>
                    </div>
                    <div tabindex="0" class="border rounded-lg border-transparent">
                        <div
                            class="accordion flex items-center justify-between p-4 rounded text-black-lighter-1  cursor-pointer bg-gray-100">
                            <div>{{ trans('FAQs.read_on_security_label') }}</div>
                            <svg class="w-4 h-4 text-black-lighter-1 duration-300" viewBox="0 0 13 7" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.072 1.07143C12.072 0.982143 12.0274 0.881696 11.9604 0.814732L11.4024 0.256696C11.3354 0.189732 11.235 0.145089 11.1457 0.145089C11.0564 0.145089 10.956 0.189732 10.889 0.256696L6.50285 4.64286L2.11669 0.256696C2.04973 0.189732 1.94928 0.145089 1.85999 0.145089C1.75955 0.145089 1.67026 0.189732 1.6033 0.256696L1.04526 0.814732C0.978298 0.881696 0.933655 0.982143 0.933655 1.07143C0.933655 1.16071 0.978298 1.26116 1.04526 1.32812L6.24615 6.52902C6.31312 6.59598 6.41357 6.64062 6.50285 6.64062C6.59214 6.64062 6.69258 6.59598 6.75955 6.52902L11.9604 1.32812C12.0274 1.26116 12.072 1.16071 12.072 1.07143Z"
                                    fill="black"></path>
                            </svg>
                        </div>
                        <div class="py-2 px-6 panel">
                            <p> <a href="{{ trans('FAQs.read_on_security_link') }}"
                                    target="_blank">{{ trans('FAQs.read_on_security_link') }}</a> </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <section>
        @include('layouts.FooterIcons')
    </section>
@endsection

@section('script')
    <script>
        // FAQs Script
        $(document).ready(function() {
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
