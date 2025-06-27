<div>
    <!-- Original navbar that scrolls with content -->
    <nav id="original-navbar" class="bg-white md:flex md:justify-between shadow-card relative z-40">
        <div class="text-black-lighter-1 flex items-center justify-between p-3 md:p-0 md:pl-10 ">

            <a href="/">
                <img src="/images/logo.webp" alt="CodeWithUs" class="h-11 w-auto">
            </a>

            <div class="md:hidden" onclick="openFunction()">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </div>
        </div>

        <div class="text-left text-black-lighter-1 md:block hidden">
            <ul class="px-2 py-5 md:flex md:justify-center">
                <li>
                    <div class="relative dropdown py-2 pl-10 md:px-3 cursor-pointer z-30">
                        <div tabindex="0" class="flex items-center text-black-lighter-1 space-x-1">
                            <span>Coding Classes</span>
                            <svg viewBox="0 0 13 7" fill="none" xmlns="http://www.w3.org/2000/svg"
                                class="w-4 h-4 text-black-lighter-1">
                                <path
                                    d="M12.072 1.07143C12.072 0.982143 12.0274 0.881696 11.9604 0.814732L11.4024 0.256696C11.3354 0.189732 11.235 0.145089 11.1457 0.145089C11.0564 0.145089 10.956 0.189732 10.889 0.256696L6.50285 4.64286L2.11669 0.256696C2.04973 0.189732 1.94928 0.145089 1.85999 0.145089C1.75955 0.145089 1.67026 0.189732 1.6033 0.256696L1.04526 0.814732C0.978298 0.881696 0.933655 0.982143 0.933655 1.07143C0.933655 1.16071 0.978298 1.26116 1.04526 1.32812L6.24615 6.52902C6.31312 6.59598 6.41357 6.64062 6.50285 6.64062C6.59214 6.64062 6.69258 6.59598 6.75955 6.52902L11.9604 1.32812C12.0274 1.26116 12.072 1.16071 12.072 1.07143Z"
                                    fill="black"></path>
                            </svg>
                        </div>
                        <div hidden class="dropdown-content">
                            <ul tabindex="0"
                                class="absolute  mt-2 z-50 p-2 shadow-2xl bg-white rounded-3xl w-80 focus:outline-none py-8 menu">
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
                                <li>
                                    <a href="/topics/flask" tabindex="-1"
                                        class="flex items-center justify-between space-x-3 xt-black-lighter-1 block px-4 py-2 text-sm">
                                        <div class="flex items-center">
                                            <img class="w-10 h-10" src="/images/icons/14.webp" />
                                            <span class="pl-4">Flask Coding</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="/topic/artificial-intelligence" tabindex="-1"
                                        class="flex items-center justify-between space-x-3 xt-black-lighter-1 block px-4 py-2 text-sm">
                                        <div class="flex items-center">
                                            <img class="w-10 h-10" src="/images/icons/ai.webp" />
                                            <span class="pl-4">Artificial Intelligence</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li>
                    {{-- <div class="absolute bg-gray-200 min-h-screen w-full top-0 left-0 z-20 opacity-0"></div> --}}
                    <div class="relative dropdown py-2 pl-10 md:px-3 cursor-pointer z-30">
                        <div tabindex="0" class="flex items-center text-black-lighter-1 space-x-1">
                            <span>Learn More</span>
                            <svg viewBox="0 0 13 7" fill="none" xmlns="http://www.w3.org/2000/svg"
                                class="w-4 h-4 text-black-lighter-1">
                                <path
                                    d="M12.072 1.07143C12.072 0.982143 12.0274 0.881696 11.9604 0.814732L11.4024 0.256696C11.3354 0.189732 11.235 0.145089 11.1457 0.145089C11.0564 0.145089 10.956 0.189732 10.889 0.256696L6.50285 4.64286L2.11669 0.256696C2.04973 0.189732 1.94928 0.145089 1.85999 0.145089C1.75955 0.145089 1.67026 0.189732 1.6033 0.256696L1.04526 0.814732C0.978298 0.881696 0.933655 0.982143 0.933655 1.07143C0.933655 1.16071 0.978298 1.26116 1.04526 1.32812L6.24615 6.52902C6.31312 6.59598 6.41357 6.64062 6.50285 6.64062C6.59214 6.64062 6.69258 6.59598 6.75955 6.52902L11.9604 1.32812C12.0274 1.26116 12.072 1.16071 12.072 1.07143Z"
                                    fill="black"></path>
                            </svg>
                        </div>
                        <div hidden class="dropdown-content">
                            <ul tabindex="0"
                                class="absolute mt-2 z-50 p-2 shadow-2xl bg-white rounded-3xl w-80 focus:outline-none py-8 menu space-y-5">
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
                                    <a href="/projects" tabindex="-1"
                                        class="flex items-center justify-between space-x-3 xt-black-lighter-1 block px-4 py-2 text-sm">
                                        <div class="flex items-center">
                                            <span class="pl-4">Student Projects</span>
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
                </li>

                <li>
                    <div class="relative dropdown py-2 pl-10 md:px-3 cursor-pointer z-30">
                        <div tabindex="0" class="flex items-center text-black-lighter-1 space-x-1"
                            id="Our_Services">
                            <span>Our Services</span>
                            <svg viewBox="0 0 13 7" fill="none" xmlns="http://www.w3.org/2000/svg"
                                class="w-4 h-4 text-black-lighter-1">
                                <path
                                    d="M12.072 1.07143C12.072 0.982143 12.0274 0.881696 11.9604 0.814732L11.4024 0.256696C11.3354 0.189732 11.235 0.145089 11.1457 0.145089C11.0564 0.145089 10.956 0.189732 10.889 0.256696L6.50285 4.64286L2.11669 0.256696C2.04973 0.189732 1.94928 0.145089 1.85999 0.145089C1.75955 0.145089 1.67026 0.189732 1.6033 0.256696L1.04526 0.814732C0.978298 0.881696 0.933655 0.982143 0.933655 1.07143C0.933655 1.16071 0.978298 1.26116 1.04526 1.32812L6.24615 6.52902C6.31312 6.59598 6.41357 6.64062 6.50285 6.64062C6.59214 6.64062 6.69258 6.59598 6.75955 6.52902L11.9604 1.32812C12.0274 1.26116 12.072 1.16071 12.072 1.07143Z"
                                    fill="black"></path>
                            </svg>
                        </div>
                        <div hidden class="dropdown-content">
                            <ul tabindex="0"
                                class="absolute mt-2 z-50 p-2 shadow-2xl bg-white rounded-3xl w-80 focus:outline-none py-8 menu space-y-5">
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
                </li>

            </ul>
        </div>

        <ul class="px-3 py-5 md:pr-10 md:flex md:justify-center hidden md:block">
            <li class="md:px-1">
                <a href="/coding_classes#trial_form"
                    class="shadow-primary space-x-1 inline-flex items-center px-4 py-2 text-sm border
            border-primary rounded-full text-white bg-primary hover:bg-primary-darker-1 hover:text-white focus:outline-none ">
                    <span class="">Schedule a Free Trial</span>
                    <svg width="13" height="11" viewBox="0 0 13 11" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 5.5H12M12 5.5L8.03644 1.5M12 5.5L8.03644 9.5" stroke="white" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </a>
            </li>


            <li class="md:px-1">
                <a href="/monthly-subscriptions"
                    class="shadow-primary space-x-1 inline-flex items-center px-4
           py-2 text-sm border border-danger rounded-full text-white bg-red-500 hover:bg-red-700
            hover:text-white focus:outline-none ">
                    <span class="">Buy Classes</span>
                </a>
            </li>
            <li class="md:px-1">
                <a href="/school-program"
                    class="shadow-primary space-x-1 inline-flex items-center px-4 py-2
          text-sm border border-success rounded-full text-white bg-success hover:bg-success hover:bg-success-darker-1 hover:text-white
           focus:outline-none ">
                    <span class="">School Program</span>
                </a>
            </li>

            <li class="md:px-1">
                <a href="https://portal.codewithus.com/login" target="_blank"
                    class="inline-flex items-center px-4 py-2 text-sm shadow-primary rounded-full text-primary hover:text-white border border-primary hover:bg-primary focus:outline-none ">
                    Log In
                </a>
            </li>

            {{-- <li class="md:px-1">
                <a href="{{route('registration')}}#form" target="_blank"
                    class="inline-flex items-center px-4 py-2 text-sm shadow-primary rounded-full text-primary hover:text-white border border-primary hover:bg-primary focus:outline-none ">
                    Sign Up
                </a>
            </li> --}}
        </ul>
    </nav>

    <!-- Fixed navbar placeholder - will be populated by JavaScript -->
    <div id="fixed-navbar-container" class="fixed top-0 left-0 right-0 z-50 transform -translate-y-full opacity-0 transition-all duration-700 ease-out">
        <!-- Content will be dynamically inserted here -->
    </div>

    <!-- CSS for dropdown positioning only -->
    <style>
        /* Ensure dropdown menus work properly in fixed navbar */
        #fixed-navbar-container .dropdown-content {
            position: fixed !important;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const originalNavbar = document.getElementById('original-navbar');
            const fixedNavbarContainer = document.getElementById('fixed-navbar-container');
            let isFixed = false;
            let originalNavbarHeight = 0;
            let lastScrollY = window.scrollY;
            const threshold = 20; // Pixel threshold for showing/hiding

            // Get the original navbar height
            function updateNavbarHeight() {
                originalNavbarHeight = originalNavbar.offsetHeight;
            }

            // Clone the original navbar and insert into fixed container
            function createFixedNavbar() {
                const clonedNavbar = originalNavbar.cloneNode(true);
                clonedNavbar.id = 'fixed-navbar';
                clonedNavbar.classList.remove('relative');
                clonedNavbar.classList.add('fixed', 'top-0', 'left-0', 'right-0');
                fixedNavbarContainer.innerHTML = '';
                fixedNavbarContainer.appendChild(clonedNavbar);
                
                // Re-initialize dropdown functionality for cloned navbar
                initializeDropdowns(clonedNavbar);
            }

            // Initialize dropdown functionality
            function initializeDropdowns(navbar) {
                const dropdowns = navbar.querySelectorAll('.dropdown');
                dropdowns.forEach(dropdown => {
                    const trigger = dropdown.querySelector('[tabindex="0"]');
                    const content = dropdown.querySelector('.dropdown-content');
                    
                    if (trigger && content) {
                        trigger.addEventListener('click', function(e) {
                            e.preventDefault();
                            e.stopPropagation();
                            
                            // Close all other dropdowns
                            dropdowns.forEach(otherDropdown => {
                                if (otherDropdown !== dropdown) {
                                    const otherContent = otherDropdown.querySelector('.dropdown-content');
                                    if (otherContent) {
                                        otherContent.hidden = true;
                                    }
                                }
                            });
                            
                            // Toggle current dropdown
                            content.hidden = !content.hidden;
                        });
                    }
                });

                // Close dropdowns when clicking outside
                document.addEventListener('click', function(e) {
                    if (!navbar.contains(e.target)) {
                        dropdowns.forEach(dropdown => {
                            const content = dropdown.querySelector('.dropdown-content');
                            if (content) {
                                content.hidden = true;
                            }
                        });
                    }
                });
            }

            // Show fixed navbar with slide down animation using Tailwind classes
            function showFixedNavbar() {
                if (!isFixed) {
                    createFixedNavbar();
                    
                    // Add shadow to cloned navbar
                    const clonedNav = fixedNavbarContainer.querySelector('nav');
                    if (clonedNav) {
                        clonedNav.classList.add('shadow-lg');
                    }
                    
                    // Use requestAnimationFrame for smooth animation
                    requestAnimationFrame(() => {
                        // Show the navbar by removing hidden classes and adding visible classes
                        fixedNavbarContainer.classList.remove('-translate-y-full', 'opacity-0');
                        fixedNavbarContainer.classList.add('translate-y-0', 'opacity-100');
                    });
                    
                    isFixed = true;
                }
            }

            // Hide fixed navbar with slide up animation using Tailwind classes
            function hideFixedNavbar() {
                if (isFixed) {
                    // Hide the navbar by adding hidden classes and removing visible classes
                    fixedNavbarContainer.classList.remove('translate-y-0', 'opacity-100');
                    fixedNavbarContainer.classList.add('-translate-y-full', 'opacity-0');
                    
                    isFixed = false;
                }
            }

            // Handle scroll events
            function handleScroll() {
                updateNavbarHeight();
                const currentScrollY = window.scrollY;
                const originalNavbarRect = originalNavbar.getBoundingClientRect();
                
                // Check if original navbar is out of view (with threshold)
                const isOriginalNavbarOutOfView = originalNavbarRect.bottom < -threshold;
                
                // Debug logs
                console.log('Scroll Y:', currentScrollY);
                console.log('Original navbar bottom:', originalNavbarRect.bottom);
                console.log('Is out of view:', isOriginalNavbarOutOfView);
                console.log('Is fixed:', isFixed);
                
                if (isOriginalNavbarOutOfView && !isFixed) {
                    console.log('Showing fixed navbar');
                    showFixedNavbar();
                } else if (!isOriginalNavbarOutOfView && isFixed) {
                    console.log('Hiding fixed navbar');
                    hideFixedNavbar();
                }
                
                lastScrollY = currentScrollY;
            }

            // Initialize
            updateNavbarHeight();
            initializeDropdowns(originalNavbar);
            
            // Throttled scroll handler for better performance
            let ticking = false;
            function scrollHandler() {
                if (!ticking) {
                    requestAnimationFrame(() => {
                        handleScroll();
                        ticking = false;
                    });
                    ticking = true;
                }
            }

            // Event listeners
            window.addEventListener('scroll', scrollHandler);
            window.addEventListener('resize', updateNavbarHeight);
            
            // Initialize mobile menu functionality if it exists
            if (typeof openFunction === 'function') {
                // Make sure mobile menu works in both navbars
                window.openFunction = function() {
                    // Your existing mobile menu logic here
                    console.log('Mobile menu opened');
                };
            }
        });
    </script>
</div>
