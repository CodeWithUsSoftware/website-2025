@extends('layouts.master')

@section('content')
    <section class="pb-0">
        <div class="relative max-w-full mx-auto ">
            <div class="relative py-10 px-8 overflow-hidden lg:px-16 takeover-panel-topic">
                <div class="absolute inset-0  mix-blend-multiply">
                    <img src="/images/topic_page/topic_ai.webp" alt="banner" class="w-full h-full object-cover" />
                </div>
                <div class="relative lg:top-1/4 md:top-2/3">
                    <slot>
                        <h2 class="text-center text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl">
                            <span class="block text-white">Artificial Intelligence</span>
                        </h2>
                        <p
                            class="flex flex-col md:flex-row items-center md:justify-center mx-auto space-y-5 md:space-y-0 mt-6 max-w-lg md:space-x-10 mx-auto text-center text-base text-indigo-200 sm:max-w-3xl">
                            <a href="/camps?loc=AI%20Online%20Camp#campsForm"
                                class="shadow-2xl space-x-4 inline-flex items-center px-16 py-2 border border-white bg-[#4698a7]  hover:text-white hover:bg-[#0cc0df] rounded-full text-white focus:outline-none">
                                <span>Seasonal Camp</span>
                            </a>
                        </p>
                    </slot>
                </div>
            </div>
        </div>
    </section>

    <!-- Introduction Section with Highlighted Features -->
    <div class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-center mb-6 text-[#4698a7]">Explore the World of Artificial
                    Intelligence</h2>
                <p class="text-sm text-gray-600 text-center">Our comprehensive program introduces students to the
                    fascinating world of AI, machine learning, and data science through interactive lessons and hands-on
                    projects.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                <div
                    class="bg-white rounded-xl shadow-lg p-8 transform transition-all hover:-translate-y-2 hover:shadow-xl border-t-4 border-[#4698a7]">
                    <div class="w-16 h-16 mb-6 bg-[#4698a7]/10 rounded-lg flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#4698a7]" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                        </svg>
                    </div>
                    <h3 class="text-base font-bold mb-3 text-[#4698a7]">AI & Machine Learning</h3>
                    <p class="text-sm text-gray-600">Understand AI models, training data, neural networks, and their
                        real-world applications.</p>
                </div>

                <div
                    class="bg-white rounded-xl shadow-lg p-8 transform transition-all hover:-translate-y-2 hover:shadow-xl border-t-4 border-[#4698a7]">
                    <div class="w-16 h-16 mb-6 bg-[#4698a7]/10 rounded-lg flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#4698a7]" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                        </svg>
                    </div>
                    <h3 class="text-base font-bold mb-3 text-[#4698a7]">Data Science</h3>
                    <p class="text-sm text-gray-600">Master data analysis essentials using Pandas, Numpy, and visualization
                        tools like Matplotlib.</p>
                </div>
                <div
                    class="bg-white rounded-xl shadow-lg p-8 transform transition-all hover:-translate-y-2 hover:shadow-xl border-t-4 border-[#4698a7]">
                    <div class="w-16 h-16 mb-6 bg-[#4698a7]/10 rounded-lg flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#4698a7]" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-base font-bold mb-3 text-[#4698a7]">Python Programming</h3>
                    <p class="text-sm text-gray-600">Learn Python from scratch, including syntax, data structures,
                        algorithms, and advanced programming techniques.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- What You'll Learn Section -->
    <div id="curriculum" class="py-10 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-8 text-[#4698a7]">What You'll Learn</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-3 max-w-5xl mx-auto">
                <div>
                    <h3 class="text-base font-bold text-gray-800 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#4698a7] mr-2 flex-shrink-0"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="text-[#4698a7]">Beginner-Friendly Python Lessons</div>
                    </h3>
                    <p class="text-sm text-gray-600 ml-6">Learn syntax, data structures, and algorithms.</p>
                </div>

                <div>
                    <h3 class="text-base font-bold text-gray-800 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#4698a7] mr-2 flex-shrink-0"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="text-[#4698a7]">Advanced Programming</div>
                    </h3>
                    <p class="text-sm text-gray-600 ml-6">String manipulation, lists, functions, loops.</p>
                </div>

                <div>
                    <h3 class="text-base font-bold text-gray-800 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#4698a7] mr-2 flex-shrink-0"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="text-[#4698a7]">AI & Machine Learning Basics</div>
                    </h3>
                    <p class="text-sm text-gray-600 ml-6">Understand AI models, training data, and applications.</p>
                </div>

                <div>
                    <h3 class="text-base font-bold text-gray-800 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#4698a7] mr-2 flex-shrink-0"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="text-[#4698a7]">Data Science Essentials</div>
                    </h3>
                    <p class="text-sm text-gray-600 ml-6">Pandas, Numpy, DataFrames, and Lambda Functions.</p>
                </div>

                <div>
                    <h3 class="text-base font-bold text-gray-800 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#4698a7] mr-2 flex-shrink-0"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="text-[#4698a7]">Data Organization</div>
                    </h3>
                    <p class="text-sm text-gray-600 ml-6">Lists, Booleans, Dictionaries, File Handling.</p>
                </div>

                <div>
                    <h3 class="text-base font-bold text-gray-800 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#4698a7] mr-2 flex-shrink-0"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="text-[#4698a7]">Command Line & OS Module</div>
                    </h3>
                    <p class="text-sm text-gray-600 ml-6">Navigating files and automating tasks.</p>
                </div>

                <div>
                    <h3 class="text-base font-bold text-gray-800 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#4698a7] mr-2 flex-shrink-0"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="text-[#4698a7]">Regex Magic</div>
                    </h3>
                    <p class="text-sm text-gray-600 ml-6">Extracting patterns from text like a pro.</p>
                </div>

                <div>
                    <h3 class="text-base font-bold text-gray-800 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#4698a7] mr-2 flex-shrink-0"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="text-[#4698a7]">Statistical Insights</div>
                    </h3>
                    <p class="text-sm text-gray-600 ml-6">Grouping, Pivot Tables & Handling Missing Data.</p>
                </div>

                <div>
                    <h3 class="text-base font-bold text-gray-800 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#4698a7] mr-2 flex-shrink-0"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="text-[#4698a7]">Data Visualization</div>
                    </h3>
                    <p class="text-sm text-gray-600 ml-6">Matplotlib for stunning bar charts, line graphs & more.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Who Can Join Section -->
    <div class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-10 md:mb-0 md:pr-16">
                    <img src="/images/ai_course/students_collaborating.jpg" alt="Students collaborating"
                        class="rounded-xl shadow-xl">
                </div>
                <div class="md:w-1/2">
                    <h3 class="text-2xl font-bold mb-6 text-[#4698a7]">Who Can Join?</h2>
                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4 text-[#4698a7] mr-2 mt-1 flex-shrink-0" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="text-sm text-gray-600">Middle & high school students (or beginners) eager to
                                    explore AI, Data Science, and Python!</span>
                            </li>
                            <li class="flex items-start">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4 text-[#4698a7] mr-2 mt-1 flex-shrink-0" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="text-sm text-gray-600">No prior coding experience is required, making it a
                                    great starting point for students interested in technology and innovation.</span>
                            </li>
                        </ul>

                        <div class="mt-12">
                            <h3 class="text-2xl font-bold mb-6 text-[#4698a7]">Why Join?</h3>
                            <ul class="space-y-4">
                                <li class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-4 w-4 text-[#4698a7] mr-2 mt-1 flex-shrink-0" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-sm text-gray-600">Hands-On Projects – Build chatbots, image
                                        recognition models, and more.</span>
                                </li>
                                <li class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-4 w-4 text-[#4698a7] mr-2 mt-1 flex-shrink-0" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-sm text-gray-600">Collaborative Learning – Work on team-based
                                        challenges and problem-solving activities.</span>
                                </li>
                                <li class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-4 w-4 text-[#4698a7] mr-2 mt-1 flex-shrink-0" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-sm text-gray-600">Real-world applications with expert
                                        instructors.</span>
                                </li>
                                <li class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-4 w-4 text-[#4698a7] mr-2 mt-1 flex-shrink-0" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-sm text-gray-600">Future Skills Development – Gain valuable coding
                                        and AI knowledge for future careers.</span>
                                </li>
                            </ul>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Camp Schedule Section -->
    <div class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-center mb-6 text-[#4698a7] mb-0 pb-0">Camp Content</h2>
                <div class="text-sm text-gray-600 text-center">Monday to Thursday (3 hours/day) for 2 weeks</div>
            </div>
            <div class="flex justify-between items-center max-w-4xl mx-auto mb-1">
                <p class="text-sm text-gray-600">8 days, 24+ hours live instructions</p>
                <button type="button" id="expandAllBtn"
                    class="text-sm text-[#4698a7] font-semibold hover:text-[#0cc0df] focus:outline-none">
                    Expand all sections
                </button>
            </div>

            <div class="max-w-4xl mx-auto space-y-4">
                <!-- Day 1 Section -->
                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <button type="button"
                        class="section-toggle w-full px-6 py-4 flex justify-between items-center hover:bg-gray-50 focus:outline-none"
                        data-target="section1">
                        <div class="flex flex-col text-left">
                            <h3 class="text-base font-bold text-gray-800 mb-0 pb-0">Day 1: Introduction to Python</h3>
                            <p class="text-sm text-gray-600">Getting started with Python basics</p>
                        </div>
                        <svg class="section-icon h-6 w-6 text-gray-400 transform transition-transform duration-200"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="section1" class="section-content hidden px-6 pb-4 pt-4">
                        <ul class="space-y-3">
                            @foreach (['Overview of Python & real-world applications', 'Writing basic scripts: Input/Output', 'Understanding Data Types', 'String manipulation techniques'] as $item)
                                <li class="flex items-start">
                                    <svg class="h-4 w-4 text-[#4698a7] mr-2 mt-1" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-sm text-gray-600">{{ $item }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Day 2 Section -->
                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <button type="button"
                        class="section-toggle w-full px-6 py-4 flex justify-between items-center hover:bg-gray-50 focus:outline-none"
                        data-target="section2">
                        <div class="flex flex-col text-left">
                            <h3 class="text-base font-bold text-gray-800 mb-0 pb-0">Day 2: Core Python Concepts</h3>
                            <p class="text-sm text-gray-600">Lists, functions and control statements</p>
                        </div>
                        <svg class="section-icon h-6 w-6 text-gray-400 transform transition-transform duration-200"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="section2" class="section-content hidden px-6 pb-4 pt-4">
                        <ul class="space-y-3">
                            @foreach (['Lists: indexing, slicing, and list operations', 'Writing functions and using return values', 'If/Else statements, Boolean logic & comparisons', 'Introduction to loops (for/while) for automation', 'Organizing data with Dictionaries'] as $item)
                                <li class="flex items-start">
                                    <svg class="h-4 w-4 text-[#4698a7] mr-2 mt-1" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-sm text-gray-600">{{ $item }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Day 3 Section -->
                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <button type="button"
                        class="section-toggle w-full px-6 py-4 flex justify-between items-center hover:bg-gray-50 focus:outline-none"
                        data-target="section3">
                        <div class="flex flex-col text-left">
                            <h3 class="text-base font-bold text-gray-800 mb-0 pb-0">Day 3: File Handling in Python</h3>
                            <p class="text-sm text-gray-600">Working with files and automation</p>
                        </div>
                        <svg class="section-icon h-6 w-6 text-gray-400 transform transition-transform duration-200"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="section3" class="section-content hidden px-6 pb-4 pt-4">
                        <ul class="space-y-3">
                            @foreach (['Reading and writing files in Python', 'Understanding and avoiding infinite loops', 'Navigating files using the OS module', 'Python scripts from the command line'] as $item)
                                <li class="flex items-start">
                                    <svg class="h-4 w-4 text-[#4698a7] mr-2 mt-1" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-sm text-gray-600">{{ $item }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Day 4 Section -->
                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <button type="button"
                        class="section-toggle w-full px-6 py-4 flex justify-between items-center hover:bg-gray-50 focus:outline-none"
                        data-target="section4">
                        <div class="flex flex-col text-left">
                            <h3 class="text-base font-bold text-gray-800 mb-0 pb-0">Day 4: AI Fundamentals</h3>
                            <p class="text-sm text-gray-600">Introduction to artificial intelligence concepts</p>
                        </div>
                        <svg class="section-icon h-6 w-6 text-gray-400 transform transition-transform duration-200"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="section4" class="section-content hidden px-6 pb-4 pt-4">
                        <ul class="space-y-3">
                            @foreach (['Introduction to AI, machine learning, and real-world applications', 'Understanding how data is used to train AI models', 'Ethics & bias in AI and responsible data science practices'] as $item)
                                <li class="flex items-start">
                                    <svg class="h-4 w-4 text-[#4698a7] mr-2 mt-1" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-sm text-gray-600">{{ $item }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Day 5 Section -->
                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <button type="button"
                        class="section-toggle w-full px-6 py-4 flex justify-between items-center hover:bg-gray-50 focus:outline-none"
                        data-target="section5">
                        <div class="flex flex-col text-left">
                            <h3 class="text-base font-bold text-gray-800 mb-0 pb-0">Day 5: Introduction to Data Analysis
                            </h3>
                            <p class="text-sm text-gray-600">Working with Pandas and datasets</p>
                        </div>
                        <svg class="section-icon h-6 w-6 text-gray-400 transform transition-transform duration-200"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="section5" class="section-content hidden px-6 pb-4 pt-4">
                        <ul class="space-y-3">
                            @foreach (['Exploring datasets with Pandas', 'Basic Numpy operations', 'Using Pandas to read CSV files and perform basic data cleaning', 'Understanding data joins: left, right, inner, outer merges'] as $item)
                                <li class="flex items-start">
                                    <svg class="h-4 w-4 text-[#4698a7] mr-2 mt-1" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-sm text-gray-600">{{ $item }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Day 6 Section -->
                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <button type="button"
                        class="section-toggle w-full px-6 py-4 flex justify-between items-center hover:bg-gray-50 focus:outline-none"
                        data-target="section6">
                        <div class="flex flex-col text-left">
                            <h3 class="text-base font-bold text-gray-800 mb-0 pb-0">Day 6: Advanced Data Analysis</h3>
                            <p class="text-sm text-gray-600">Data cleaning and manipulation techniques</p>
                        </div>
                        <svg class="section-icon h-6 w-6 text-gray-400 transform transition-transform duration-200"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="section6" class="section-content hidden px-6 pb-4 pt-4">
                        <ul class="space-y-3">
                            @foreach (['Cleaning messy datasets for analysis with Pandas', 'Filtering, sorting, and modifying DataFrames', 'Identifying and handling duplicate or inconsistent data', 'Using lambda functions for efficient operations', 'Handling missing data'] as $item)
                                <li class="flex items-start">
                                    <svg class="h-4 w-4 text-[#4698a7] mr-2 mt-1" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-sm text-gray-600">{{ $item }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Day 7 Section -->
                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <button type="button"
                        class="section-toggle w-full px-6 py-4 flex justify-between items-center hover:bg-gray-50 focus:outline-none"
                        data-target="section7">
                        <div class="flex flex-col text-left">
                            <h3 class="text-base font-bold text-gray-800 mb-0 pb-0">Day 7: Data Visualization</h3>
                            <p class="text-sm text-gray-600">Creating charts and visualizing insights</p>
                        </div>
                        <svg class="section-icon h-6 w-6 text-gray-400 transform transition-transform duration-200"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="section7" class="section-content hidden px-6 pb-4  pt-4">
                        <ul class="space-y-3">
                            @foreach (['Grouping columns, aggregating data & using Pivot Tables', 'Creating bar charts, line graphs, and pie charts with Matplotlib', 'Customizing and interpreting visualizations for data insights'] as $item)
                                <li class="flex items-start">
                                    <svg class="h-4 w-4 text-[#4698a7] mr-2 mt-1" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-sm text-gray-600">{{ $item }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Day 8 Section -->
                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <button type="button"
                        class="section-toggle w-full px-6 py-4 flex justify-between items-center hover:bg-gray-50 focus:outline-none"
                        data-target="section8">
                        <div class="flex flex-col text-left">
                            <h3 class="text-base font-bold text-gray-800 mb-0 pb-0">Day 8: Final Project</h3>
                            <p class="text-sm text-gray-600">Applying skills to create a complete project</p>
                        </div>
                        <svg class="section-icon h-6 w-6 text-gray-400 transform transition-transform duration-200"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="section8" class="section-content hidden px-6 pb-4 pt-4">
                        <ul class="space-y-3">
                            @foreach (['Applying Python skills to analyze a real-world dataset', 'Creating visualizations to present key insights', 'Writing a summary report or presenting findings to the class'] as $item)
                                <li class="flex items-start">
                                    <svg class="h-4 w-4 text-[#4698a7] mr-2 mt-1" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-sm text-gray-600">{{ $item }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="pricing">
        <div>
            <!-- He who is contented is rich. - Laozi -->
            <section class="py-20">

                <div class="text-center">
                    <h3 class="text-black-lighter-1">Pricing Guide</h3>
                    <p>Camp With LIVE Instructor</p>
                    <p>for<span style="color: #4698a7!important;"> Ages <span>12+</span></span></p>
                </div>

                <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8 text-center">

                    <div
                        class="mt-12 space-y-4 sm:mt-16 sm:space-y-0 sm:grid sm:grid-cols-2 sm:gap-6 lg:max-w-4xl lg:mx-auto xl:max-w-none xl:mx-0 xl:grid-cols-3">

                        <div></div>
                        <!-- Coding Camp Card -->
                        <div class="bg-white rounded-3xl shadow-card">
                            <div>
                                <img class="rounded-t-3xl w-full" src="/images/topic_page/artificial-intelligence/ai.jpg"
                                    alt="coding_camp">
                            </div>
                            <div class="pt-6 pb-8 px-10">
                                <div class="text-center mb-2">
                                    <span class="inline-flex px-8 py-2 rounded-full text-sm text-white font-bold"
                                        style="background-color: #4698a7!important;">
                                        Seasonal Coding Camp
                                    </span>
                                </div>
                                <div class="text-white p-2 z-20 mx-auto max-w-sm text-base font-bold text-center"
                                    style="background-color: #4698a7!important;">
                                    LIMITED TIME SAVE ${!! trans('pricing.ai_seasonal_camps_full_price') - trans('pricing.ai_seasonal_camps_discounted_price') !!}
                                </div>
                                <h3 class="text-black-lighter-2 tracking-wide text-center">
                                    <span style="color: #4698a7!important;">
                                        {{-- {!! trans('pricing.ai_seasonal_camps_prices') !!} --}}
                                        ${!! trans('pricing.ai_seasonal_camps_discounted_price') !!}</span> <small class="text-sm">
                                        /month </small>
                                    <span class="relative">
                                        ${!! trans('pricing.ai_seasonal_camps_full_price') !!}
                                        <span class="absolute right-0 border border-danger left-0 top-5"></span>
                                    </span>
                                </h3>
                                </span>
                                </h3>
                                <p class="text-center">{{ trans('pricing.ai_Morning_Afternoon_or_Full_Day_Camp') }}</p>
                                <ul role="list" class="mt-6 pb-8 space-y-7">
                                    <ul role="list" class="mt-6 pb-8 space-y-7 text-left">
                                        {!! trans('pricing.ai_Morning_Afternoon_or_Full_Day_Camp_detial') !!}
                                    </ul>
                                </ul>
                                <div class="text-center">
                                    <a href="/camps?loc=AI%20Online%20Camp#campsForm"
                                        style="color: #4698a7!important; border-color: #4698a7!important;"
                                        class="space-x-4 inline-flex items-center px-5 py-2 border border-primary shadow-primary text-base font-medium rounded-full hover:text-primary focus:outline-none">
                                        <span>Book Now</span>
                                    </a>
                                </div>
                            </div>
                            <div style="background-color: #4698a7!important;" class="h-8 rounded-b-3xl mt-1"></div>
                        </div>

                        <div></div>

                    </div>
                </div>
            </section>
        </div>

    </section>



    {{-- <section class="py-16">
        <schedule-a-phone-class schedule_a_phone_call_title="{{ trans('phone_call.schedule_a_phone_call_title') }}" />
    </section> --}}

    @include('layouts.FooterIcons')
@endsection

@push('styles')
    <style>
        /* Custom animations and styles */
        .hover\:shadow-xl {
            transition: all 0.3s ease;
        }

        #neural-net-animation {
            background-image: url('https://images.unsplash.com/photo-1676186674259-cd247f1f723e');
            background-size: cover;
            background-position: center;
            filter: blur(8px);
        }

        /* Animation for elements */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeInUp {
            animation: fadeInUp 0.6s ease-out forwards;
        }
    </style>
@endpush
