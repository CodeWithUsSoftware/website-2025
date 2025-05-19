<section class="pt-0">
    <footer class="bg-footer" aria-labelledby="footer-heading">
        <h2 id="footer-heading" class="sr-only">Footer</h2>
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 md:max-w-5xl">
            <div class="grid sm:grid-cols-1 md:grid-cols-3 pb-8 text-center">
                <div class="pt-10 md:pt-0">
                    <h3 class="pb-5 text-sm text-primary tracking-wider uppercase">
                        {{ trans('header_and_footer.contact_us_text') }}</h3>
                    <ul role="list" class="mt-4 space-y-0">
                        <li class=""><img class="w-3/6 mx-auto  md:w-2/3 md:h-auto " src="/images/logo.webp"
                                alt="CodeWithUs"></li>
                        <!-- <li><a href="mailto:info@codewithus.com" class=" text-primary hover:text-white">Email: info@codewithus.com</a></li> -->
                        <li><a href="/contact" class=" text-primary hover:text-white">Email:
                                {{ trans('header_and_footer.contact_us_email') }}</a>
                        </li>
                        <li><a href="/phone-call"
                                class=" text-gray-300 hover:text-white">{{ trans('header_and_footer.Schedule_phone_call_with_us') }}</a>
                        </li>
                    </ul>
                </div>
                <div class="pt-10 md:pt-0">
                    <h3 class="pb-5 text-sm text-primary tracking-wider uppercase">
                        {{ trans('header_and_footer.useful_links') }}</h3>
                    <ul role="list" class="mt-4 space-y-0">
                        <li><a href="/sitemap"
                                class=" text-gray-300 hover:text-white">{{ trans('header_and_footer.Sitemap') }}</a>
                        </li>
                        <!--                        <li><a to="/referral" class=" text-gray-300 hover:text-white">Referral</a></li>-->
                        <li><a href="/student-spotlight-video"
                                class=" text-gray-300 hover:text-white">{{ trans('header_and_footer.student_spotlight_video') }}</a>
                        </li>
                        <li><a href="/categories/kids_coding_classes"
                                class=" text-gray-300 hover:text-white">{{ trans('header_and_footer.kids_programming_languages') }}</a>
                        </li>
                        <li><a href="/contact"
                                class=" text-gray-300 hover:text-white">{{ trans('header_and_footer.contact_us_text') }}</a>
                        </li>
                    </ul>
                </div>
                <div class="pt-10 md:pt-0">
                    <h3 class="pb-5 text-sm text-primary tracking-wider uppercase">
                        {{ trans('header_and_footer.latest_blogs') }}</h3>
                    <ul role="list" class="mt-4 space-y-0">
                        <li>
                            <span>
                                <a href="/blogs/Kids_Should_Start_Coding_Early" as="a"
                                    class=" text-gray-300 hover:text-white capitalize">Why Kids Should Start Coding
                                    Early
                                </a>
                            </span>
                        </li>
                        <li>
                            <span>
                                <a href="/blogs/coding_shapes_students_future_success" as="a"
                                    class=" text-gray-300 hover:text-white capitalize">Coding shapes students’ future
                                    success
                                </a>
                            </span>
                        </li>
                        <li>
                            <span>
                                <a href="/blogs/Reasons-Schools-Should-Add-Coding" as="a"
                                    class=" text-gray-300 hover:text-white capitalize">7 Reasons Schools Should Add
                                    Coding
                                </a>
                            </span>
                        </li>
                        <li>
                            <span>
                                <a href="/blogs/How-to-Introduce-Your-Child-to-Coding" as="a"
                                    class=" text-gray-300 hover:text-white capitalize">How to Introduce Your Child to
                                    Coding
                                </a>
                            </span>
                        </li>
                        <li>
                            <span>
                                <a href="/blogs/Introducing-Kids-to-Basic-Computer-Skills" as="a"
                                    class=" text-gray-300 hover:text-white capitalize">Introducing Kids to Basic
                                    Computer Skills
                                </a>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="text-center">
                <h3 class="text-sm text-primary tracking-wider uppercase">
                    {{ trans('header_and_footer.locations') }}</h3>
            </div>

            <div class="flex flex-col md:flex-row justify-around pb-8">
                <div class="pt-5 md:pt-0">
                    <!-- <h3 class="pb-5 text-sm text-primary tracking-wider uppercase"></h3> -->
                    <ul role="list" class="mt-4 space-y-0 text-center text-gray-300 hover:text-white">
                        <li><span
                                class="font-bold text-primary">{{ trans('header_and_footer.code_with_us_campbell') }}</span>
                        </li>
                        <li>{{ trans('header_and_footer.cwu_address1') }}</li>
                        <li>{{ trans('header_and_footer.cwu_address2') }}</li>
                    </ul>
                </div>

            </div>
            <div class="text-center">
                <p class="mt-8  text-primary md:mt-0 pb-5">
                    {{ trans('header_and_footer.text_below_logo_in_the_footer') }}
                </p>
                <div class="flex space-x-6 justify-center">
                    <a href="https://www.facebook.com/CODINGCLASSES/" target="_blank"
                        class="text-white hover:text-gray-300">
                        <span class="sr-only">Facebook</span>
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.6945 8.937V10.314H9.68652V11.997H10.6945V17H12.7665V11.997H14.1565C14.1565 11.997 14.2875 11.19 14.3505 10.307H12.7745V9.157C12.7745 8.984 13.0005 8.753 13.2245 8.753H14.3525V7H12.8175C10.6435 7 10.6945 8.685 10.6945 8.937Z"
                                fill="white" />
                            <path
                                d="M6 4C5.46957 4 4.96086 4.21071 4.58579 4.58579C4.21071 4.96086 4 5.46957 4 6V18C4 18.5304 4.21071 19.0391 4.58579 19.4142C4.96086 19.7893 5.46957 20 6 20H18C18.5304 20 19.0391 19.7893 19.4142 19.4142C19.7893 19.0391 20 18.5304 20 18V6C20 5.46957 19.7893 4.96086 19.4142 4.58579C19.0391 4.21071 18.5304 4 18 4H6ZM6 2H18C19.0609 2 20.0783 2.42143 20.8284 3.17157C21.5786 3.92172 22 4.93913 22 6V18C22 19.0609 21.5786 20.0783 20.8284 20.8284C20.0783 21.5786 19.0609 22 18 22H6C4.93913 22 3.92172 21.5786 3.17157 20.8284C2.42143 20.0783 2 19.0609 2 18V6C2 4.93913 2.42143 3.92172 3.17157 3.17157C3.92172 2.42143 4.93913 2 6 2Z"
                                fill="white" />
                        </svg>

                    </a>
                    <a href="https://www.instagram.com/codingclasses/" target="_blank"
                        class="text-white hover:text-gray-300">
                        <span class="sr-only">Instagram</span>
                        <svg class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M10 0C7.284 0 6.944 0.0119999 5.877 0.0599999C4.813 0.109 4.086 0.278 3.45 0.525C2.78249 0.775845 2.17775 1.16933 1.678 1.678C1.16936 2.17777 0.775874 2.7825 0.525 3.45C0.278 4.086 0.109 4.813 0.0599999 5.877C0.0109999 6.944 0 7.284 0 10C0 12.716 0.0109999 13.056 0.0599999 14.123C0.109 15.187 0.278 15.914 0.525 16.55C0.775903 17.2175 1.16938 17.8222 1.678 18.322C2.17779 18.8306 2.78252 19.2241 3.45 19.475C4.086 19.722 4.813 19.891 5.877 19.94C6.944 19.988 7.284 20 10 20C12.716 20 13.056 19.988 14.123 19.94C15.187 19.891 15.914 19.722 16.55 19.475C17.2175 19.2241 17.8222 18.8306 18.322 18.322C18.8306 17.8222 19.2241 17.2175 19.475 16.55C19.722 15.914 19.891 15.187 19.94 14.123C19.988 13.056 20 12.716 20 10C20 7.284 19.988 6.944 19.94 5.877C19.891 4.813 19.722 4.086 19.475 3.45C19.2241 2.7825 18.8306 2.17777 18.322 1.678C17.8222 1.16933 17.2175 0.775845 16.55 0.525C15.914 0.278 15.187 0.109 14.123 0.0599999C13.056 0.0119999 12.716 0 10 0ZM10 1.802C12.67 1.802 12.986 1.812 14.04 1.86C15.016 1.905 15.545 2.067 15.898 2.204C16.364 2.386 16.698 2.603 17.048 2.952C17.398 3.302 17.614 3.636 17.796 4.102C17.932 4.455 18.096 4.984 18.14 5.959C18.188 7.014 18.198 7.329 18.198 10C18.198 12.67 18.188 12.986 18.14 14.04C18.095 15.016 17.932 15.545 17.796 15.898C17.6357 16.3324 17.3801 16.7253 17.048 17.048C16.698 17.398 16.364 17.614 15.898 17.796C15.545 17.932 15.016 18.096 14.041 18.14C12.987 18.188 12.671 18.198 10 18.198C7.33 18.198 7.013 18.188 5.96 18.14C4.984 18.095 4.455 17.932 4.102 17.796C3.66758 17.6357 3.27462 17.3801 2.952 17.048C2.61986 16.7254 2.36426 16.3324 2.204 15.898C2.067 15.545 1.904 15.016 1.86 14.041C1.812 12.986 1.802 12.671 1.802 10C1.802 7.33 1.812 7.014 1.86 5.96C1.905 4.984 2.067 4.455 2.204 4.102C2.386 3.636 2.603 3.302 2.952 2.952C3.302 2.602 3.636 2.386 4.102 2.204C4.455 2.067 4.984 1.904 5.959 1.86C7.014 1.812 7.329 1.802 10 1.802ZM10 13.333C9.11603 13.333 8.26827 12.9818 7.64321 12.3568C7.01815 11.7317 6.667 10.884 6.667 10C6.667 9.11603 7.01815 8.26827 7.64321 7.64321C8.26827 7.01815 9.11603 6.667 10 6.667C10.884 6.667 11.7317 7.01815 12.3568 7.64321C12.9818 8.26827 13.333 9.11603 13.333 10C13.333 10.884 12.9818 11.7317 12.3568 12.3568C11.7317 12.9818 10.884 13.333 10 13.333ZM10 4.865C9.32566 4.865 8.65793 4.99782 8.03492 5.25588C7.41191 5.51394 6.84584 5.89218 6.36901 6.36901C5.89218 6.84584 5.51394 7.41191 5.25588 8.03492C4.99782 8.65793 4.865 9.32566 4.865 10C4.865 10.6743 4.99782 11.3421 5.25588 11.9651C5.51394 12.5881 5.89218 13.1542 6.36901 13.631C6.84584 14.1078 7.41191 14.4861 8.03492 14.7441C8.65793 15.0022 9.32566 15.135 10 15.135C11.3619 15.135 12.668 14.594 13.631 13.631C14.594 12.668 15.135 11.3619 15.135 10C15.135 8.63811 14.594 7.33201 13.631 6.36901C12.668 5.40601 11.3619 4.865 10 4.865ZM16.538 4.662C16.538 4.81959 16.507 4.97563 16.4467 5.12122C16.3863 5.26681 16.298 5.3991 16.1865 5.51053C16.0751 5.62196 15.9428 5.71035 15.7972 5.77066C15.6516 5.83096 15.4956 5.862 15.338 5.862C15.1804 5.862 15.0244 5.83096 14.8788 5.77066C14.7332 5.71035 14.6009 5.62196 14.4895 5.51053C14.378 5.3991 14.2897 5.26681 14.2293 5.12122C14.169 4.97563 14.138 4.81959 14.138 4.662C14.138 4.34374 14.2644 4.03852 14.4895 3.81347C14.7145 3.58843 15.0197 3.462 15.338 3.462C15.6563 3.462 15.9615 3.58843 16.1865 3.81347C16.4116 4.03852 16.538 4.34374 16.538 4.662Z"
                                fill="white" />
                        </svg>
                    </a>

                    <a href="https://www.linkedin.com/company/codewithus/" target="_blank"
                        class="text-white hover:text-gray-300">
                        <span class="sr-only">Twitter</span>
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M17 13.1305V16.8275H14.857V13.3775C14.857 12.5115 14.547 11.9205 13.771 11.9205C13.179 11.9205 12.826 12.3185 12.671 12.7045C12.615 12.8425 12.6 13.0345 12.6 13.2265V16.8275H10.456C10.456 16.8275 10.485 10.9855 10.456 10.3805H12.6V11.2935L12.586 11.3145H12.6V11.2945C12.885 10.8545 13.393 10.2285 14.532 10.2285C15.942 10.2285 17 11.1505 17 13.1305ZM8.213 7.27148C7.48 7.27148 7 7.75348 7 8.38548C7 9.00548 7.466 9.50048 8.185 9.50048H8.199C8.947 9.50048 9.412 9.00448 9.412 8.38548C9.398 7.75348 8.947 7.27148 8.213 7.27148ZM7.127 16.8275H9.271V10.3805H7.127V16.8275Z"
                                fill="white" />
                            <path
                                d="M6 4C5.46957 4 4.96086 4.21071 4.58579 4.58579C4.21071 4.96086 4 5.46957 4 6V18C4 18.5304 4.21071 19.0391 4.58579 19.4142C4.96086 19.7893 5.46957 20 6 20H18C18.5304 20 19.0391 19.7893 19.4142 19.4142C19.7893 19.0391 20 18.5304 20 18V6C20 5.46957 19.7893 4.96086 19.4142 4.58579C19.0391 4.21071 18.5304 4 18 4H6ZM6 2H18C19.0609 2 20.0783 2.42143 20.8284 3.17157C21.5786 3.92172 22 4.93913 22 6V18C22 19.0609 21.5786 20.0783 20.8284 20.8284C20.0783 21.5786 19.0609 22 18 22H6C4.93913 22 3.92172 21.5786 3.17157 20.8284C2.42143 20.0783 2 19.0609 2 18V6C2 4.93913 2.42143 3.92172 3.17157 3.17157C3.92172 2.42143 4.93913 2 6 2Z"
                                fill="white" />
                        </svg>
                    </a>
                </div>
                <p class="pt-10 text-black-lighter-4 md:-mb-16">
                    Copyright © {{ date('Y') }} Code With Us, Inc. All rights reserved.
                </p>
            </div>

        </div>

    </footer>
</section>
