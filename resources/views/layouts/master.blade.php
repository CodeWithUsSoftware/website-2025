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
    <div  id="app">
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
</body>

</html>
