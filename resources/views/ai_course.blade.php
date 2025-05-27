@extends('layouts.master')

@section('content')

    <section class="pb-0">
        <div class="relative max-w-full mx-auto ">
            <div class="relative py-10 px-8 overflow-hidden lg:px-16 takeover-panel-topic">
                <div class="absolute inset-0  mix-blend-multiply">
                        <img src="/images/topic_page/topic_ai.webp" alt="banner"
                             class="w-full h-full object-cover" />
                </div>
                <div class="relative lg:top-1/4 md:top-2/3">
                    <slot>
                        <h2 class="text-center text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl">
                                <span class="block text-white">Artificial Intelligence</span>
                        </h2>
                        <p class="flex flex-col md:flex-row items-center md:justify-center mx-auto space-y-5 md:space-y-0 mt-6 max-w-lg md:space-x-10 mx-auto text-center text-base text-indigo-200 sm:max-w-3xl">
                            <a href="/camps?loc=AI%20Online%20Camp#campsForm"  class="shadow-2xl space-x-4 inline-flex items-center px-16 py-2 border border-white bg-[#4698a7]  hover:text-white hover:bg-[#0cc0df] rounded-full text-white focus:outline-none">
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
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-6 text-[#4698a7]">Explore the World of Artificial Intelligence</h2>
            <p class="text-sm text-gray-600 text-center">Our comprehensive program introduces students to the fascinating world of AI, machine learning, and data science through interactive lessons and hands-on projects.</p>
        </div>

        <!-- Tab Navigation with Morphing Slider -->
        <div class="flex justify-center mb-12">
            <div class="relative inline-flex bg-gray-200 rounded-full p-1">
                <!-- Morphing slider background -->
                <div id="ai-slider"
                    class="absolute top-0 left-0 h-full rounded-full shadow-lg transition-all duration-300 ease-in-out"
                    style="width: 0; transform: translateX(0); z-index: 0; background-color: #4698a7;">
                </div>

                <button id="tab-beginners" class="ai-tab-button relative z-10 px-8 py-3 text-sm font-medium rounded-full flex items-center space-x-2 transition-colors duration-200 text-black font-semibold">
                    <span>AI 101 (Ages 8+)</span>

                </button>
                <button id="tab-advanced" class="ai-tab-button relative z-10 px-8 py-3 text-sm font-medium rounded-full flex items-center space-x-2 transition-colors duration-200 text-gray-700">
                    <span>AI - Advanced (Ages 12+)</span>

                </button>
            </div>
        </div>

        <!-- Tab Content -->


        <div id="beginners-content" class="tab-content transition-all duration-500 ease-in-out">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white rounded-3xl shadow-lg transform transition-all duration-300 hover:-translate-y-2 hover:shadow-xl border-t-4 border-[#4698a7] flex flex-col h-full">
                    <div class="p-6 flex flex-col flex-1">
                        <div class="w-14 h-14 mb-4 bg-[#4698a7]/10 rounded-xl flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-[#4698a7]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                            </svg>
                        </div>
                        <h3 class="text-base font-bold mb-3 text-[#4698a7]">Artificial Intelligence</h3>
                        <p class="text-sm text-gray-600 flex-1">LLM/Generative AI tools and understanding AI concepts</p>
                    </div>
                    <div class="h-2 bg-gradient-to-r from-blue-500 to-purple-600 rounded-b-3xl"></div>
                </div>

                <div class="bg-white rounded-3xl shadow-lg transform transition-all duration-300 hover:-translate-y-2 hover:shadow-xl border-t-4 border-[#4698a7] flex flex-col h-full">
                    <div class="p-6 flex flex-col flex-1">
                        <div class="w-14 h-14 mb-4 bg-[#4698a7]/10 rounded-xl flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-[#4698a7]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <h3 class="text-base font-bold mb-3 text-[#4698a7]">Effective AI Use</h3>
                        <p class="text-sm text-gray-600 flex-1">Prompt Engineering and AI interaction techniques</p>
                    </div>
                    <div class="h-2 bg-gradient-to-r from-green-500 to-teal-600 rounded-b-3xl"></div>
                </div>

                <div class="bg-white rounded-3xl shadow-lg transform transition-all duration-300 hover:-translate-y-2 hover:shadow-xl border-t-4 border-[#4698a7] flex flex-col h-full">
                    <div class="p-6 flex flex-col flex-1">
                        <div class="w-14 h-14 mb-4 bg-[#4698a7]/10 rounded-xl flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-[#4698a7]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                            </svg>
                        </div>
                        <h3 class="text-base font-bold mb-3 text-[#4698a7]">Design Applications</h3>
                        <p class="text-sm text-gray-600 flex-1">Image and voice analysis using AI technology</p>
                    </div>
                    <div class="h-2 bg-gradient-to-r from-orange-500 to-red-600 rounded-b-3xl"></div>
                </div>

                <div class="bg-white rounded-3xl shadow-lg transform transition-all duration-300 hover:-translate-y-2 hover:shadow-xl border-t-4 border-[#4698a7] flex flex-col h-full">
                    <div class="p-6 flex flex-col flex-1">
                        <div class="w-14 h-14 mb-4 bg-[#4698a7]/10 rounded-xl flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-[#4698a7]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4" />
                            </svg>
                        </div>
                        <h3 class="text-base font-bold mb-3 text-[#4698a7]">Scratch Programming</h3>
                        <p class="text-sm text-gray-600 flex-1">MIT visual programming language for creative projects</p>
                    </div>
                    <div class="h-2 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-b-3xl"></div>
                </div>
            </div>
        </div>

        <div id="advanced-content" class="tab-content hidden transition-all duration-500 ease-in-out">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-3xl shadow-lg transform transition-all duration-300 hover:-translate-y-2 hover:shadow-xl border-t-4 border-[#4698a7] flex flex-col h-full">
                    <div class="p-8 flex flex-col flex-1">
                        <div class="w-16 h-16 mb-6 bg-[#4698a7]/10 rounded-xl flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#4698a7]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold mb-3 text-[#4698a7]">AI & Machine Learning</h3>
                        <p class="text-sm text-gray-600 flex-1">Understand AI models, training data, neural networks, and their real-world applications.</p>
                    </div>
                    <div class="h-2 bg-gradient-to-r from-[#4698a7] to-[#0cc0df] rounded-b-3xl"></div>
                </div>

                <div class="bg-white rounded-3xl shadow-lg transform transition-all duration-300 hover:-translate-y-2 hover:shadow-xl border-t-4 border-[#4698a7] flex flex-col h-full">
                    <div class="p-8 flex flex-col flex-1">
                        <div class="w-16 h-16 mb-6 bg-[#4698a7]/10 rounded-xl flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#4698a7]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold mb-3 text-[#4698a7]">Data Science</h3>
                        <p class="text-sm text-gray-600 flex-1">Master data analysis essentials using Pandas, Numpy, and visualization tools like Matplotlib.</p>
                    </div>
                    <div class="h-2 bg-gradient-to-r from-[#4698a7] to-[#0cc0df] rounded-b-3xl"></div>
                </div>

                <div class="bg-white rounded-3xl shadow-lg transform transition-all duration-300 hover:-translate-y-2 hover:shadow-xl border-t-4 border-[#4698a7] flex flex-col h-full">
                    <div class="p-8 flex flex-col flex-1">
                        <div class="w-16 h-16 mb-6 bg-[#4698a7]/10 rounded-xl flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#4698a7]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold mb-3 text-[#4698a7]">Python Programming</h3>
                        <p class="text-sm text-gray-600 flex-1">Learn Python from scratch, including syntax, data structures, algorithms, and advanced programming techniques.</p>
                    </div>
                    <div class="h-2 bg-gradient-to-r from-[#4698a7] to-[#0cc0df] rounded-b-3xl"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- What You'll Learn Section -->
<div id="curriculum" class="py-10 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl md:text-4xl font-bold text-center mb-8 text-[#4698a7]">What You'll Learn</h2>

        <div id="beginners-learn" class="tab-learn-content">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-3 max-w-5xl mx-auto">
                <div>
                    <h3 class="text-base font-bold text-gray-800 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#4698a7] mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="text-[#4698a7]">Introduction to AI</div>
                    </h3>
                    <p class="text-sm text-gray-600 ml-6">Understanding what Artificial Intelligence is and how it differs from human intelligence.</p>
                </div>

                <div>
                    <h3 class="text-base font-bold text-gray-800 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#4698a7] mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="text-[#4698a7]">Scratch Lessons</div>
                    </h3>
                    <p class="text-sm text-gray-600 ml-6">Learn syntax, loops, conditions, functions, and visual interface design.</p>
                </div>

                <div>
                    <h3 class="text-base font-bold text-gray-800 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#4698a7] mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="text-[#4698a7]">Image Detection with AI</div>
                    </h3>
                    <p class="text-sm text-gray-600 ml-6">Understand AI models, training data, and applications.</p>
                </div>

                <div>
                    <h3 class="text-base font-bold text-gray-800 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#4698a7] mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="text-[#4698a7]">Sound Analysis with AI</div>
                    </h3>
                    <p class="text-sm text-gray-600 ml-6">Interpreting and understanding audio signals through AI and ML techniques.</p>
                </div>

                <div>
                    <h3 class="text-base font-bold text-gray-800 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#4698a7] mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="text-[#4698a7]">Training AI Models</div>
                    </h3>
                    <p class="text-sm text-gray-600 ml-6">Training AI models to recognize patterns and make decisions using large datasets.</p>
                </div>

                <div>
                    <h3 class="text-base font-bold text-gray-800 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#4698a7] mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="text-[#4698a7]">Capstone Project and Showcase</div>
                    </h3>
                    <p class="text-sm text-gray-600 ml-6">Combining multiple AI features and modules to design a real-life project.</p>
                </div>
            </div>

        </div>

        <div id="advanced-learn" class="tab-learn-content hidden">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-3 max-w-5xl mx-auto">
                <div>
                    <h3 class="text-base font-bold text-gray-800 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#4698a7] mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="text-[#4698a7]">Beginner-Friendly Python Lessons</div>
                    </h3>
                    <p class="text-sm text-gray-600 ml-6">Learn syntax, data structures, and algorithms.</p>
                </div>

                <div>
                    <h3 class="text-base font-bold text-gray-800 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#4698a7] mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="text-[#4698a7]">Advanced Programming</div>
                    </h3>
                    <p class="text-sm text-gray-600 ml-6">String manipulation, lists, functions, loops.</p>
                </div>

                <div>
                    <h3 class="text-base font-bold text-gray-800 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#4698a7] mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="text-[#4698a7]">AI & Machine Learning Basics</div>
                    </h3>
                    <p class="text-sm text-gray-600 ml-6">Understand AI models, training data, and applications.</p>
                </div>

                <div>
                    <h3 class="text-base font-bold text-gray-800 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#4698a7] mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="text-[#4698a7]">Data Science Essentials</div>
                    </h3>
                    <p class="text-sm text-gray-600 ml-6">Pandas, Numpy, DataFrames, and Lambda Functions.</p>
                </div>

                <div>
                    <h3 class="text-base font-bold text-gray-800 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#4698a7] mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="text-[#4698a7]">Data Organization</div>
                    </h3>
                    <p class="text-sm text-gray-600 ml-6">Lists, Booleans, Dictionaries, File Handling.</p>
                </div>

                <div>
                    <h3 class="text-base font-bold text-gray-800 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#4698a7] mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="text-[#4698a7]">Command Line & OS Module</div>
                    </h3>
                    <p class="text-sm text-gray-600 ml-6">Navigating files and automating tasks.</p>
                </div>

                <div>
                    <h3 class="text-base font-bold text-gray-800 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#4698a7] mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="text-[#4698a7]">Regex Magic</div>
                    </h3>
                    <p class="text-sm text-gray-600 ml-6">Extracting patterns from text like a pro.</p>
                </div>

                <div>
                    <h3 class="text-base font-bold text-gray-800 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#4698a7] mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="text-[#4698a7]">Statistical Insights</div>
                    </h3>
                    <p class="text-sm text-gray-600 ml-6">Grouping, Pivot Tables & Handling Missing Data.</p>
                </div>

                <div>
                    <h3 class="text-base font-bold text-gray-800 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#4698a7] mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="text-[#4698a7]">Data Visualization</div>
                    </h3>
                    <p class="text-sm text-gray-600 ml-6">Matplotlib for stunning bar charts, line graphs & more.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Who Can Join Section -->
<div class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 mb-10 md:mb-0 md:pr-16">
                <img src="/images/ai_course/students_collaborating.jpg" alt="Students collaborating" class="rounded-xl shadow-xl">
            </div>
            <div class="md:w-1/2">
                <div id="beginners-join" class="tab-join-content">
                    <h3 class="text-2xl font-bold mb-6 text-[#4698a7]">Who Can Join?</h2>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#4698a7] mr-2 mt-1 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="text-sm text-gray-600">Middle & high school students (or beginners) eager to explore AI, Data Science, and Python!</span>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#4698a7] mr-2 mt-1 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="text-sm text-gray-600">No prior coding experience is required, making it a great starting point for students interested in technology and innovation.</span>
                        </li>
                    </ul>

                    <div class="mt-12">
                        <h3 class="text-2xl font-bold mb-6 text-[#4698a7]">Why Join?</h3>
                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#4698a7] mr-2 mt-1 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="text-sm text-gray-600">Hands-On Projects – Build chatbots, image recognition models, and more.</span>
                            </li>
                            <li class="flex items-start">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#4698a7] mr-2 mt-1 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="text-sm text-gray-600">Collaborative Learning – Work on team-based challenges and problem-solving activities.</span>
                            </li>
                            <li class="flex items-start">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#4698a7] mr-2 mt-1 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="text-sm text-gray-600">Real-world applications with expert instructors.</span>
                            </li>
                            <li class="flex items-start">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#4698a7] mr-2 mt-1 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="text-sm text-gray-600">Future Skills Development – Gain valuable coding and AI knowledge for future careers.</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div id="advanced-join" class="tab-join-content hidden">
                    <h3 class="text-2xl font-bold mb-6 text-[#4698a7]">Who Can Join?</h2>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#4698a7] mr-2 mt-1 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="text-sm text-gray-600">This course is designed for Elementary and Middle school students (or beginners, ages 7+) eager to AI and its application!</span>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#4698a7] mr-2 mt-1 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="text-sm text-gray-600">No prior coding experience is required, making it a great starting point for students interested in technology and innovation.</span>
                        </li>
                    </ul>

                    <div class="mt-12">
                        <h3 class="text-2xl font-bold mb-6 text-[#4698a7]">Why Join?</h3>
                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#4698a7] mr-2 mt-1 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="text-sm text-gray-600">Hands-On Projects – Build real-world applications like chatbots, image recognition models, and more with expert instructors.</span>
                            </li>
                            <li class="flex items-start">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#4698a7] mr-2 mt-1 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="text-sm text-gray-600">Collaborative Learning – Work on team-based challenges and problem-solving activities.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Camp Schedule Section -->
<div class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-6 text-[#4698a7] mb-0 pb-0"><span id="content-title">Course Content</span></h2>
            <div class="text-sm text-gray-600 text-center"><span id="content-subtitle">Monday to Thursday (3 hours/day) for 2 weeks</span></div>
        </div>
        <div class="flex justify-between items-center max-w-4xl mx-auto mb-8">
            <p class="text-sm text-gray-600"><span id="content-duration">8 days, 24+ hours live instructions</span></p>
            <button id="expand-all-btn" class="px-4 py-2 bg-[#4698a7] text-white rounded-lg hover:bg-[#0cc0df] transition-colors duration-200 text-sm font-medium">
                Expand All
            </button>
        </div>

        <div id="beginners-schedule" class="tab-schedule-content max-w-4xl mx-auto space-y-6">
            <!-- Day 1 Section -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-1 section-item">
                <div class="px-8 py-6">
                    <div class="flex items-center justify-between mb-4 cursor-pointer section-header" data-section="1">
                        <div class="flex items-center space-x-3">
                            <div class="flex flex-col">
                                <h3 class="text-lg font-bold text-gray-800 mb-1">1: Introduction to Python</h3>
                                <p class="text-sm text-gray-600">Getting started with Python basics</p>
                            </div>
                        </div>
                        <div class="section-toggle">
                            <svg class="w-6 h-6 text-[#4698a7] transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="section-content max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
                        <ul class="space-y-4 px-8 pb-6 pt-2 bg-gray-50/50 rounded-lg">
                    @foreach([
                                'Overview of Python & real-world applications',
                                'Writing basic scripts: Input/Output',
                                'Understanding Data Types',
                                'String manipulation techniques'
                            ] as $item)
                            <li class="flex items-start group">
                                <div class="w-5 h-5 bg-[#4698a7]/20 rounded-full flex items-center justify-center mr-3 mt-0.5 group-hover:bg-[#4698a7]/30 transition-colors duration-200">
                                    <svg class="h-3 w-3 text-[#4698a7]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <span class="text-sm text-gray-700 leading-relaxed">{{ $item }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Day 2 Section -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-1 section-item">
                <div class="px-8 py-6">
                    <div class="flex items-center justify-between mb-4 cursor-pointer section-header" data-section="2">
                        <div class="flex items-center space-x-3">
                            <div class="flex flex-col">
                                <h3 class="text-lg font-bold text-gray-800 mb-1">2: Core Python Concepts</h3>
                                <p class="text-sm text-gray-600">Lists, functions and control statements</p>
                            </div>
                        </div>
                        <div class="section-toggle">
                            <svg class="w-6 h-6 text-[#4698a7] transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="section-content max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
                        <ul class="space-y-4 px-8 pb-6 pt-2 bg-gray-50/50 rounded-lg">
                            @foreach([
                                'Lists: indexing, slicing, and list operations',
                                'Writing functions and using return values',
                                'If/Else statements, Boolean logic & comparisons',
                                'Introduction to loops (for/while) for automation',
                                'Organizing data with Dictionaries'
                            ] as $item)
                            <li class="flex items-start group">
                                <div class="w-5 h-5 bg-[#4698a7]/20 rounded-full flex items-center justify-center mr-3 mt-0.5 group-hover:bg-[#4698a7]/30 transition-colors duration-200">
                                    <svg class="h-3 w-3 text-[#4698a7]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <span class="text-sm text-gray-700 leading-relaxed">{{ $item }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <!-- 3 Section -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-1 section-item">
                <div class="px-8 py-6">
                    <div class="flex items-center justify-between mb-4 cursor-pointer section-header" data-section="3">
                        <div class="flex items-center space-x-3">
                            <div class="flex flex-col">
                                <h3 class="text-lg font-bold text-gray-800 mb-1">3: File Handling in Python</h3>
                                <p class="text-sm text-gray-600">Working with files and automation</p>
                            </div>
                        </div>
                        <div class="section-toggle">
                            <svg class="w-6 h-6 text-[#4698a7] transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="section-content max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
                        <ul class="space-y-4 px-8 pb-6 pt-2 bg-gray-50/50 rounded-lg">
                            @foreach([
                                'Reading and writing files in Python',
                                'Understanding and avoiding infinite loops',
                                'Navigating files using the OS module',
                                'Python scripts from the command line'
                            ] as $item)
                            <li class="flex items-start group">
                                <div class="w-5 h-5 bg-[#4698a7]/20 rounded-full flex items-center justify-center mr-3 mt-0.5 group-hover:bg-[#4698a7]/30 transition-colors duration-200">
                                    <svg class="h-3 w-3 text-[#4698a7]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <span class="text-sm text-gray-700 leading-relaxed">{{ $item }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <!-- 4 Section -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-1 section-item">
                <div class="px-8 py-6">
                    <div class="flex items-center justify-between mb-4 cursor-pointer section-header" data-section="4">
                        <div class="flex items-center space-x-3">
                            <div class="flex flex-col">
                                <h3 class="text-lg font-bold text-gray-800 mb-1">4: AI Fundamentals</h3>
                                <p class="text-sm text-gray-600">Introduction to artificial intelligence concepts</p>
                            </div>
                        </div>
                        <div class="section-toggle">
                            <svg class="w-6 h-6 text-[#4698a7] transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="section-content max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
                        <ul class="space-y-4 px-8 pb-6 pt-2 bg-gray-50/50 rounded-lg">
                            @foreach([
                                'Introduction to AI, machine learning, and real-world applications',
                                'Understanding how data is used to train AI models',
                                'Ethics & bias in AI and responsible data science practices'
                            ] as $item)
                            <li class="flex items-start group">
                                <div class="w-5 h-5 bg-[#4698a7]/20 rounded-full flex items-center justify-center mr-3 mt-0.5 group-hover:bg-[#4698a7]/30 transition-colors duration-200">
                                    <svg class="h-3 w-3 text-[#4698a7]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <span class="text-sm text-gray-700 leading-relaxed">{{ $item }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <!-- 5 Section -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-1 section-item">
                <div class="px-8 py-6">
                    <div class="flex items-center justify-between mb-4 cursor-pointer section-header" data-section="5">
                        <div class="flex items-center space-x-3">
                            <div class="flex flex-col">
                                <h3 class="text-lg font-bold text-gray-800 mb-1">5: Introduction to Data Analysis</h3>
                                <p class="text-sm text-gray-600">Working with Pandas and datasets</p>
                            </div>
                        </div>
                        <div class="section-toggle">
                            <svg class="w-6 h-6 text-[#4698a7] transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="section-content max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
                        <ul class="space-y-4 px-8 pb-6 pt-2 bg-gray-50/50 rounded-lg">
                    @foreach([
                                'Exploring datasets with Pandas',
                                'Basic Numpy operations',
                                'Using Pandas to read CSV files and perform basic data cleaning',
                                'Understanding data joins: left, right, inner, outer merges'
                            ] as $item)
                            <li class="flex items-start group">
                                <div class="w-5 h-5 bg-[#4698a7]/20 rounded-full flex items-center justify-center mr-3 mt-0.5 group-hover:bg-[#4698a7]/30 transition-colors duration-200">
                                    <svg class="h-3 w-3 text-[#4698a7]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <span class="text-sm text-gray-700 leading-relaxed">{{ $item }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <!-- 6 Section -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-1 section-item">
                <div class="px-8 py-6">
                    <div class="flex items-center justify-between mb-4 cursor-pointer section-header" data-section="6">
                        <div class="flex items-center space-x-3">
                            <div class="flex flex-col">
                                <h3 class="text-lg font-bold text-gray-800 mb-1">6: Advanced Data Analysis</h3>
                                <p class="text-sm text-gray-600">Data cleaning and manipulation techniques</p>
                            </div>
                        </div>
                        <div class="section-toggle">
                            <svg class="w-6 h-6 text-[#4698a7] transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="section-content max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
                        <ul class="space-y-4 px-8 pb-6 pt-2 bg-gray-50/50 rounded-lg">
                            @foreach([
                                'Cleaning messy datasets for analysis with Pandas',
                                'Filtering, sorting, and modifying DataFrames',
                                'Identifying and handling duplicate or inconsistent data',
                                'Using lambda functions for efficient operations',
                                'Handling missing data'
                            ] as $item)
                            <li class="flex items-start group">
                                <div class="w-5 h-5 bg-[#4698a7]/20 rounded-full flex items-center justify-center mr-3 mt-0.5 group-hover:bg-[#4698a7]/30 transition-colors duration-200">
                                    <svg class="h-3 w-3 text-[#4698a7]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <span class="text-sm text-gray-700 leading-relaxed">{{ $item }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <!-- 7 Section -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-1 section-item">
                <div class="px-8 py-6">
                    <div class="flex items-center justify-between mb-4 cursor-pointer section-header" data-section="7">
                        <div class="flex items-center space-x-3">
                            <div class="flex flex-col">
                                <h3 class="text-lg font-bold text-gray-800 mb-1">7: Data Visualization</h3>
                                <p class="text-sm text-gray-600">Creating charts and visualizing insights</p>
                            </div>
                        </div>
                        <div class="section-toggle">
                            <svg class="w-6 h-6 text-[#4698a7] transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="section-content max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
                        <ul class="space-y-4 px-8 pb-6 pt-2 bg-gray-50/50 rounded-lg">
                            <li class="flex items-start group">
                                <div class="w-5 h-5 bg-[#4698a7]/20 rounded-full flex items-center justify-center mr-3 mt-0.5 group-hover:bg-[#4698a7]/30 transition-colors duration-200">
                                    <svg class="h-3 w-3 text-[#4698a7]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <span class="text-sm text-gray-700 leading-relaxed">Grouping columns, aggregating data & using Pivot Tables</span>
                            </li>
                            <li class="flex items-start group">
                                <div class="w-5 h-5 bg-[#4698a7]/20 rounded-full flex items-center justify-center mr-3 mt-0.5 group-hover:bg-[#4698a7]/30 transition-colors duration-200">
                                    <svg class="h-3 w-3 text-[#4698a7]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <span class="text-sm text-gray-700 leading-relaxed">Creating bar charts, line graphs, and pie charts with Matplotlib</span>
                            </li>
                            <li class="flex items-start group">
                                <div class="w-5 h-5 bg-[#4698a7]/20 rounded-full flex items-center justify-center mr-3 mt-0.5 group-hover:bg-[#4698a7]/30 transition-colors duration-200">
                                    <svg class="h-3 w-3 text-[#4698a7]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <span class="text-sm text-gray-700 leading-relaxed">Customizing and interpreting visualizations for data insights</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- 8 Section -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-1 section-item">
                <div class="px-8 py-6">
                    <div class="flex items-center justify-between mb-4 cursor-pointer section-header" data-section="8">
                        <div class="flex items-center space-x-3">
                            <div class="flex flex-col">
                                <h3 class="text-lg font-bold text-gray-800 mb-1">8: Final Project</h3>
                                <p class="text-sm text-gray-600">Applying skills to create a complete project</p>
                            </div>
                        </div>
                        <div class="section-toggle">
                            <svg class="w-6 h-6 text-[#4698a7] transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="section-content max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
                        <ul class="space-y-4 px-8 pb-6 pt-2 bg-gray-50/50 rounded-lg">
                            <li class="flex items-start group">
                                <div class="w-5 h-5 bg-[#4698a7]/20 rounded-full flex items-center justify-center mr-3 mt-0.5 group-hover:bg-[#4698a7]/30 transition-colors duration-200">
                                    <svg class="h-3 w-3 text-[#4698a7]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <span class="text-sm text-gray-700 leading-relaxed">Applying Python skills to analyze a real-world dataset</span>
                            </li>
                            <li class="flex items-start group">
                                <div class="w-5 h-5 bg-[#4698a7]/20 rounded-full flex items-center justify-center mr-3 mt-0.5 group-hover:bg-[#4698a7]/30 transition-colors duration-200">
                                    <svg class="h-3 w-3 text-[#4698a7]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <span class="text-sm text-gray-700 leading-relaxed">Creating visualizations to present key insights</span>
                            </li>
                            <li class="flex items-start group">
                                <div class="w-5 h-5 bg-[#4698a7]/20 rounded-full flex items-center justify-center mr-3 mt-0.5 group-hover:bg-[#4698a7]/30 transition-colors duration-200">
                                    <svg class="h-3 w-3 text-[#4698a7]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <span class="text-sm text-gray-700 leading-relaxed">Writing a summary report or presenting findings to the class</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>



        </div>

        <div id="advanced-schedule" class="tab-schedule-content hidden max-w-4xl mx-auto space-y-6">
            <!-- 1 Section -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-1 section-item">
                <div class="px-8 py-6">
                    <div class="flex items-center justify-between mb-4 cursor-pointer section-header" data-section="adv-1">
                        <div class="flex items-center space-x-3">
                            <div class="flex flex-col">
                                <h3 class="text-lg font-bold text-gray-800 mb-1">1: Introduction to AI</h3>
                                <p class="text-sm text-gray-600">AI Concept: Understanding what Artificial Intelligence is and how it differs from human intelligence.</p>
                            </div>
                        </div>
                        <div class="section-toggle">
                            <svg class="w-6 h-6 text-[#4698a7] transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="section-content max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
                        <ul class="space-y-4 px-8 pb-6 pt-2 bg-gray-50/50 rounded-lg">
                            <li class="flex items-start group">
                                <div class="w-5 h-5 bg-[#4698a7]/20 rounded-full flex items-center justify-center mr-3 mt-0.5 group-hover:bg-[#4698a7]/30 transition-colors duration-200">
                                    <svg class="h-3 w-3 text-[#4698a7]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <span class="text-sm text-gray-700 leading-relaxed">Task: Use AI tools to explain what it does and how it can help you.</span>
                            </li>
                            <li class="flex items-start group">
                                <div class="w-5 h-5 bg-[#4698a7]/20 rounded-full flex items-center justify-center mr-3 mt-0.5 group-hover:bg-[#4698a7]/30 transition-colors duration-200">
                                    <svg class="h-3 w-3 text-[#4698a7]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <span class="text-sm text-gray-700 leading-relaxed">Example Project: "Meet My AI" – Create an animated character that introduces itself and explains what AI means using text-to-speech.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- 2 Section -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-1 section-item">
                <div class="px-8 py-6">
                    <div class="flex items-center justify-between mb-4 cursor-pointer section-header" data-section="adv-2">
                        <div class="flex items-center space-x-3">
                            <div class="flex flex-col">
                                <h3 class="text-lg font-bold text-gray-800 mb-1">2: Face Detection with Computer Vision</h3>
                                <p class="text-sm text-gray-600">AI Concept: Computer vision fundamentals and face detection using pre-trained models.</p>
                            </div>
                        </div>
                        <div class="section-toggle">
                            <svg class="w-6 h-6 text-[#4698a7] transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="section-content max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
                        <ul class="space-y-4 px-8 pb-6 pt-2 bg-gray-50/50 rounded-lg">
                            <li class="flex items-start group">
                                <div class="w-5 h-5 bg-[#4698a7]/20 rounded-full flex items-center justify-center mr-3 mt-0.5 group-hover:bg-[#4698a7]/30 transition-colors duration-200">
                                    <svg class="h-3 w-3 text-[#4698a7]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <span class="text-sm text-gray-700 leading-relaxed">Task: Use AI tools to identify the faces of uploaded famous people.</span>
                            </li>
                            <li class="flex items-start group">
                                <div class="w-5 h-5 bg-[#4698a7]/20 rounded-full flex items-center justify-center mr-3 mt-0.5 group-hover:bg-[#4698a7]/30 transition-colors duration-200">
                                    <svg class="h-3 w-3 text-[#4698a7]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <span class="text-sm text-gray-700 leading-relaxed">Example Project: "Smile Detector" – Program a sprite to respond (such as speaking or moving) when a face is detected through the webcam.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- 3 Section -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-1 section-item">
                <div class="px-8 py-6">
                    <div class="flex items-center justify-between mb-4 cursor-pointer section-header" data-section="adv-3">
                        <div class="flex items-center space-x-3">
                            <div class="flex flex-col">
                                <h3 class="text-lg font-bold text-gray-800 mb-1">3: Facial Emotion Recognition</h3>
                                <p class="text-sm text-gray-600">AI Concept: Emotion recognition using facial landmarks and image data.</p>
                            </div>
                        </div>
                        <div class="section-toggle">
                            <svg class="w-6 h-6 text-[#4698a7] transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="section-content max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
                        <ul class="space-y-4 px-8 pb-6 pt-2 bg-gray-50/50 rounded-lg">
                            <li class="flex items-start group">
                                <div class="w-5 h-5 bg-[#4698a7]/20 rounded-full flex items-center justify-center mr-3 mt-0.5 group-hover:bg-[#4698a7]/30 transition-colors duration-200">
                                    <svg class="h-3 w-3 text-[#4698a7]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <span class="text-sm text-gray-700 leading-relaxed">Task: Use AI tools to detect the emotion of an uploaded image of your face.</span>
                            </li>
                            <li class="flex items-start group">
                                <div class="w-5 h-5 bg-[#4698a7]/20 rounded-full flex items-center justify-center mr-3 mt-0.5 group-hover:bg-[#4698a7]/30 transition-colors duration-200">
                                    <svg class="h-3 w-3 text-[#4698a7]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <span class="text-sm text-gray-700 leading-relaxed">Example Project: "Mood Mirror" – Create an interactive mirror that changes the background or sprite behavior based on detected facial emotion.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- 4 Section -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-1 section-item">
                <div class="px-8 py-6">
                    <div class="flex items-center justify-between mb-4 cursor-pointer section-header" data-section="adv-4">
                        <div class="flex items-center space-x-3">
                            <div class="flex flex-col">
                                <h3 class="text-lg font-bold text-gray-800 mb-1">4: Hand Gesture Recognition</h3>
                                <p class="text-sm text-gray-600">AI Concept: Gesture detection using hand landmark tracking.</p>
                            </div>
                        </div>
                        <div class="section-toggle">
                            <svg class="w-6 h-6 text-[#4698a7] transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="section-content max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
                        <ul class="space-y-4 px-8 pb-6 pt-2 bg-gray-50/50 rounded-lg">
                            <li class="flex items-start group">
                                <div class="w-5 h-5 bg-[#4698a7]/20 rounded-full flex items-center justify-center mr-3 mt-0.5 group-hover:bg-[#4698a7]/30 transition-colors duration-200">
                                    <svg class="h-3 w-3 text-[#4698a7]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <span class="text-sm text-gray-700 leading-relaxed">Task: Use AI tools to classify a picture using sign language and determine what letter is being communicated.</span>
                            </li>
                            <li class="flex items-start group">
                                <div class="w-5 h-5 bg-[#4698a7]/20 rounded-full flex items-center justify-center mr-3 mt-0.5 group-hover:bg-[#4698a7]/30 transition-colors duration-200">
                                    <svg class="h-3 w-3 text-[#4698a7]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <span class="text-sm text-gray-700 leading-relaxed">Example Project: "Gesture Game Controller" – Use hand gestures to control sprite movements such as jumping, moving forward, or performing an action.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- 5 Section -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-1 section-item">
                <div class="px-8 py-6">
                    <div class="flex items-center justify-between mb-4 cursor-pointer section-header" data-section="adv-5">
                        <div class="flex items-center space-x-3">
                            <div class="flex flex-col">
                                <h3 class="text-lg font-bold text-gray-800 mb-1">5: Pose Detection</h3>
                                <p class="text-sm text-gray-600">AI Concept: Pose estimation using skeletal point tracking.</p>
                            </div>
                        </div>
                        <div class="section-toggle">
                            <svg class="w-6 h-6 text-[#4698a7] transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="section-content max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
                        <ul class="space-y-4 px-8 pb-6 pt-2 bg-gray-50/50 rounded-lg">
                            <li class="flex items-start group">
                                <div class="w-5 h-5 bg-[#4698a7]/20 rounded-full flex items-center justify-center mr-3 mt-0.5 group-hover:bg-[#4698a7]/30 transition-colors duration-200">
                                    <svg class="h-3 w-3 text-[#4698a7]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <span class="text-sm text-gray-700 leading-relaxed">Task: Use AI tools to determine what type of dance is happening in the GIF.</span>
                            </li>
                            <li class="flex items-start group">
                                <div class="w-5 h-5 bg-[#4698a7]/20 rounded-full flex items-center justify-center mr-3 mt-0.5 group-hover:bg-[#4698a7]/30 transition-colors duration-200">
                                    <svg class="h-3 w-3 text-[#4698a7]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <span class="text-sm text-gray-700 leading-relaxed">Example Project: "Pose Dance Party" – Program a sprite to react to student poses or mimic movements to simulate dancing or exercise.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- 6 Section -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-1 section-item">
                <div class="px-8 py-6">
                    <div class="flex items-center justify-between mb-4 cursor-pointer section-header" data-section="adv-6">
                        <div class="flex items-center space-x-3">
                            <div class="flex flex-col">
                                <h3 class="text-lg font-bold text-gray-800 mb-1">6: Voice Command Recognition</h3>
                                <p class="text-sm text-gray-600">AI Concept: Speech recognition and Natural Language Processing basics.</p>
                            </div>
                        </div>
                        <div class="section-toggle">
                            <svg class="w-6 h-6 text-[#4698a7] transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="section-content max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
                        <ul class="space-y-4 px-8 pb-6 pt-2 bg-gray-50/50 rounded-lg">
                            <li class="flex items-start group">
                                <div class="w-5 h-5 bg-[#4698a7]/20 rounded-full flex items-center justify-center mr-3 mt-0.5 group-hover:bg-[#4698a7]/30 transition-colors duration-200">
                                    <svg class="h-3 w-3 text-[#4698a7]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <span class="text-sm text-gray-700 leading-relaxed">Example Project: "Voice-Controlled Robot" – Use voice commands to control a virtual robot with actions like move, stop, or turn.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- 7 Section -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-1 section-item">
                <div class="px-8 py-6">
                    <div class="flex items-center justify-between mb-4 cursor-pointer section-header" data-section="adv-7">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-[#4698a7]/10 rounded-full flex items-center justify-center">
                                <span class="text-xs font-bold text-[#4698a7]">7</span>
                            </div>
                            <div class="flex flex-col">
                                <h3 class="text-lg font-bold text-gray-800 mb-1">7: Text Sentiment Analysis</h3>
                                <p class="text-sm text-gray-600">AI Concept: Sentiment detection and simple natural language classification.</p>
                            </div>
                        </div>
                        <div class="section-toggle">
                            <svg class="w-6 h-6 text-[#4698a7] transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="section-content max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
                        <ul class="space-y-4 px-8 pb-6 pt-2 bg-gray-50/50 rounded-lg">
                            <li class="flex items-start group">
                                <div class="w-5 h-5 bg-[#4698a7]/20 rounded-full flex items-center justify-center mr-3 mt-0.5 group-hover:bg-[#4698a7]/30 transition-colors duration-200">
                                    <svg class="h-3 w-3 text-[#4698a7]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <span class="text-sm text-gray-700 leading-relaxed">Task: Use AI tools to detect the tone of famous speeches from history.</span>
                            </li>
                            <li class="flex items-start group">
                                <div class="w-5 h-5 bg-[#4698a7]/20 rounded-full flex items-center justify-center mr-3 mt-0.5 group-hover:bg-[#4698a7]/30 transition-colors duration-200">
                                    <svg class="h-3 w-3 text-[#4698a7]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <span class="text-sm text-gray-700 leading-relaxed">Example Project: "Emotion Reader Bot" – Allow users to input sentences and have a sprite react based on detected sentiment (positive, negative, neutral).</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- 8 Section -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-1 section-item">
                <div class="px-8 py-6">
                    <div class="flex items-center justify-between mb-4 cursor-pointer section-header" data-section="adv-8">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-[#4698a7]/10 rounded-full flex items-center justify-center">
                                <span class="text-xs font-bold text-[#4698a7]">8</span>
                            </div>
                            <div class="flex flex-col">
                                <h3 class="text-lg font-bold text-gray-800 mb-1">8: Teachable Machine – Custom Image Classifier</h3>
                                <p class="text-sm text-gray-600">AI Concept: Supervised learning and creating a custom image classification mode.</p>
                            </div>
                        </div>
                        <div class="section-toggle">
                            <svg class="w-6 h-6 text-[#4698a7] transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="section-content max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
                        <ul class="space-y-4 px-8 pb-6 pt-2 bg-gray-50/50 rounded-lg">
                            <li class="flex items-start group">
                                <div class="w-5 h-5 bg-[#4698a7]/20 rounded-full flex items-center justify-center mr-3 mt-0.5 group-hover:bg-[#4698a7]/30 transition-colors duration-200">
                                    <svg class="h-3 w-3 text-[#4698a7]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <span class="text-sm text-gray-700 leading-relaxed">Task: Use AI tools to sort a folder of fruits into types of fruits.</span>
                            </li>
                            <li class="flex items-start group">
                                <div class="w-5 h-5 bg-[#4698a7]/20 rounded-full flex items-center justify-center mr-3 mt-0.5 group-hover:bg-[#4698a7]/30 transition-colors duration-200">
                                    <svg class="h-3 w-3 text-[#4698a7]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <span class="text-sm text-gray-700 leading-relaxed">Example Project: "Smart Sorter" – Train a custom image classifier to distinguish between objects (such as hand signs) and sort them accordingly.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- 9 Section -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-1 section-item">
                <div class="px-8 py-6">
                    <div class="flex items-center justify-between mb-4 cursor-pointer section-header" data-section="adv-9">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-[#4698a7]/10 rounded-full flex items-center justify-center">
                                <span class="text-xs font-bold text-[#4698a7]">9</span>
                            </div>
                            <div class="flex flex-col">
                                <h3 class="text-lg font-bold text-gray-800 mb-1">9: AI Chatbot with Speech</h3>
                                <p class="text-sm text-gray-600">AI Concept: Conversational AI and chatbot interaction.</p>
                            </div>
                        </div>
                        <div class="section-toggle">
                            <svg class="w-6 h-6 text-[#4698a7] transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="section-content max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
                        <ul class="space-y-4 px-8 pb-6 pt-2 bg-gray-50/50 rounded-lg">
                            <li class="flex items-start group">
                                <div class="w-5 h-5 bg-[#4698a7]/20 rounded-full flex items-center justify-center mr-3 mt-0.5 group-hover:bg-[#4698a7]/30 transition-colors duration-200">
                                    <svg class="h-3 w-3 text-[#4698a7]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <span class="text-sm text-gray-700 leading-relaxed">Task: Use AI tools to ask questions and get detailed responses.</span>
                            </li>
                            <li class="flex items-start group">
                                <div class="w-5 h-5 bg-[#4698a7]/20 rounded-full flex items-center justify-center mr-3 mt-0.5 group-hover:bg-[#4698a7]/30 transition-colors duration-200">
                                    <svg class="h-3 w-3 text-[#4698a7]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <span class="text-sm text-gray-700 leading-relaxed">Example Project: "AI Buddy" – Create a basic chatbot that can listen to voice input and respond to predefined questions using speech output.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- 10 Section -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-1 section-item">
                <div class="px-8 py-6">
                    <div class="flex items-center justify-between mb-4 cursor-pointer section-header" data-section="adv-10">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-[#4698a7]/10 rounded-full flex items-center justify-center">
                                <span class="text-xs font-bold text-[#4698a7]">10</span>
                            </div>
                            <div class="flex flex-col">
                                <h3 class="text-lg font-bold text-gray-800 mb-1">10: Capstone Project and Showcase</h3>
                                <p class="text-sm text-gray-600">AI Concept: Combining multiple AI features to solve a problem or create an engaging interactive experience.</p>
                            </div>
                        </div>
                        <div class="section-toggle">
                            <svg class="w-6 h-6 text-[#4698a7] transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="section-content max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
                        <ul class="space-y-4 px-8 pb-6 pt-2 bg-gray-50/50 rounded-lg">
                            <li class="flex items-start group">
                                <div class="w-5 h-5 bg-[#4698a7]/20 rounded-full flex items-center justify-center mr-3 mt-0.5 group-hover:bg-[#4698a7]/30 transition-colors duration-200">
                                    <svg class="h-3 w-3 text-[#4698a7]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <span class="text-sm text-gray-700 leading-relaxed">Task: Use AI tools to help you with your coding project.</span>
                            </li>
                            <li class="flex items-start group">
                                <div class="w-5 h-5 bg-[#4698a7]/20 rounded-full flex items-center justify-center mr-3 mt-0.5 group-hover:bg-[#4698a7]/30 transition-colors duration-200">
                                    <svg class="h-3 w-3 text-[#4698a7]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <span class="text-sm text-gray-700 leading-relaxed">Example Project: "My AI Super App" – Students develop a final project that uses at least two AI tools they have learned, such as combining face detection and voice recognition in a creative way.</span>
                            </li>
                        </ul>
                    </div>
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
                    <h3 class="text-3xl md:text-4xl font-bold text-[#4698a7] mb-4">Pricing Guide</h3>
                    <p class="text-lg text-gray-600 mb-2">Camp With LIVE Instructor</p>
                    <p class="text-sm text-gray-500">for<span style="color: #4698a7!important;"> Ages <span>12+</span></span></p>
                </div>

                <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8 text-center">

                    <div class="mt-12 space-y-4 sm:mt-16 sm:space-y-0 sm:grid sm:grid-cols-2 sm:gap-6 lg:max-w-4xl lg:mx-auto xl:max-w-none xl:mx-0 xl:grid-cols-3">

                        <div></div>
                        <!-- Coding Camp Card -->
                        <div class="bg-white rounded-3xl shadow-card">
                            <div>
                                <img class="rounded-t-3xl w-full" src="/images/topic_page/artificial-intelligence/ai.jpg" alt="coding_camp">
                            </div>
                            <div class="pt-6 pb-8 px-10">
                                <div class="text-center mb-2">
                                  <span class="inline-flex px-8 py-2 rounded-full text-sm text-white font-bold" style="background-color: #4698a7!important;">
                                    Seasonal Coding Camp
                                  </span>
                                </div>
                                <div class="text-white p-2 z-20 mx-auto max-w-sm text-base font-bold text-center" style="background-color: #4698a7!important;">
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
                                    <a href="/camps?loc=AI%20Online%20Camp#campsForm" style="color: #4698a7!important; border-color: #4698a7!important;" class="space-x-4 inline-flex items-center px-5 py-2 border border-primary shadow-primary text-base font-medium rounded-full hover:text-primary focus:outline-none">
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

<!-- Featured Student Projects -->
<!--<div class="py-16 bg-gray-800">-->
<!--    <div class="container mx-auto px-4">-->
<!--        <h2 class="text-3xl md:text-4xl font-bold text-center mb-6 text-[#4698a7]">Featured Student Projects</h2>-->
<!--        <p class="text-sm text-gray-300 text-center mb-12 max-w-2xl mx-auto">See what our students have created in previous camps</p>-->

<!--        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">-->
<!--            <div class="relative rounded-xl overflow-hidden group">-->
<!--                <img src="/images/ai_course/ai_image_recognition.png" alt="AI Image Recognition" class="w-full h-64 object-cover transform transition-all duration-500 group-hover:scale-110">-->
<!--                <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-80"></div>-->
<!--                <div class="absolute bottom-0 left-0 right-0 p-6">-->
<!--                    <h3 class="text-base font-bold text-white mb-2">AI Image Recognition</h3>-->
<!--                    <p class="text-sm text-white">Student-built application that identifies objects in photographs</p>-->
<!--                </div>-->
<!--            </div>-->

<!--            <div class="relative rounded-xl overflow-hidden group">-->
<!--                <img src="/images/ai_course/data_visualization.png" alt="Data Visualization Dashboard" class="w-full h-64 object-cover transform transition-all duration-500 group-hover:scale-110">-->
<!--                <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-80"></div>-->
<!--                <div class="absolute bottom-0 left-0 right-0 p-6">-->
<!--                    <h3 class="text-base font-bold text-white mb-2">Data Visualization</h3>-->
<!--                    <p class="text-sm text-white">Interactive dashboard analyzing climate data patterns</p>-->
<!--                </div>-->
<!--            </div>-->

<!--            <div class="relative rounded-xl overflow-hidden group">-->
<!--                <img src="/images/ai_course/predictive_analytics.png" alt="Predictive Model" class="w-full h-64 object-cover transform transition-all duration-500 group-hover:scale-110">-->
<!--                <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-80"></div>-->
<!--                <div class="absolute bottom-0 left-0 right-0 p-6">-->
<!--                    <h3 class="text-base font-bold text-white mb-2">Predictive Analytics</h3>-->
<!--                    <p class="text-sm text-white">Model predicting trends based on historical data</p>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<!-- Learning Journey Visualization -->
<!--<div class="py-16 bg-white">-->
<!--    <div class="container mx-auto px-4">-->
<!--        <h2 class="text-3xl md:text-4xl font-bold text-center mb-16 text-[#4698a7]">Your Learning Journey</h2>-->

<!--        <div class="relative">-->
            <!-- Journey Path SVG -->
<!--            <svg class="hidden md:block absolute top-0 left-1/2 transform -translate-x-1/2 z-0" width="600" height="400" viewBox="0 0 600 400">-->
<!--                <path d="M50,50 C150,25 250,375 450,350 S550,100 550,200" fill="none" stroke="#4698a7" stroke-width="4" stroke-dasharray="10,10" />-->
<!--            </svg>-->

<!--            <div class="relative z-10 md:max-w-5xl mx-auto">-->
                <!-- Journey Points -->
<!--                <div class="flex flex-col md:flex-row justify-between items-center mb-24">-->
<!--                    <div class="w-full md:w-1/3 bg-white p-6 rounded-xl shadow-lg border-t-4 border-[#4698a7] mb-12 md:mb-0 relative">-->
<!--                        <div class="absolute -top-6 left-1/2 transform -translate-x-1/2 w-12 h-12 bg-[#4698a7] rounded-full flex items-center justify-center text-white text-base font-bold">1</div>-->
<!--                        <h3 class="text-base font-bold mt-6 mb-4 text-gray-800 text-center">Learn the Fundamentals</h3>-->
<!--                        <p class="text-sm text-gray-600 text-center">Master Python programming, understand basic programming concepts, and develop problem-solving skills.</p>-->
<!--                    </div>-->

<!--                    <div class="w-full md:w-1/3 bg-white p-6 rounded-xl shadow-lg border-t-4 border-[#4698a7] transform md:translate-y-32 mb-12 md:mb-0 relative">-->
<!--                        <div class="absolute -top-6 left-1/2 transform -translate-x-1/2 w-12 h-12 bg-[#4698a7] rounded-full flex items-center justify-center text-white text-base font-bold">2</div>-->
<!--                        <h3 class="text-base font-bold mt-6 mb-4 text-gray-800 text-center">Explore AI & Data Science</h3>-->
<!--                        <p class="text-sm text-gray-600 text-center">Dive into machine learning concepts, learn data analysis, and understand how AI systems work.</p>-->
<!--                    </div>-->

<!--                    <div class="w-full md:w-1/3 bg-white p-6 rounded-xl shadow-lg border-t-4 border-[#4698a7] relative">-->
<!--                        <div class="absolute -top-6 left-1/2 transform -translate-x-1/2 w-12 h-12 bg-[#4698a7] rounded-full flex items-center justify-center text-white text-base font-bold">3</div>-->
<!--                        <h3 class="text-base font-bold mt-6 mb-4 text-gray-800 text-center">Build Real Projects</h3>-->
<!--                        <p class="text-sm text-gray-600 text-center">Apply your knowledge to create functioning AI applications and data visualizations that solve real problems.</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

    <section class="py-16">
        <schedule-a-phone-class schedule_a_phone_call_title="{{ trans('phone_call.schedule_a_phone_call_title') }}" />
    </section>

@include('layouts.FooterIcons')


@endsection

@push('styles')
<style>
    /* Modern design styles */
    .shadow-card {
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }

    .hover\:shadow-xl:hover {
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }

    /* Tab content animations */
    .tab-content {
        transition: opacity 0.5s ease-in-out, transform 0.5s ease-in-out;
    }

    /* Morphing slider */
    #ai-slider {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* Card hover effects */
    .bg-white.rounded-3xl:hover,
    .bg-white.rounded-2xl:hover {
        transform: translateY(-8px) scale(1.02);
    }

    /* Accordion animations */
    .section-content {
        transition: max-height 0.5s ease-in-out, opacity 0.3s ease-out;
        overflow: hidden;
    }

    .section-content.expanded {
        max-height: 1000px !important;
        opacity: 1;
    }

    .section-toggle.rotated {
        transform: rotate(180deg);
    }

    /* Gradient backgrounds */
    .gradient-bg-1 {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .gradient-bg-2 {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    }

    .gradient-bg-3 {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    }

    .gradient-bg-4 {
        background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
    }

    /* Button animations */
    .ai-tab-button {
        transition: all 0.2s ease-in-out;
    }

    .ai-tab-button:hover {
        transform: translateY(-1px);
    }

    /* Scroll reveal animations */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fadeInUp {
        animation: fadeInUp 0.6s ease-out forwards;
    }

    /* Loading animation for slider */
    @keyframes slideIn {
        from {
            width: 0;
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    #ai-slider {
        animation: slideIn 0.5s ease-out;
    }

    /* Enhanced focus states */
    .focus\:ring-4:focus {
        ring-width: 4px;
    }

    /* Smooth transitions for all interactive elements */
    button, a {
        transition: all 0.2s ease-in-out;
    }

    /* Enhanced list item hover effects */
    .group:hover .group-hover\:bg-\[#4698a7\]\/30 {
        background-color: rgba(70, 152, 167, 0.3);
    }

    /* Custom scrollbar for better UX */
    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb {
        background: #4698a7;
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #0cc0df;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM loaded, initializing tab functionality');

    // Tab functionality
    const tabButtons = document.querySelectorAll('.ai-tab-button');
    const tabContents = document.querySelectorAll('.tab-content');
    const tabLearnContents = document.querySelectorAll('.tab-learn-content');
    const tabJoinContents = document.querySelectorAll('.tab-join-content');
    const tabScheduleContents = document.querySelectorAll('.tab-schedule-content');
    const aiSlider = document.getElementById('ai-slider');

    console.log('Found tab buttons:', tabButtons.length);

    // Content title and subtitle elements
    const contentTitle = document.getElementById('content-title');
    const contentSubtitle = document.getElementById('content-subtitle');
    const contentDuration = document.getElementById('content-duration');

    function updateSlider(activeButton) {
        if (!activeButton || !aiSlider) return;

        // Wait until layout is stable
        requestAnimationFrame(() => {
            const { offsetLeft, offsetWidth } = activeButton;
            aiSlider.style.width = offsetWidth + 'px';
            aiSlider.style.transform = `translateX(${offsetLeft}px)`;
        });
    }

    function switchTab(targetTab) {
        console.log('Switching to tab:', targetTab);

        // Remove active classes from all buttons
        tabButtons.forEach(btn => {
            btn.classList.remove('text-black', 'font-semibold');
            btn.classList.add('text-gray-700');
        });

        // Add active class to clicked button
        const activeButton = document.getElementById(`tab-${targetTab}`);
        if (activeButton) {
            activeButton.classList.remove('text-gray-700');
            activeButton.classList.add('text-black', 'font-semibold');
            updateSlider(activeButton);
        }

        // Hide all tab contents with fade out effect
        tabContents.forEach(content => {
            content.style.opacity = '0';
            content.style.transform = 'translateY(20px)';
            setTimeout(() => {
                content.classList.add('hidden');
            }, 300);
        });

        tabLearnContents.forEach(content => {
            content.style.opacity = '0';
            content.style.transform = 'translateY(20px)';
            setTimeout(() => {
                content.classList.add('hidden');
            }, 300);
        });

        tabJoinContents.forEach(content => {
            content.style.opacity = '0';
            content.style.transform = 'translateY(20px)';
            setTimeout(() => {
                content.classList.add('hidden');
            }, 300);
        });

        tabScheduleContents.forEach(content => {
            content.style.opacity = '0';
            content.style.transform = 'translateY(20px)';
            setTimeout(() => {
                content.classList.add('hidden');
            }, 300);
        });

        // Show target tab contents with fade in effect
        setTimeout(() => {
            const targetContent = document.getElementById(`${targetTab}-content`);
            const targetLearn = document.getElementById(`${targetTab}-learn`);
            const targetJoin = document.getElementById(`${targetTab}-join`);
            const targetSchedule = document.getElementById(`${targetTab}-schedule`);

            if (targetContent) {
                targetContent.classList.remove('hidden');
                targetContent.style.opacity = '0';
                targetContent.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    targetContent.style.opacity = '1';
                    targetContent.style.transform = 'translateY(0)';
                }, 50);
            }

            if (targetLearn) {
                targetLearn.classList.remove('hidden');
                targetLearn.style.opacity = '0';
                targetLearn.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    targetLearn.style.opacity = '1';
                    targetLearn.style.transform = 'translateY(0)';
                }, 100);
            }

            if (targetJoin) {
                targetJoin.classList.remove('hidden');
                targetJoin.style.opacity = '0';
                targetJoin.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    targetJoin.style.opacity = '1';
                    targetJoin.style.transform = 'translateY(0)';
                }, 150);
            }

            if (targetSchedule) {
                targetSchedule.classList.remove('hidden');
                targetSchedule.style.opacity = '0';
                targetSchedule.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    targetSchedule.style.opacity = '1';
                    targetSchedule.style.transform = 'translateY(0)';
                }, 200);
            }
        }, 350);

        // Update content titles based on tab
        if (contentTitle && contentSubtitle && contentDuration) {
            if (targetTab === 'beginners') {
                contentTitle.textContent = 'Course Content';
                contentSubtitle.textContent = 'Monday to Thursday (3 hours/day) for 2 weeks';
                contentDuration.textContent = '8 days, 24+ hours live instructions';
            } else {
                contentTitle.textContent = 'Course Content';
                contentSubtitle.textContent = 'Monday to Friday (2 hours/day) for 2 weeks';
                contentDuration.textContent = '10 days, 20+ hours live instructions';
            }
        }

        // Update accordion button state when switching tabs
        setTimeout(() => {
            updateExpandAllButton();
        }, 400);
    }

    // Initialize slider on page load
    window.addEventListener('load', () => {
        const defaultButton = document.getElementById('tab-beginners');
        if (defaultButton) {
            updateSlider(defaultButton);
        }
    });

    // Add click event listeners to tab buttons
    tabButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            console.log('Tab clicked:', this.id);
            const targetTab = this.id.replace('tab-', '');
            switchTab(targetTab);
        });
    });

    // Add scroll animations for cards
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    // Observe all cards for scroll animations
    document.querySelectorAll('.bg-white.rounded-2xl, .bg-white.rounded-3xl').forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = 'opacity 0.6s ease-out, transform 0.6s ease-out';
        observer.observe(card);
    });

    // Accordion functionality
    const expandAllBtn = document.getElementById('expand-all-btn');
    let allExpanded = false;

    function getVisibleSections() {
        const activeTab = document.querySelector('.tab-schedule-content:not(.hidden)');
        if (!activeTab) return { headers: [], contents: [], toggles: [] };

        return {
            headers: activeTab.querySelectorAll('.section-header'),
            contents: activeTab.querySelectorAll('.section-content'),
            toggles: activeTab.querySelectorAll('.section-toggle')
        };
    }

    function updateExpandAllButton() {
        const { contents } = getVisibleSections();
        const expandedSections = Array.from(contents).filter(content => content.classList.contains('expanded'));

        if (expandedSections.length === contents.length && contents.length > 0) {
            expandAllBtn.textContent = 'Collapse All';
            allExpanded = true;
        } else {
            expandAllBtn.textContent = 'Expand All';
            allExpanded = false;
        }
    }

    function toggleSection(sectionContent, sectionToggle) {
        if (sectionContent.classList.contains('expanded')) {
            // Collapse
            sectionContent.classList.remove('expanded');
            sectionToggle.classList.remove('rotated');
        } else {
            // Expand
            sectionContent.classList.add('expanded');
            sectionToggle.classList.add('rotated');
        }
        updateExpandAllButton();
    }

    // Add click event listeners to section headers (using event delegation)
    document.addEventListener('click', function(e) {
        const sectionHeader = e.target.closest('.section-header');
        if (sectionHeader) {
            const sectionContent = sectionHeader.parentElement.querySelector('.section-content');
            const sectionToggle = sectionHeader.querySelector('.section-toggle');
            toggleSection(sectionContent, sectionToggle);
        }
    });

    // Expand/Collapse All functionality
    expandAllBtn.addEventListener('click', function() {
        const { contents, toggles } = getVisibleSections();

        if (allExpanded) {
            // Collapse all
            contents.forEach((content, index) => {
                content.classList.remove('expanded');
                toggles[index].classList.remove('rotated');
            });
        } else {
            // Expand all
            contents.forEach((content, index) => {
                content.classList.add('expanded');
                toggles[index].classList.add('rotated');
            });
        }
        updateExpandAllButton();
    });

    // Initialize button state
    updateExpandAllButton();
});
</script>
