@if (Request::segment(1) != 'student_spotlight')
    <section>
        <div class="max-w-5xl mx-auto">
            <h3 class="text-center">
                <div class="flex justify-center">
                    <svg viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 p-1">
                        <path
                            d="M9.67679 3.52128L6.67898 3.06505L5.33889 0.220085C5.30228 0.142191 5.24207 0.0791345 5.16768 0.0408059C4.98113 -0.0556336 4.75444 0.0247327 4.66116 0.220085L3.32106 3.06505L0.323258 3.52128C0.240609 3.53365 0.165044 3.57445 0.107189 3.63627C0.0372466 3.71155 -0.00129512 3.81283 3.3232e-05 3.91785C0.00136159 4.02287 0.0424513 4.12305 0.114274 4.19636L2.28323 6.41076L1.7708 9.53763C1.75878 9.61037 1.76647 9.68518 1.79299 9.75357C1.81951 9.82197 1.86379 9.88121 1.92083 9.92459C1.97787 9.96797 2.04537 9.99375 2.11568 9.999C2.186 10.0042 2.25631 9.98876 2.31865 9.9543L5.00002 8.47803L7.6814 9.9543C7.7546 9.9951 7.83962 10.0087 7.92108 9.99386C8.12653 9.95677 8.26467 9.75276 8.22925 9.53763L7.71682 6.41076L9.88577 4.19636C9.94481 4.13578 9.98377 4.05665 9.99558 3.9701C10.0275 3.75373 9.88341 3.55343 9.67679 3.52128V3.52128Z"
                            fill="#FF9E45"></path>
                    </svg>
                    <svg viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 p-1">
                        <path
                            d="M9.67679 3.52128L6.67898 3.06505L5.33889 0.220085C5.30228 0.142191 5.24207 0.0791345 5.16768 0.0408059C4.98113 -0.0556336 4.75444 0.0247327 4.66116 0.220085L3.32106 3.06505L0.323258 3.52128C0.240609 3.53365 0.165044 3.57445 0.107189 3.63627C0.0372466 3.71155 -0.00129512 3.81283 3.3232e-05 3.91785C0.00136159 4.02287 0.0424513 4.12305 0.114274 4.19636L2.28323 6.41076L1.7708 9.53763C1.75878 9.61037 1.76647 9.68518 1.79299 9.75357C1.81951 9.82197 1.86379 9.88121 1.92083 9.92459C1.97787 9.96797 2.04537 9.99375 2.11568 9.999C2.186 10.0042 2.25631 9.98876 2.31865 9.9543L5.00002 8.47803L7.6814 9.9543C7.7546 9.9951 7.83962 10.0087 7.92108 9.99386C8.12653 9.95677 8.26467 9.75276 8.22925 9.53763L7.71682 6.41076L9.88577 4.19636C9.94481 4.13578 9.98377 4.05665 9.99558 3.9701C10.0275 3.75373 9.88341 3.55343 9.67679 3.52128V3.52128Z"
                            fill="#FF9E45"></path>
                    </svg>

                    <svg viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 p-1">
                        <path
                            d="M9.67679 3.52128L6.67898 3.06505L5.33889 0.220085C5.30228 0.142191 5.24207 0.0791345 5.16768 0.0408059C4.98113 -0.0556336 4.75444 0.0247327 4.66116 0.220085L3.32106 3.06505L0.323258 3.52128C0.240609 3.53365 0.165044 3.57445 0.107189 3.63627C0.0372466 3.71155 -0.00129512 3.81283 3.3232e-05 3.91785C0.00136159 4.02287 0.0424513 4.12305 0.114274 4.19636L2.28323 6.41076L1.7708 9.53763C1.75878 9.61037 1.76647 9.68518 1.79299 9.75357C1.81951 9.82197 1.86379 9.88121 1.92083 9.92459C1.97787 9.96797 2.04537 9.99375 2.11568 9.999C2.186 10.0042 2.25631 9.98876 2.31865 9.9543L5.00002 8.47803L7.6814 9.9543C7.7546 9.9951 7.83962 10.0087 7.92108 9.99386C8.12653 9.95677 8.26467 9.75276 8.22925 9.53763L7.71682 6.41076L9.88577 4.19636C9.94481 4.13578 9.98377 4.05665 9.99558 3.9701C10.0275 3.75373 9.88341 3.55343 9.67679 3.52128V3.52128Z"
                            fill="#FF9E45"></path>
                    </svg>
                    <svg viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 p-1">
                        <path
                            d="M9.67679 3.52128L6.67898 3.06505L5.33889 0.220085C5.30228 0.142191 5.24207 0.0791345 5.16768 0.0408059C4.98113 -0.0556336 4.75444 0.0247327 4.66116 0.220085L3.32106 3.06505L0.323258 3.52128C0.240609 3.53365 0.165044 3.57445 0.107189 3.63627C0.0372466 3.71155 -0.00129512 3.81283 3.3232e-05 3.91785C0.00136159 4.02287 0.0424513 4.12305 0.114274 4.19636L2.28323 6.41076L1.7708 9.53763C1.75878 9.61037 1.76647 9.68518 1.79299 9.75357C1.81951 9.82197 1.86379 9.88121 1.92083 9.92459C1.97787 9.96797 2.04537 9.99375 2.11568 9.999C2.186 10.0042 2.25631 9.98876 2.31865 9.9543L5.00002 8.47803L7.6814 9.9543C7.7546 9.9951 7.83962 10.0087 7.92108 9.99386C8.12653 9.95677 8.26467 9.75276 8.22925 9.53763L7.71682 6.41076L9.88577 4.19636C9.94481 4.13578 9.98377 4.05665 9.99558 3.9701C10.0275 3.75373 9.88341 3.55343 9.67679 3.52128V3.52128Z"
                            fill="#FF9E45"></path>
                    </svg>
                    <svg viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 p-1">
                        <path
                            d="M9.67679 3.52128L6.67898 3.06505L5.33889 0.220085C5.30228 0.142191 5.24207 0.0791345 5.16768 0.0408059C4.98113 -0.0556336 4.75444 0.0247327 4.66116 0.220085L3.32106 3.06505L0.323258 3.52128C0.240609 3.53365 0.165044 3.57445 0.107189 3.63627C0.0372466 3.71155 -0.00129512 3.81283 3.3232e-05 3.91785C0.00136159 4.02287 0.0424513 4.12305 0.114274 4.19636L2.28323 6.41076L1.7708 9.53763C1.75878 9.61037 1.76647 9.68518 1.79299 9.75357C1.81951 9.82197 1.86379 9.88121 1.92083 9.92459C1.97787 9.96797 2.04537 9.99375 2.11568 9.999C2.186 10.0042 2.25631 9.98876 2.31865 9.9543L5.00002 8.47803L7.6814 9.9543C7.7546 9.9951 7.83962 10.0087 7.92108 9.99386C8.12653 9.95677 8.26467 9.75276 8.22925 9.53763L7.71682 6.41076L9.88577 4.19636C9.94481 4.13578 9.98377 4.05665 9.99558 3.9701C10.0275 3.75373 9.88341 3.55343 9.67679 3.52128V3.52128Z"
                            fill="#FF9E45"></path>
                    </svg>
                </div>
                {{-- What our students say --}}
                {{ trans('HOME.what_our_students_say') }}
            </h3>

            <div class="flex items-center gap-5">

                <div class="owl-carousel owl-theme">
                    @foreach ($studentSpotLights as $studentSpotLight)
                        <div class="item">
                            <div class="space-y-3">
                                <div class="w-full">
                                    <img src="{{ env('MIX_IMAGE_URL') }}/images/student_spot_lights/{{ $studentSpotLight->image_name }}"
                                        loading="lazy"
                                        class="rounded-2xl min-w-full mx-auto h-32 object-center object-cover"
                                        alt="{{ $studentSpotLight->name }}">
                                </div>
                                <div
                                    class="pl-3 flex text-center space-y-3 flex-col text-primary font-bold items-center justify-center md:block">
                                    <div>{{ $studentSpotLight->name }}</div>
                                    <div class="text-black-lighter-3">Student</div>
                                </div>
                                <p class="text-left md:text-left showText">
                                    {{-- <read-more string="{{ $studentSpotLight->comment }}" :limit="70"
                                        class="px-3"></read-more> --}}
                                        {{-- {{ $studentSpotLight->comment }} --}}
                                        <span class="text">
                                            {{ \Str::limit($studentSpotLight->comment,50)}}
                                        </span>
                                        <span class="more hidden">
                                            {{ $studentSpotLight->comment}}
                                        </span>

                                </p>
                                <button type="button" class="read text-primary mt-10 text-left">Read More</button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </section>
