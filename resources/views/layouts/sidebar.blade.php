
    {{-- Mobile Navbar --}}
    <div class="hidden" id="mob-menu">
        <div aria-labelledby="slide-over-title" role="dialog" class="fixed inset-0 overflow-hidden z-50">
            <div class="absolute inset-0 overflow-hidden">
                <div class="absolute inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
                <div class="fixed inset-y-0 right-0 pl-10 max-w-full flex">
                    <div class="relative w-screen max-w-md">
                        <div class="absolute top-0 left-0 -ml-8 pt-4 pr-2 flex sm:-ml-10 sm:pr-4"><button
                                type="button" onclick="closeFunction()"
                                class="rounded-md text-gray-300 hover:text-white focus:outline-none focus:ring-2 focus:ring-white"><span
                                    class="sr-only">Close panel</span>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                             </button></div>
                        <div class="h-full flex flex-col py-3 bg-white shadow-xl overflow-y-scroll">
                            <div class="md:flex md:flex-shrink-0 md:block">
                                <div class="flex flex-col w-full">
                                    <div class="flex flex-col flex-grow pt-0 pb-4 overflow-y-auto">
                                        <div class="flex justify-center px-2">
                                            <a href="/"><img src="/images/logo.webp"
                                                alt="CodeWithUs" class="h-11 w-auto"></a></div>

                                    <div class="mt-5 flex-1 flex flex-col">
                                        <nav class="flex-1 px-2 space-y-5 relative">

                                                {{-- Coding Classes --}}
                                            <div class="cursor-pointer z-30">
                                                <div class="space-y-1" onclick="codingFunction()">
                                                    <button type="button" class="text-black-lighter-1 hover:bg-black-lighter-4 focus:bg-black-lighter-4 group w-full flex items-center pr-2 py-2 text-left rounded-full focus:outline-none">
                                                        <span class="flex-1 pl-4">Coding Classes</span>
                                                        <svg viewBox="0 0 20 20" aria-hidden="true"
                                                            class="text-gray-300 mr-2 flex-shrink-0 h-5 w-5 group-hover:text-gray-400 transition-colors ease-in-out duration-150 transform duration-300">
                                                            <path d="M6 6L14 10L6 14V6Z" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </button>
                                                </div>
                                                {{-- Submenu --}}
                                                <div  id="coding-menu"  class="hidden">
                                                <ul tabindex="0" class="mt-2 z-50 p-2 bg-white w-80 focus:outline-none py-8 menu">
                                                    <li>
                                                        <a href="/topics/scratch" tabindex="-1"
                                                            class="flex items-center justify-between space-x-3 xt-black-lighter-1 block px-4 py-2 text-sm">
                                                            <div class="flex items-center">
                                                                <img class="w-10 h-10" src="/images/icons/11.webp" />
                                                                <span class="pl-4">Scratch Coding</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="/topics/minecraft" tabindex="-1"
                                                            class="flex items-center justify-between space-x-3 xt-black-lighter-1 block px-4 py-2 text-sm">
                                                            <div class="flex items-center">
                                                                <img class="w-10 h-10" src="/images/icons/16.webp" />
                                                                <span class="pl-4">Minecraft Modding</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="/topics/python" tabindex="-1"
                                                            class="flex items-center justify-between space-x-3 xt-black-lighter-1 block px-4 py-2 text-sm">
                                                            <div class="flex items-center">
                                                                <img class="w-10 h-10" src="/images/icons/14.webp" />
                                                                <span class="pl-4">Python Coding</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="/topics/javascript" tabindex="-1"
                                                            class="flex items-center justify-between space-x-3 xt-black-lighter-1 block px-4 py-2 text-sm">
                                                            <div class="flex items-center">
                                                                <img class="w-10 h-10" src="/images/icons/7.webp" />
                                                                <span class="pl-4">JavaScript Coding</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="/topics/arduino" tabindex="-1"
                                                            class="flex items-center justify-between space-x-3 xt-black-lighter-1 block px-4 py-2 text-sm">
                                                            <div class="flex items-center">
                                                                <img class="w-10 h-10" src="/images/icons/5.webp" />
                                                                <span class="pl-4">Arduino Coding</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="/topics/java" tabindex="-1"
                                                            class="flex items-center justify-between space-x-3 xt-black-lighter-1 block px-4 py-2 text-sm">
                                                            <div class="flex items-center">
                                                                <img class="w-10 h-10" src="/images/icons/9.webp" />
                                                                <span class="pl-4">Java Coding</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="/topics/roblox" tabindex="-1"
                                                            class="flex items-center justify-between space-x-3 xt-black-lighter-1 block px-4 py-2 text-sm">
                                                            <div class="flex items-center">
                                                                <img class="w-10 h-10" src="/images/icons/6.webp" />
                                                                <span class="pl-4">Roblox Coding</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="/topics/open_topic" tabindex="-1"
                                                            class="flex items-center justify-between space-x-3 xt-black-lighter-1 block px-4 py-2 text-sm">
                                                            <div class="flex items-center">
                                                                <img class="w-10 h-10" src="/images/icons/10.webp" />
                                                                <span class="pl-4">Open Topic</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            </div>

                                                {{-- Learn More --}}
                                                <div class="cursor-pointer z-30">
                                                    <div class="space-y-1" onclick="learnFunction()">
                                                        <button type="button" class="text-black-lighter-1 hover:bg-black-lighter-4 focus:bg-black-lighter-4 group w-full flex items-center pr-2 py-2 text-left rounded-full focus:outline-none">
                                                            <span class="flex-1 pl-4">Learn More</span>
                                                            <svg viewBox="0 0 20 20" aria-hidden="true"
                                                                class="text-gray-300 mr-2 flex-shrink-0 h-5 w-5 group-hover:text-gray-400 transition-colors ease-in-out duration-150 transform duration-300">
                                                                <path d="M6 6L14 10L6 14V6Z" fill="currentColor">
                                                                </path>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                    {{-- Submenu --}}
                                                    <div  id="learn-menu"  class="hidden">
                                                        <ul tabindex="0" class="mt-2 z-50 p-2 bg-white w-80 focus:outline-none py-8 menu space-y-5">
                                                        <li>
                                                            <a href="/pricing" tabindex="-1"
                                                                class="flex items-center justify-between space-x-3 xt-black-lighter-1 block px-4 py-2 text-sm">
                                                                <div class="flex items-center">
                                                                    <span class="pl-4">Pricing Guide</span>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="/student_spotlight" tabindex="-1"
                                                                class="flex items-center justify-between space-x-3 xt-black-lighter-1 block px-4 py-2 text-sm">
                                                                <div class="flex items-center">
                                                                    <span class="pl-4">Student Spotlight</span>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="/blogs" tabindex="-1"
                                                                class="flex items-center justify-between space-x-3 xt-black-lighter-1 block px-4 py-2 text-sm">
                                                                <div class="flex items-center">
                                                                    <span class="pl-4">Blogs</span>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="/faqs" tabindex="-1"
                                                                class="flex items-center justify-between space-x-3 xt-black-lighter-1 block px-4 py-2 text-sm">
                                                                <div class="flex items-center">
                                                                    <span class="pl-4">FAQs</span>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="/jobs" tabindex="-1"
                                                                class="flex items-center justify-between space-x-3 xt-black-lighter-1 block px-4 py-2 text-sm">
                                                                <div class="flex items-center">
                                                                    <span class="pl-4">Jobs</span>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                </div>

                                                    {{-- Our Services --}}
                                            <div class="cursor-pointer z-30">
                                                <div class="space-y-1" onclick="serviceFunction()">
                                                    <button type="button" class="text-black-lighter-1 hover:bg-black-lighter-4 focus:bg-black-lighter-4 group w-full flex items-center pr-2 py-2 text-left rounded-full focus:outline-none">
                                                        <span class="flex-1 pl-4">Our Services</span>
                                                        <svg viewBox="0 0 20 20" aria-hidden="true"
                                                            class="text-gray-300 mr-2 flex-shrink-0 h-5 w-5 group-hover:text-gray-400 transition-colors ease-in-out duration-150 transform duration-300">
                                                            <path d="M6 6L14 10L6 14V6Z" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </button>
                                                </div>
                                                {{-- Submenu --}}
                                                <div  id="service-menu"  class="hidden">
                                                    <ul tabindex="0" class="mt-2 z-50 p-2 bg-white w-80 focus:outline-none py-8 menu space-y-5">
                                                    <li>
                                                        <a href="/monthly-subscriptions" tabindex="-1"
                                                            class="flex items-center justify-between space-x-3 xt-black-lighter-1 block px-4 py-2 text-sm">
                                                            <div class="flex items-center">
                                                                <span class="pl-4">Weekly Classes</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="/camps" tabindex="-1"
                                                            class="flex items-center justify-between space-x-3 xt-black-lighter-1 block px-4 py-2 text-sm">
                                                            <div class="flex items-center">
                                                                <span class="pl-4">Camps</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="/school-program" tabindex="-1"
                                                            class="flex items-center justify-between space-x-3 xt-black-lighter-1 block px-4 py-2 text-sm">
                                                            <div class="flex items-center">
                                                                <span class="pl-4">School Program</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="/partner" tabindex="-1"
                                                            class="flex items-center justify-between space-x-3 xt-black-lighter-1 block px-4 py-2 text-sm">
                                                            <div class="flex items-center">
                                                                <span class="pl-4">Partnership Opportunities</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            </div>

                                                <div class="space-y-3 flex flex-col justify-center"><a
                                                        href="/coding_classes"
                                                        class="w-full shadow-primary space-x-2 inline-flex items-center justify-center px-4 py-2 text-sm font-medium border border-primary rounded-full text-white bg-primary hover:bg-primary-darker-1 hover:text-white focus:outline-none">
                                                        Schedule a Free Trial
                                                    </a> <a href="/monthly-subscriptions"
                                                        class="w-full shadow-primary space-x-2 inline-flex items-center justify-center px-4 py-2 text-sm font-medium border border-primary rounded-full text-white bg-primary hover:bg-primary-darker-1 hover:text-white focus:outline-none">
                                                        Buy Classes
                                                    </a> <a href="/school-program"
                                                        class="w-full shadow-primary space-x-2 inline-flex items-center justify-center px-4 py-2 text-sm font-medium border border-primary rounded-full text-white bg-primary hover:bg-primary-darker-1 hover:text-white focus:outline-none">
                                                        School Program
                                                    </a> <a href="https://portal.codewithus.com/login"
                                                        target="_blank"
                                                        class="w-full shadow-primary justify-center space-x-2 inline-flex items-center px-4 py-2 text-sm font-medium border border-primary rounded-full text-primary bg-transparent hover:bg-primary-darker-1 hover:text-white focus:outline-none">
                                                        Login
                                                    </a>
                                                </div>
                                        </nav>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>




