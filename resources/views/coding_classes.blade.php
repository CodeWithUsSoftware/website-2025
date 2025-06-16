@extends('layouts.master')

@section('header_scripts')
    {{-- OwlCarousel --}}
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
@endsection

@section('style')
    <style>
        .grecaptcha-badge {
            display: block !important;
        }
    </style>
@endsection

@section('title', 'Coding Classes For Kids | Code With Us')

@section('content')
    <div>
        <section class="py-10 md:py-20 hidden md:block">
            <div class="max-w-6xl mx-auto px-2">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 flex items-center justify-center">
                    <div class="md:order-2"><img class="rounded" src="/images/trial_form/flying.png" alt=""></div>
                    <div>
                        <h2 class="pb-0">{!! trans('coding_classes.personalized') !!}</h2>
                        <h2 class="pt-0">{{ trans('coding_classes.coding_education') }}</h2>
                        <ul class="text-black-lighter-3">
                            <li class="flex items-center space-x-2">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M3.5 0C3.63261 0 3.75979 0.0526784 3.85355 0.146447C3.94732 0.240215 4 0.367392 4 0.5V1H12V0.5C12 0.367392 12.0527 0.240215 12.1464 0.146447C12.2402 0.0526784 12.3674 0 12.5 0C12.6326 0 12.7598 0.0526784 12.8536 0.146447C12.9473 0.240215 13 0.367392 13 0.5V1H14C14.5304 1 15.0391 1.21071 15.4142 1.58579C15.7893 1.96086 16 2.46957 16 3V14C16 14.5304 15.7893 15.0391 15.4142 15.4142C15.0391 15.7893 14.5304 16 14 16H2C1.46957 16 0.960859 15.7893 0.585786 15.4142C0.210714 15.0391 0 14.5304 0 14V5H16V4H0V3C0 2.46957 0.210714 1.96086 0.585786 1.58579C0.960859 1.21071 1.46957 1 2 1H3V0.5C3 0.367392 3.05268 0.240215 3.14645 0.146447C3.24021 0.0526784 3.36739 0 3.5 0V0Z"
                                        fill="#008CB6" />
                                </svg>
                                <div>{{ trans('coding_classes.classes_on_your_schedule') }}</div>
                            </li>
                            <li class="flex items-center space-x-2 space-y-3">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M4 2C4 2.53043 3.78929 3.03914 3.41421 3.41421C3.03914 3.78929 2.53043 4 2 4C1.46957 4 0.960859 3.78929 0.585786 3.41421C0.210714 3.03914 0 2.53043 0 2C0 1.46957 0.210714 0.960859 0.585786 0.585786C0.960859 0.210714 1.46957 0 2 0C2.53043 0 3.03914 0.210714 3.41421 0.585786C3.78929 0.960859 4 1.46957 4 2Z"
                                        fill="#008CB6" />
                                    <path
                                        d="M4 8C4 8.53043 3.78929 9.03914 3.41421 9.41421C3.03914 9.78929 2.53043 10 2 10C1.46957 10 0.960859 9.78929 0.585786 9.41421C0.210714 9.03914 0 8.53043 0 8C0 7.46957 0.210714 6.96086 0.585786 6.58579C0.960859 6.21071 1.46957 6 2 6C2.53043 6 3.03914 6.21071 3.41421 6.58579C3.78929 6.96086 4 7.46957 4 8Z"
                                        fill="#008CB6" />
                                    <path
                                        d="M2 16C2.53043 16 3.03914 15.7893 3.41421 15.4142C3.78929 15.0391 4 14.5304 4 14C4 13.4696 3.78929 12.9609 3.41421 12.5858C3.03914 12.2107 2.53043 12 2 12C1.46957 12 0.960859 12.2107 0.585786 12.5858C0.210714 12.9609 0 13.4696 0 14C0 14.5304 0.210714 15.0391 0.585786 15.4142C0.960859 15.7893 1.46957 16 2 16Z"
                                        fill="#008CB6" />
                                    <path
                                        d="M10 2C10 2.53043 9.78929 3.03914 9.41421 3.41421C9.03914 3.78929 8.53043 4 8 4C7.46957 4 6.96086 3.78929 6.58579 3.41421C6.21071 3.03914 6 2.53043 6 2C6 1.46957 6.21071 0.960859 6.58579 0.585786C6.96086 0.210714 7.46957 0 8 0C8.53043 0 9.03914 0.210714 9.41421 0.585786C9.78929 0.960859 10 1.46957 10 2Z"
                                        fill="#008CB6" />
                                    <path
                                        d="M8 10C8.53043 10 9.03914 9.78929 9.41421 9.41421C9.78929 9.03914 10 8.53043 10 8C10 7.46957 9.78929 6.96086 9.41421 6.58579C9.03914 6.21071 8.53043 6 8 6C7.46957 6 6.96086 6.21071 6.58579 6.58579C6.21071 6.96086 6 7.46957 6 8C6 8.53043 6.21071 9.03914 6.58579 9.41421C6.96086 9.78929 7.46957 10 8 10Z"
                                        fill="#008CB6" />
                                    <path
                                        d="M14 4C14.5304 4 15.0391 3.78929 15.4142 3.41421C15.7893 3.03914 16 2.53043 16 2C16 1.46957 15.7893 0.960859 15.4142 0.585786C15.0391 0.210714 14.5304 0 14 0C13.4696 0 12.9609 0.210714 12.5858 0.585786C12.2107 0.960859 12 1.46957 12 2C12 2.53043 12.2107 3.03914 12.5858 3.41421C12.9609 3.78929 13.4696 4 14 4Z"
                                        fill="#008CB6" />
                                    <path
                                        d="M16 8C16 8.53043 15.7893 9.03914 15.4142 9.41421C15.0391 9.78929 14.5304 10 14 10C13.4696 10 12.9609 9.78929 12.5858 9.41421C12.2107 9.03914 12 8.53043 12 8C12 7.46957 12.2107 6.96086 12.5858 6.58579C12.9609 6.21071 13.4696 6 14 6C14.5304 6 15.0391 6.21071 15.4142 6.58579C15.7893 6.96086 16 7.46957 16 8Z"
                                        fill="#008CB6" />
                                    <path
                                        d="M14 16C14.5304 16 15.0391 15.7893 15.4142 15.4142C15.7893 15.0391 16 14.5304 16 14C16 13.4696 15.7893 12.9609 15.4142 12.5858C15.0391 12.2107 14.5304 12 14 12C13.4696 12 12.9609 12.2107 12.5858 12.5858C12.2107 12.9609 12 13.4696 12 14C12 14.5304 12.2107 15.0391 12.5858 15.4142C12.9609 15.7893 13.4696 16 14 16Z"
                                        fill="#008CB6" />
                                </svg>
                                <div>{{ trans('coding_classes.topics') }}</div>
                            </li>
                            <li class="flex items-center space-x-2 space-y-3">
                                <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M4.9999 6.41492H4.4924C3.79984 6.38989 3.10952 6.50746 2.46429 6.76033C1.81907 7.01321 1.23269 7.39599 0.741562 7.88492L0.601562 8.04826V12.8783H2.98156V10.1366L3.3024 9.77492L3.44823 9.60576C4.20768 8.82555 5.15318 8.25142 6.19573 7.93742C5.67376 7.54025 5.26209 7.01613 4.9999 6.41492Z"
                                        fill="#008CB6" />
                                    <path
                                        d="M16.2799 7.86783C15.7888 7.3789 15.2024 6.99612 14.5572 6.74324C13.9119 6.49037 13.2216 6.3728 12.5291 6.39783C12.3167 6.39843 12.1044 6.41012 11.8932 6.43283C11.6261 6.99686 11.2257 7.48737 10.7266 7.862C11.8395 8.16991 12.8478 8.77485 13.6432 9.612L13.7891 9.77533L14.1041 10.137V12.8845H16.4024V8.03116L16.2799 7.86783Z"
                                        fill="#008CB6" />
                                    <path
                                        d="M4.47688 5.27763H4.65771C4.57369 4.55619 4.70028 3.82585 5.0222 3.17477C5.34411 2.52368 5.8476 1.9797 6.47188 1.60846C6.24558 1.26275 5.93338 0.981734 5.56585 0.792932C5.19832 0.60413 4.78805 0.514016 4.37523 0.531413C3.9624 0.54881 3.56117 0.673122 3.21082 0.892176C2.86048 1.11123 2.57303 1.41752 2.37662 1.78104C2.18021 2.14457 2.08158 2.55287 2.09039 2.96597C2.09919 3.37907 2.21513 3.78279 2.42685 4.13762C2.63856 4.49245 2.9388 4.78621 3.29816 4.99014C3.65753 5.19407 4.06369 5.30117 4.47688 5.30096V5.27763Z"
                                        fill="#008CB6" />
                                    <path
                                        d="M12.2501 4.84003C12.2572 4.97411 12.2572 5.10846 12.2501 5.24253C12.362 5.26028 12.4751 5.27003 12.5884 5.2717H12.6993C13.1106 5.24976 13.5093 5.12168 13.8565 4.89993C14.2037 4.67817 14.4875 4.3703 14.6804 4.00628C14.8733 3.64227 14.9686 3.23451 14.9571 2.82271C14.9457 2.41091 14.8277 2.0091 14.6149 1.65641C14.402 1.30371 14.1014 1.01214 13.7424 0.810091C13.3834 0.60804 12.9782 0.502389 12.5662 0.503426C12.1543 0.504462 11.7496 0.61215 11.3916 0.816005C11.0336 1.01986 10.7345 1.31294 10.5234 1.6667C11.0514 2.01141 11.4855 2.48179 11.7869 3.03565C12.0883 3.5895 12.2474 4.2095 12.2501 4.84003Z"
                                        fill="#008CB6" />
                                    <path
                                        d="M8.42391 7.45328C9.86399 7.45328 11.0314 6.28586 11.0314 4.84578C11.0314 3.4057 9.86399 2.23828 8.42391 2.23828C6.98382 2.23828 5.81641 3.4057 5.81641 4.84578C5.81641 6.28586 6.98382 7.45328 8.42391 7.45328Z"
                                        fill="#008CB6" />
                                    <path
                                        d="M8.56287 8.84165C7.80106 8.8109 7.0409 8.93457 6.32814 9.20524C5.61537 9.47591 4.96473 9.88798 4.41536 10.4167L4.26953 10.58V14.2725C4.27181 14.3928 4.29776 14.5114 4.3459 14.6217C4.39404 14.7319 4.46343 14.8316 4.5501 14.915C4.63677 14.9984 4.73903 15.064 4.85103 15.1078C4.96304 15.1517 5.08259 15.1731 5.20286 15.1708H11.9054C12.0256 15.1731 12.1452 15.1517 12.2572 15.1078C12.3692 15.064 12.4715 14.9984 12.5581 14.915C12.6448 14.8316 12.7142 14.7319 12.7623 14.6217C12.8105 14.5114 12.8364 14.3928 12.8387 14.2725V10.5917L12.6987 10.4167C12.1529 9.88636 11.5045 9.47313 10.7933 9.2023C10.0822 8.93147 9.32316 8.80874 8.56287 8.84165Z"
                                        fill="#008CB6" />
                                </svg>
                                <div>{{ trans('coding_classes.private_or_small_group') }}</div>
                            </li>
                            <li class="flex items-center space-x-2 space-y-3">
                                <svg width="17" height="18" viewBox="0 0 17 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2.7108 14.4H16.2V1.8C16.2 0.8073 15.3927 0 14.4 0H2.7C1.6146 0 0 0.7191 0 2.7V15.3C0 17.2809 1.6146 18 2.7 18H16.2V16.2H2.7108C2.295 16.1892 1.8 16.0254 1.8 15.3C1.8 15.2091 1.8081 15.1281 1.8216 15.0543C1.9224 14.5359 2.3472 14.409 2.7108 14.4ZM5.0832 5.0778C5.45781 4.70796 5.96303 4.50058 6.48945 4.50058C7.01587 4.50058 7.52109 4.70796 7.8957 5.0778L8.0973 5.2749L8.298 5.0778C8.67276 4.7079 9.17814 4.5005 9.7047 4.5005C10.2313 4.5005 10.7366 4.7079 11.1114 5.0778C11.2973 5.25658 11.4452 5.47106 11.5462 5.70836C11.6472 5.94567 11.6993 6.20093 11.6993 6.45885C11.6993 6.71677 11.6472 6.97203 11.5462 7.20934C11.4452 7.44664 11.2973 7.66112 11.1114 7.8399L8.0982 10.8L5.0841 7.8399C4.89803 7.66124 4.74997 7.44684 4.6488 7.20956C4.54764 6.97227 4.49544 6.71699 4.49536 6.45904C4.49528 6.20109 4.5473 5.94578 4.64832 5.70843C4.74933 5.47108 4.89725 5.25658 5.0832 5.0778Z"
                                        fill="#008CB6" />
                                </svg>
                                <div>{{ trans('coding_classes.caring_knowledgeable_instructors') }}</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-10 md:py-20">
            <div class="max-w-6xl mx-auto" id="trial_form">
                <!-- Desktop Version -->
                <div id="desktop-form">
                    <trial-form phone_number="{{ trans('free_session.phone_number') }}"
                        private_session_fee="{{ trans('free_session.private_session_fee') }}"
                        private_session="{{ trans('free_session.private_session') }}"
                        free_trial="{{ trans('free_session.free_trial') }}"
                        group_session="{{ trans('free_session.group_session') }}"
                        free_session_email="{{ trans('free_session.email') }}" trial="{{ trans('free_session.trial') }}"
                        :drive_link="'https://drive.google.com/file/d/{!! trans('email_tc_file.tc_file_link') !!}/view'"/>
                </div>

                <!-- Mobile Version -->
                <div id="mobile-form">
                    <trial-form-mobile phone_number="{{ trans('free_session.phone_number') }}"
                        private_session_fee="{{ trans('free_session.private_session_fee') }}"
                        private_session="{{ trans('free_session.private_session') }}"
                        free_trial="{{ trans('free_session.free_trial') }}"
                        group_session="{{ trans('free_session.group_session') }}"
                        free_session_email="{{ trans('free_session.email') }}" trial="{{ trans('free_session.trial') }}"
                        :drive_link="'https://drive.google.com/file/d/{!! trans('email_tc_file.tc_file_link') !!}/view'"/>
                </div>
            </div>
        </section>

        <section class="py-10 md:py-20 hidden md:block" id="learnmore">
            <div class="max-w-6xl mx-auto px-2">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 flex items-center justify-center">
                    <div><img loading="lazy" class="rounded object-cover" src="/images/trial_form/student_1.png"
                            alt=""></div>
                    <div>
                        <h5>{{ trans('coding_classes.personalized_coding_education_title') }}</h5>
                        <p>{!! trans('coding_classes.personalized_coding_education') !!}</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-10 md:py-20 hidden md:block">
            <div class="max-w-6xl mx-auto px-2">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 flex items-center justify-center">
                    <div class="md:order-2"><img loading="lazy" class="rounded" src="/images/trial_form/student_2.png"
                            alt=""></div>
                    <div>
                        <h5>{{ trans('coding_classes.about_us_title') }}</h5>
                        <p>{!! trans('coding_classes.about_us') !!}</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-10 md:py-20 hidden md:block">
            <div class="max-w-6xl mx-auto px-2">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 flex items-center justify-center">
                    <div><img loading="lazy" class="rounded" src="/images/trial_form/student_3.png" alt="">
                    </div>
                    <div>
                        <h5>{{ trans('coding_classes.one_more_thing_title') }}</h5>
                        <p class="pt-5">{!! trans('coding_classes.one_more_thing') !!}</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-10 md:py-20 max-w-6xl mx-auto hidden md:block">
            <h4 class="text-primary text-center md:text-left md:pl-36">{{ trans('coding_classes.did_you_know') }}? </h4>
            <div
                class="md:flex md:items-center md:justify-center md:space-x-10 md:max-w-3xl md:mx-auto bg-white m-2 p-2 text-center">
                <div class="md:p-0">
                    <div
                        class="inline-flex items-center p-3 bg-info-lighter-4 rounded-full border border-transparent focus:outline-none">
                        <button type="button"
                            class="inline-flex items-center p-6 border border-transparent rounded-full shadow-primary text-white bg-primary hover:bg-primary-darker-1 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                            <svg class="h-10 w-10" width="48" height="48" viewBox="0 0 48 48" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M48 24C48 10.7661 37.2339 0 24 0C10.7661 0 0 10.7661 0 24C0 28.313 1.14802 32.5123 3.32801 36.199L0.0882353 47.9113L11.801 44.672C15.4877 46.852 19.687 48 24 48C37.2339 48 48 37.2339 48 24ZM20.3171 18.4143H16.6343C16.6343 14.3526 19.9383 11.0486 24 11.0486C28.0617 11.0486 31.3657 14.3526 31.3657 18.4143C31.3657 20.4759 30.493 22.4573 28.9704 23.8499L25.8414 26.7137V29.5857H22.1586V25.0919L26.484 21.1328C27.257 20.4255 27.6829 19.4602 27.6829 18.4143C27.6829 16.3835 26.0309 14.7315 24 14.7315C21.9692 14.7315 20.3171 16.3835 20.3171 18.4143ZM22.1586 33.2685H25.8414V36.9514H22.1586V33.2685Z"
                                    fill="white" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="md:text-left">
                    <p>{{ trans('coding_classes.did_you_know_detial') }}</p>
                </div>
            </div>
        </section>

        <section class="max-w-6xl mx-auto text-center hidden md:block">
            <a href="#trial_form"
                class="hover:text-white shadow-primary space-x-2 inline-flex items-center px-4 py-2 text-sm border border-primary rounded-full text-white bg-primary hover:bg-primary-darker-1 focus:outline-none ">
                <span>Schedule a Free Trial</span>
                <svg width="13" height="11" viewBox="0 0 13 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 5.5H12M12 5.5L8.03644 1.5M12 5.5L8.03644 9.5" stroke="white" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </a>
        </section>

        <section class="py-10 md:py-20 hidden md:block">
            @include('layouts.TrustedBySiliconValley')
        </section>

        <section class="py-10 md:py-20 hidden md:block">
            <x-parent-reviews />
        </section>

        <section>
            @include('layouts.FooterIcons')
        </section>
    </div>
@endsection

@section('footer_scripts')
<script>
    (function() {
        function showCorrectForm() {
            const isMobile = window.innerWidth < 768; // md breakpoint
            const desktopForm = document.getElementById('desktop-form');
            const mobileForm = document.getElementById('mobile-form');

            if (isMobile) {
                // Completely remove desktop form from DOM
                if (desktopForm) {
                    desktopForm.remove();
                }
            } else {
                // Completely remove mobile form from DOM
                if (mobileForm) {
                    mobileForm.remove();
                }
            }
        }

        // Run immediately when DOM is ready
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', showCorrectForm);
        } else {
            showCorrectForm();
        }
    })();
</script>
@endsection
