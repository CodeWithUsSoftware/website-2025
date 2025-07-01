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

        < !-- CSS for dropdown positioning only -->

        /* Ensure dropdown menus work properly in fixed navbar */
        #fixed-navbar-container .dropdown-content {
            position: fixed !important;
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
            var slider = document.getElementById('slider');
            var selectedTab = document.getElementById('tab-' + plan);
            if (!selectedTab || !slider) return;

            // Wait until layout is stable
            requestAnimationFrame(function() {
                var offsetLeft = selectedTab.offsetLeft;
                var offsetWidth = selectedTab.offsetWidth;
                slider.style.width = offsetWidth + 'px';
                slider.style.transform = 'translateX(' + offsetLeft + 'px)';
            });

            // Update tab styles
            var planTabs = document.querySelectorAll('.plan-tab');
            for (var i = 0; i < planTabs.length; i++) {
                planTabs[i].classList.remove('text-black', 'font-semibold');
                planTabs[i].classList.add('text-gray-700');
            }
            selectedTab.classList.remove('text-gray-700');
            selectedTab.classList.add('text-black', 'font-semibold');

            // Optional: Toggle content
            var planContainers = document.querySelectorAll('.plan-container');
            for (var j = 0; j < planContainers.length; j++) {
                planContainers[j].classList.add('hidden');
            }
            var activeContainer = document.getElementById('plan-' + plan);
            if (activeContainer) {
                activeContainer.classList.remove('hidden');
            }
        }

        // Wait for DOM + layout to settle
        window.addEventListener('load', function() {
            switchPlan('monthly');
        });
    </script>

    <script>
        // Fixed Navbar Functionality
        (function() {
            'use strict';

            document.addEventListener('DOMContentLoaded', function() {
                console.log('Fixed navbar script loaded');
                var originalNavbar = document.getElementById('original-navbar');
                var fixedNavbarContainer = document.getElementById('fixed-navbar-container');

                // Check if required elements exist
                if (!originalNavbar || !fixedNavbarContainer) {
                    console.error('Required navbar elements not found:', {
                        originalNavbar: !!originalNavbar,
                        fixedNavbarContainer: !!fixedNavbarContainer
                    });
                    return;
                }

                console.log('Navbar elements found, initializing fixed navbar functionality');

                var isFixed = false;
                var originalNavbarHeight = 0;
                var lastScrollY = window.scrollY || window.pageYOffset || 0;
                var threshold = 20;

                // Get the original navbar height
                function updateNavbarHeight() {
                    if (originalNavbar) {
                        originalNavbarHeight = originalNavbar.offsetHeight;
                    }
                }

                // Clone the original navbar and insert into fixed container
                function createFixedNavbar() {
                    try {
                        var clonedNavbar = originalNavbar.cloneNode(true);
                        clonedNavbar.id = 'fixed-navbar';
                        clonedNavbar.classList.remove('relative');
                        clonedNavbar.classList.add('fixed');
                        clonedNavbar.classList.add('top-0');
                        clonedNavbar.classList.add('left-0');
                        clonedNavbar.classList.add('right-0');
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
                        var dropdowns = navbar.querySelectorAll('.dropdown');

                        for (var i = 0; i < dropdowns.length; i++) {
                            var dropdown = dropdowns[i];
                            var trigger = dropdown.querySelector('[tabindex="0"]');
                            var content = dropdown.querySelector('.dropdown-content');

                            if (trigger && content) {
                                (function(currentDropdown, currentTrigger, currentContent, allDropdowns) {
                                    currentTrigger.addEventListener('click', function(e) {
                                        e.preventDefault();
                                        e.stopPropagation();

                                        // Close all other dropdowns
                                        for (var j = 0; j < allDropdowns.length; j++) {
                                            if (allDropdowns[j] !== currentDropdown) {
                                                var otherContent = allDropdowns[j].querySelector(
                                                    '.dropdown-content');
                                                if (otherContent) {
                                                    otherContent.hidden = true;
                                                }
                                            }
                                        }

                                        // Toggle current dropdown
                                        currentContent.hidden = !currentContent.hidden;
                                    });
                                })(dropdown, trigger, content, dropdowns);
                            }
                        }

                        // Close dropdowns when clicking outside
                        document.addEventListener('click', function(e) {
                            if (!navbar.contains(e.target)) {
                                for (var k = 0; k < dropdowns.length; k++) {
                                    var content = dropdowns[k].querySelector('.dropdown-content');
                                    if (content) {
                                        content.hidden = true;
                                    }
                                }
                            }
                        });

                    } catch (error) {
                        console.error('Error initializing dropdowns:', error);
                    }
                }

                // Show fixed navbar with slide down animation
                function showFixedNavbar() {
                    if (!isFixed && fixedNavbarContainer) {
                        try {
                            createFixedNavbar();

                            // Add shadow to cloned navbar
                            var clonedNav = fixedNavbarContainer.querySelector('nav');
                            if (clonedNav) {
                                clonedNav.classList.add('shadow-lg');
                            }

                            // Use requestAnimationFrame for smooth animation
                            requestAnimationFrame(function() {
                                fixedNavbarContainer.classList.remove('-translate-y-full');
                                fixedNavbarContainer.classList.remove('opacity-0');
                                fixedNavbarContainer.classList.add('translate-y-0');
                                fixedNavbarContainer.classList.add('opacity-100');
                            });

                            isFixed = true;
                        } catch (error) {
                            console.error('Error showing fixed navbar:', error);
                        }
                    }
                }

                // Hide fixed navbar with slide up animation
                function hideFixedNavbar() {
                    if (isFixed && fixedNavbarContainer) {
                        try {
                            fixedNavbarContainer.classList.remove('translate-y-0');
                            fixedNavbarContainer.classList.remove('opacity-100');
                            fixedNavbarContainer.classList.add('-translate-y-full');
                            fixedNavbarContainer.classList.add('opacity-0');
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
                        var currentScrollY = window.scrollY || window.pageYOffset || 0;
                        var originalNavbarRect = originalNavbar.getBoundingClientRect();

                        // Check if original navbar is out of view (when it scrolls past the top)
                        var isOriginalNavbarOutOfView = originalNavbarRect.bottom <= 0;

                        // Debug logging (remove in production)
                        if (currentScrollY % 100 === 0) { // Log every 100px to avoid spam
                            console.log('Scroll debug:', {
                                scrollY: currentScrollY,
                                navbarBottom: originalNavbarRect.bottom,
                                isOutOfView: isOriginalNavbarOutOfView,
                                isFixed: isFixed
                            });
                        }

                        if (isOriginalNavbarOutOfView && !isFixed) {
                            console.log('Showing fixed navbar');
                            showFixedNavbar();
                        } else if (!isOriginalNavbarOutOfView && isFixed) {
                            console.log('Hiding fixed navbar');
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
                var ticking = false;

                function scrollHandler() {
                    if (!ticking) {
                        requestAnimationFrame(function() {
                            handleScroll();
                            ticking = false;
                        });
                        ticking = true;
                    }
                }

                // Event listeners
                window.addEventListener('scroll', scrollHandler);
                window.addEventListener('resize', updateNavbarHeight);
            });
        })();
    </script>
</body>

</html>
