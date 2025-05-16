<div>


    <!-- He who is contented is rich. - Laozi -->
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8 text-center">
            <h3 class="text-black-lighter-1">Pricing Guide</h3>
            <p>Coding Class and Camp With LIVE Instructor</p>
            @if($topic != "")
            {{-- <p>for <span style="color :{{ $topic->main_color }}!important;">Ages
                    @if ($topic->min_age || $topic->max_age)
                        <span> {{ $topic->min_age }} - {{ $topic->max_age }}</span>
                    @else
                        <span>5 - 18</span>
                    @endif
                </span></p> --}}
            @else
            {{-- <p>for <span>Ages <span>5 - 18</span> --}}
                {{-- <span v-else>5 - 18</span> --}}
            {{-- </span></p> --}}
            @endif
        </div>

        <div class="flex justify-center my-8">
            <div class="relative inline-flex bg-gray-200 rounded-full p-1">
                <!-- Morphing slider background -->
                <div id="slider"
                    class="absolute top-0 left-0 h-full rounded-full bg-white shadow transition-all duration-300 ease-in-out"
                    style="width: 0; transform: translateX(0); z-index: 0;">
                </div>

                {{-- @foreach(['monthly', 'quarterly', 'semi'] as $plan)
                    <button onclick="switchPlan('{{ $plan }}')" id="tab-{{ $plan }}"
                        data-plan="{{ $plan }}"
                        class="plan-tab relative z-10 px-6 py-2 text-sm font-medium rounded-full text-gray-700 flex items-center space-x-2 transition-colors duration-200">
                        <span>
                            {{ $plan == 'semi' ? 'Semi Annually' : ucfirst($plan) }}
                        </span>
                        <span class="ml-2 bg-blue-600 text-white text-xs font-semibold px-2 py-0.5 rounded-full">
                            {{ $plan == 'monthly' ? '20%' : ($plan == 'quarterly' ? '30%' : '35%') }} off
                        </span>
                    </button>
                @endforeach --}}

                @foreach(['monthly', 'quarterly', 'semi'] as $plan)
                    <button onclick="switchPlan('{{ $plan }}')" id="tab-{{ $plan }}"
                        data-plan="{{ $plan }}"
                        class="plan-tab relative z-10 px-6 py-2 text-sm font-medium rounded-full flex items-center space-x-2 transition-colors duration-200
                        {{ $plan === 'monthly' ? 'text-black font-semibold' : 'text-gray-700' }}">
                        <span>
                            {{ $plan === 'semi' ? 'Semi Annually' : ucfirst($plan) }}
                        </span>
                        <span class="ml-2 bg-blue-600 text-white text-xs font-semibold px-2 py-0.5 rounded-full">
                            {{ $plan === 'monthly' ? '20%' : ($plan === 'quarterly' ? '30%' : '35%') }} off
                        </span>
                    </button>
                @endforeach

            </div>
        </div>

        @php
            $planData = [
                'monthly' => [
                    'intervalText' => 'Monthly',
                    'saveAmount' => (float)trans('pricing.monthly_weekly_classes_full_price') - (float)trans('pricing.monthly_weekly_classes_discounted_price'),
                    'discountedPrice' => trans('pricing.monthly_weekly_classes_discounted_price'),
                    'fullPrice' => trans('pricing.monthly_weekly_classes_full_price'),
                    'weeklyInterval' => 1,
                    'renewable' => trans('pricing.renewable_monthly'),
                ],
                'quarterly' => [
                    'intervalText' => 'Quarterly',
                    'saveAmount' => (float)trans('pricing.quaterly_weekly_classes_full_price') - (float)trans('pricing.quaterly_weekly_classes_discounted_price'),
                    'discountedPrice' => trans('pricing.quaterly_weekly_classes_discounted_price'),
                    'fullPrice' => trans('pricing.quaterly_weekly_classes_full_price'),
                    'weeklyInterval' => 3,
                    'renewable' => trans('pricing.renewable_quarterly'),
                ],
                'semi' => [
                    'intervalText' => 'Semi Annually',
                    'saveAmount' => (float)trans('pricing.semi_annual_weekly_classes_full_price') - (float)trans('pricing.semi_annual_weekly_classes_discounted_price'),
                    'discountedPrice' => trans('pricing.semi_annual_weekly_classes_discounted_price'),
                    'fullPrice' => trans('pricing.semi_annual_weekly_classes_full_price'),
                    'weeklyInterval' => 6,
                    'renewable' => trans('pricing.renewable_semi_annually'),
                ]
            ];
        @endphp

        @foreach($planData as $planId => $data)
            <div id="plan-{{ $planId }}" class="plan-container {{ $planId != 'monthly' ? 'hidden' : '' }}">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="mt-12 space-y-4 sm:mt-16 sm:space-y-0 sm:grid sm:grid-cols-2 sm:gap-6 lg:max-w-4xl lg:mx-auto xl:max-w-none xl:mx-0 xl:grid-cols-3">
                        <!-- Trial Lesson Card -->
                        <div class="bg-white rounded-3xl shadow-card flex flex-col h-full">
                            <div>
                                <img class="rounded-t-3xl w-full" src="{{ $topic ? "/images/topic_page/{$topic->slug}/1.webp" : '/images/pricing_guide/trial_classes.webp' }}" alt="trial_class">
                            </div>
                            <div class="pt-6 pb-8 px-10 flex flex-col flex-1">
                                <div class="text-center mb-2">
                                    <span class="inline-flex px-8 py-2 rounded-full text-sm text-white font-bold" style="{{ $topic ? "background-color: {$topic->main_color}!important" : "color: black !important" }}">
                                        Trial Lesson
                                    </span>
                                </div>
                                <h3 class="text-black-lighter-2 tracking-wide text-center">
                                    <span style="{{ $topic ? "color: {$topic->main_color}!important" : '' }}"><span style="font-size: 20px;">Free - </span></span> <span style="font-size: 20px;">$0</span>
                                </h3>
                                <p class="text-center">{{ trans('pricing.pricing_trial_group_lesson') }}</p>
                                <ul role="list" class="mt-6 pb-8 space-y-7">
                                    {!! trans('pricing.Trial_class_per_student') !!}
                                </ul>
                                <div class="text-center  mt-auto">
                                    <a href="/coding_classes" style="{{ $topic ? "color: {$topic->main_color}!important;border-color: {$topic->main_color}!important;" : '' }}" class="space-x-4 inline-flex items-center px-5 py-2 border border-primary shadow-primary text-base font-medium rounded-full hover:text-primary focus:outline-none">
                                        <span>Book Now</span>
                                    </a>
                                </div>
                            </div>
                            <div class="h-8 rounded-b-3xl" style="{{ $topic ? "background-color: {$topic->main_color}!important" : "background-color: #d21313!important" }}"></div>
                        </div>

                        <!-- Weekly Class Card -->
                        <div class="bg-white rounded-3xl shadow-card flex flex-col h-full">
                            <div>
                                <img class="rounded-t-3xl w-full" src="{{ $topic ? "/images/topic_page/{$topic->slug}/2.webp" : '/images/pricing_guide/weekly_classes.webp' }}" alt="weekly_class">
                            </div>
                            <div class="pt-6 pb-8 px-10 flex flex-col flex-1">
                                <div class="text-center mb-2">
                                    <span class="inline-flex px-8 py-2 rounded-full text-sm text-white font-bold" style="{{ $topic ? "background-color: {$topic->main_color}!important" : "color: black !important" }}">
                                        Weekly Class
                                    </span>
                                </div>
                                <div class="text-white p-2 z-20 mx-auto max-w-sm text-xl font-bold z-20 text-center" style="background-color:{{ $topic ? $topic->main_color : "rgb(249, 178, 59)" }}!important">
                                    LIMITED TIME SAVE ${{ $data['saveAmount'] }}
                                </div>
                                <h3 class="text-black-lighter-2 tracking-wide text-center">
                                    <span style="font-size: 20px;">{{ $data['intervalText'] }} - </span>
                                    @php
                                        $style = "font-size: 20px;";
                                        if ($topic) {
                                            $style = "color: {$topic->main_color}!important; $style";
                                        }
                                    @endphp
                                    <span style="{{ $style }}">${{ $data['discountedPrice'] }} </span>
                                    <span class="relative" style="font-size: 20px;">
                                        ${{ $data['fullPrice'] }}
                                        <span class="absolute right-0 border border-danger left-0 top-3"></span>
                                    </span>
                                </h3>
                                {{-- <p class="text-center">{{ trans('pricing.month_to_month Price') }}</p> --}}
                                <p class="text-center">{{ $data['renewable'] }}</p>
                                <ul role="list" class="mt-6 pb-8 space-y-7">
                                    {!! trans('pricing.month_to_month_price_detail') !!}
                                </ul>
                                <div class="text-center  mt-auto">
                                    <a href="/monthly-subscriptions" onclick="localStorage.setItem('weekly_interval', {{ $data['weeklyInterval'] }});" style="{{ $topic ? "color: {$topic->main_color}!important;border-color: {$topic->main_color}!important;" : '' }}" class="space-x-4 inline-flex items-center px-5 py-2 border border-primary shadow-primary text-base font-medium rounded-full hover:text-primary focus:outline-none">
                                        <span>Book Now</span>
                                    </a>
                                </div>
                            </div>
                            <div class="h-8 rounded-b-3xl mt-1" style="{{ $topic ? "background-color: {$topic->main_color}!important" : "background-color: #004aad!important" }}"></div>
                        </div>

                        <!-- Coding Camp Card -->
                        <div class="bg-white rounded-3xl shadow-card flex flex-col h-full">
                            <div>
                                <img class="rounded-t-3xl w-full" src="{{ $topic ? "/images/topic_page/{$topic->slug}/3.webp" : '/images/pricing_guide/seasonal_camps.webp' }}" alt="coding_camp">
                            </div>
                            <div class="pt-6 pb-8 px-10 flex flex-col flex-1">
                                <div class="text-center mb-2">
                                    <span class="inline-flex px-8 py-2 rounded-full text-sm text-white font-bold" style="{{ $topic ? "background-color: {$topic->main_color}!important" : "color: black !important" }}">
                                        Coding Camp
                                    </span>
                                </div>
                                <div class="text-white p-2 z-20 mx-auto max-w-sm text-xl font-bold z-20 text-center" style="background-color:{{ $topic ? $topic->main_color : "rgb(249, 178, 59)" }}!important">
                                    LIMITED TIME SAVE ${{ (float)trans('pricing.seasonal_camps_full_price') - (float)trans('pricing.seasonal_camps_discounted_price') }}
                                </div>
                                <h3 class="text-black-lighter-2 tracking-wide text-center">
                                    <span style="font-size: 20px;">Weekly - </span>
                                    @php
                                        $style1 = "font-size: 20px;";
                                        if ($topic) {
                                            $style1 = "color: {$topic->main_color}!important; $style1";
                                        }
                                    @endphp
                                    <span style="{{ $style1 }}">
                                        ${{ trans('pricing.seasonal_camps_discounted_price') }}
                                    </span>
                                    <span class="relative" style="font-size: 20px;">
                                        ${{ trans('pricing.seasonal_camps_full_price') }}
                                        <span class="absolute right-0 border border-danger left-0 top-3"></span>
                                    </span>
                                </h3>
                                <p class="text-center">{{ trans('pricing.Morning_Afternoon_or_Full_Day_Camp') }}</p>
                                <ul role="list" class="mt-6 pb-8 space-y-7">
                                    {!! trans('pricing.Morning_Afternoon_or_Full_Day_Camp_detial') !!}
                                </ul>
                                <div class="text-center mt-auto">
                                    <a href="/camps#campsForm" style="{{ $topic ? "color: {$topic->main_color}!important;border-color: {$topic->main_color}!important;" : '' }}" class="space-x-4 inline-flex items-center px-5 py-2 border border-primary shadow-primary text-base font-medium rounded-full hover:text-primary focus:outline-none">
                                        <span>Book Now</span>
                                    </a>
                                </div>
                            </div>
                            <div class="h-8 rounded-b-3xl mt-1" style="{{ $topic ? "background-color: {$topic->main_color}!important" : "background-color: #038036!important" }}"></div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </section>
</div>
