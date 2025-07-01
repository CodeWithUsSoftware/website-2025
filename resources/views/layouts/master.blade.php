<!doctype html>
<html>

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    {{-- Header Script --}}
    @include('layouts.header_script')
    <title>@yield('title')</title>
    <meta name="keywords" content="@yield('meta_keywords')">
    <meta name="description" content="@yield('meta_description')">
    @csrf
    {{-- Custom Script --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('schema')
    <style>
        .grecaptcha-badge {
            display: none;
        }
    </style>
    @yield('style')
</head>

<body>
    <div id="app">
        {{-- Navbar Section --}}
        @include('layouts.navbar')
        @include('layouts.sidebar')

        {{-- Content Section --}}
        <div class="relative bg-gray-50">
            <main class="lg:relative">
                @yield('content')
            </main>
        </div>

        {{-- Footer Section --}}
        @include('layouts.footer')
    </div>

    {{-- Custom Script --}}
    @yield('script')
    @include('layouts.footer_script')
    {{-- Footer Script --}}
    @yield('footer_scripts')

    {{-- Mobile Menu Script --}}
    <script>
        function openFunction() {
            var element = document.getElementById("mob-menu");
            element.classList.remove("hidden");
        }

        function closeFunction() {
            var element = document.getElementById("mob-menu");
            element.classList.add("hidden");
        }

        function codingFunction() {
            var element = document.getElementById("coding-menu");
            element.classList.toggle("hidden");
        }

        function learnFunction() {
            var element = document.getElementById("learn-menu");
            element.classList.toggle("hidden");
        }

        function serviceFunction() {
            var element = document.getElementById("service-menu");
            element.classList.toggle("hidden");
        }
    </script>

    {{-- Collapsible Sections Script --}}
    <script>
        // Pure JavaScript implementation for collapsible sections
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle function for individual sections
            function toggleSection(element) {
                if (!element) return;

                const targetId = element.getAttribute('data-target');
                if (!targetId) return;

                const content = document.getElementById(targetId);
                const icon = element.querySelector('.section-icon');

                if (content && icon) {
                    if (content.classList.contains('hidden')) {
                        content.classList.remove('hidden');
                        icon.classList.add('rotate-180');
                        // Add background color to expanded section header
                        element.classList.add('bg-[#4698a7]/10');
                        element.classList.remove('hover:bg-gray-50');
                    } else {
                        content.classList.add('hidden');
                        icon.classList.remove('rotate-180');
                        // Remove background color when collapsed
                        element.classList.remove('bg-[#4698a7]/10');
                        element.classList.add('hover:bg-gray-50');
                    }
                }
            }

            // Add click listeners to all section toggle buttons
            const toggleButtons = document.querySelectorAll('.section-toggle');
            if (toggleButtons && toggleButtons.length > 0) {
                toggleButtons.forEach(function(button) {
                    button.addEventListener('click', function(e) {
                        e.preventDefault();
                        toggleSection(this);
                    });
                });
            }

            // Handle expand/collapse all button
            const expandAllBtn = document.getElementById('expandAllBtn');
            if (expandAllBtn) {
                expandAllBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const isExpanding = this.textContent.includes('Expand');
                    const sections = document.querySelectorAll('.section-content');
                    const toggles = document.querySelectorAll('.section-toggle');
                    const icons = document.querySelectorAll('.section-icon');

                    // Update all sections based on expand/collapse state
                    if (sections && sections.length > 0) {
                        sections.forEach(function(section) {
                            if (isExpanding) {
                                section.classList.remove('hidden');
                            } else {
                                section.classList.add('hidden');
                            }
                        });
                    }

                    // Update all toggle buttons based on expand/collapse state
                    if (toggles && toggles.length > 0) {
                        toggles.forEach(function(toggle) {
                            if (isExpanding) {
                                toggle.classList.add('bg-[#4698a7]/10');
                                toggle.classList.remove('hover:bg-gray-50');
                            } else {
                                toggle.classList.remove('bg-[#4698a7]/10');
                                toggle.classList.add('hover:bg-gray-50');
                            }
                        });
                    }

                    // Update all icons based on expand/collapse state
                    if (icons && icons.length > 0) {
                        icons.forEach(function(icon) {
                            if (isExpanding) {
                                icon.classList.add('rotate-180');
                            } else {
                                icon.classList.remove('rotate-180');
                            }
                        });
                    }

                    // Update button text
                    this.textContent = isExpanding ? 'Collapse all sections' : 'Expand all sections';
                });
            }
        });
    </script>

    <script>
        function switchPlan(plan) {
            const slider = document.getElementById('slider');
            const selectedTab = document.getElementById('tab-' + plan);
            if (!selectedTab || !slider) return;

            // Wait until layout is stable
            requestAnimationFrame(() => {
                const {
                    offsetLeft,
                    offsetWidth
                } = selectedTab;
                slider.style.width = offsetWidth + 'px';
                slider.style.transform = `translateX(${offsetLeft}px)`;
            });

            // Update tab styles
            document.querySelectorAll('.plan-tab').forEach(tab => {
                tab.classList.remove('text-black', 'font-semibold');
                tab.classList.add('text-gray-700');
            });
            selectedTab.classList.remove('text-gray-700');
            selectedTab.classList.add('text-black', 'font-semibold');

            // Optional: Toggle content
            document.querySelectorAll('.plan-container').forEach(container => {
                container.classList.add('hidden');
            });
            const activeContainer = document.getElementById('plan-' + plan);
            if (activeContainer) {
                activeContainer.classList.remove('hidden');
            }
        }

        // On page load, activate default tab
        // window.addEventListener('DOMContentLoaded', () => {
        //     switchPlan('monthly');
        // });
        // Wait for DOM + layout to settle
        window.addEventListener('load', () => {
            switchPlan('monthly');
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const originalNavbar = document.getElementById('original-navbar');
            const fixedNavbarContainer = document.getElementById('fixed-navbar-container');

            // Check if required elements exist
            if (!originalNavbar || !fixedNavbarContainer) {
                console.error('Required navbar elements not found');
                return;
            }

            let isFixed = false;
            let originalNavbarHeight = 0;
            let lastScrollY = window.scrollY || 0;
            const threshold = 20; // Pixel threshold for showing/hiding

            // Store dropdown event listeners to avoid memory leaks
            const dropdownListeners = new Map();

            // Get the original navbar height
            function updateNavbarHeight() {
                if (originalNavbar) {
                    originalNavbarHeight = originalNavbar.offsetHeight;
                }
            }

            // Clone the original navbar and insert into fixed container
            function createFixedNavbar() {
                try {
                    const clonedNavbar = originalNavbar.cloneNode(true);
                    clonedNavbar.id = 'fixed-navbar';
                    clonedNavbar.classList.remove('relative');
                    clonedNavbar.classList.add('fixed', 'top-0', 'left-0', 'right-0');
                    fixedNavbarContainer.innerHTML = '';
                    fixedNavbarContainer.appendChild(clonedNavbar);

                    // Re-initialize dropdown functionality for cloned navbar
                    initializeDropdowns(clonedNavbar);
                } catch (error) {
                    console.error('Error creating fixed navbar:', error);
                }
            }

            // Initialize dropdown functionality
            function initializeDropdowns(navbar) {
                if (!navbar) return;

                try {
                    const dropdowns = navbar.querySelectorAll('.dropdown');

                    dropdowns.forEach(dropdown => {
                        const trigger = dropdown.querySelector('[tabindex="0"]');
                        const content = dropdown.querySelector('.dropdown-content');

                        if (trigger && content) {
                            const clickHandler = function(e) {
                                e.preventDefault();
                                e.stopPropagation();

                                // Close all other dropdowns
                                dropdowns.forEach(otherDropdown => {
                                    if (otherDropdown !== dropdown) {
                                        const otherContent = otherDropdown.querySelector(
                                            '.dropdown-content');
                                        if (otherContent) {
                                            otherContent.hidden = true;
                                        }
                                    }
                                });

                                // Toggle current dropdown
                                content.hidden = !content.hidden;
                            };

                            trigger.addEventListener('click', clickHandler);

                            // Store listener reference for cleanup
                            dropdownListeners.set(trigger, clickHandler);
                        }
                    });

                    // Close dropdowns when clicking outside (only add once)
                    const outsideClickHandler = function(e) {
                        if (!navbar.contains(e.target)) {
                            dropdowns.forEach(dropdown => {
                                const content = dropdown.querySelector('.dropdown-content');
                                if (content) {
                                    content.hidden = true;
                                }
                            });
                        }
                    };

                    // Remove existing listener if it exists
                    if (navbar.outsideClickHandler) {
                        document.removeEventListener('click', navbar.outsideClickHandler);
                    }

                    document.addEventListener('click', outsideClickHandler);
                    navbar.outsideClickHandler = outsideClickHandler;

                } catch (error) {
                    console.error('Error initializing dropdowns:', error);
                }
            }

            // Show fixed navbar with slide down animation using Tailwind classes
            function showFixedNavbar() {
                if (!isFixed && fixedNavbarContainer) {
                    try {
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
                    } catch (error) {
                        console.error('Error showing fixed navbar:', error);
                    }
                }
            }

            // Hide fixed navbar with slide up animation using Tailwind classes
            function hideFixedNavbar() {
                if (isFixed && fixedNavbarContainer) {
                    try {
                        // Hide the navbar by adding hidden classes and removing visible classes
                        fixedNavbarContainer.classList.remove('translate-y-0', 'opacity-100');
                        fixedNavbarContainer.classList.add('-translate-y-full', 'opacity-0');

                        isFixed = false;
                    } catch (error) {
                        console.error('Error hiding fixed navbar:', error);
                    }
                }
            }

            // Handle scroll events
            function handleScroll() {
                try {
                    updateNavbarHeight();
                    const currentScrollY = window.scrollY || 0;
                    const originalNavbarRect = originalNavbar.getBoundingClientRect();

                    // Check if original navbar is out of view (with threshold)
                    const isOriginalNavbarOutOfView = originalNavbarRect.bottom < -threshold;

                    if (isOriginalNavbarOutOfView && !isFixed) {
                        showFixedNavbar();
                    } else if (!isOriginalNavbarOutOfView && isFixed) {
                        hideFixedNavbar();
                    }

                    lastScrollY = currentScrollY;
                } catch (error) {
                    console.error('Error in scroll handler:', error);
                }
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

            // Mobile menu functionality
            window.openFunction = window.openFunction || function() {
                console.log('Mobile menu opened');
                // Add your mobile menu logic here
            };

        });
    </script>
</body>

</html>
