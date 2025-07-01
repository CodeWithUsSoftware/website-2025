// Fixed Navbar Functionality
(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {
        var originalNavbar = document.getElementById('original-navbar');
        var fixedNavbarContainer = document.getElementById('fixed-navbar-container');

        // Check if required elements exist
        if (!originalNavbar || !fixedNavbarContainer) {
            return;
        }

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
                        (function (currentDropdown, currentTrigger, currentContent, allDropdowns) {
                            currentTrigger.addEventListener('click', function (e) {
                                e.preventDefault();
                                e.stopPropagation();

                                // Close all other dropdowns
                                for (var j = 0; j < allDropdowns.length; j++) {
                                    if (allDropdowns[j] !== currentDropdown) {
                                        var otherContent = allDropdowns[j].querySelector('.dropdown-content');
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
                document.addEventListener('click', function (e) {
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
                    requestAnimationFrame(function () {
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

                // Check if original navbar is out of view
                var isOriginalNavbarOutOfView = originalNavbarRect.bottom < -threshold;

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
        var ticking = false;
        function scrollHandler() {
            if (!ticking) {
                requestAnimationFrame(function () {
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