@endif

@if (Request::segment(1) === 'student_spotlight')
    <div>
        <section class="py-20">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 md:px-8 text-center space-y-3">
                <h2>{{ trans('page_titles.student_spotlight') }}</h2>
                <p class="pb-4 -mt-5">{{ trans('student-spotlight.student_spotlight_description') }} </p>
            </div>
        </section>

        <div class="grid grid-cols-1 md:grid-cols-2 max-w-7xl mx-auto">
            @foreach ($studentSpotLights as $studentSpotLight)
                <div
                    class="flex-row items-stretch text-center md:text-justify md:flex md:space-x-5 bg-white text-black-lighter-1  m-5 rounded-3xl shadow-card">
                    <img src="{{ env('MIX_IMAGE_URL') }}/images/student_spot_lights/{{ $studentSpotLight->image_name }}"
                        class="rounded-t-3xl w-full md:rounded-none md:rounded-l-3xl md:w-2/5 md:h-auto object-cover"
                        alt="{{ $studentSpotLight->image_name }}">
                    <div class="">
                        @if ($studentSpotLight->created_at)
                            <div class="pt-5 md:pt-2 text-sm md:pl-3 text-black-lighter-3">
                                {{ $studentSpotLight->created_at->toDayDateTimeString() }}</div>
                        @else
                            <div class="pt-5 md:pt-2 text-sm text-black-lighter-3">18h ago</div>
                        @endif
                        <h5 class="p-3">{{ $studentSpotLight->name }}</h5>
                        <p class="p-3">
                            <read-more string="{{ $studentSpotLight->comment }}" :limit="70"></read-more>
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif
