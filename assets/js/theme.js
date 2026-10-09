/**
 * NemesisNet Theme JavaScript
 * Handles Theme Toggle, Mobile Menu, Scrollspy, and other UI interactions.
 */

(function () {
    'use strict';
    console.log('NemesisNet Theme JS Loaded');

    document.addEventListener('DOMContentLoaded', function () {
        // Back to Top Button Logic
        const backToTopButton = document.getElementById('back-to-top');

        if (backToTopButton) {
            window.addEventListener('scroll', () => {
                if (window.scrollY > 300) {
                    backToTopButton.classList.add('visible');
                } else {
                    backToTopButton.classList.remove('visible');
                }
            });

            backToTopButton.addEventListener('click', () => {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        }

        // Theme Toggle
        const themeToggle = document.getElementById('theme-toggle');
        const themeToggleIcon = document.getElementById('theme-toggle-icon');
        const STYLE_STORAGE_KEY = 'nemesis-theme-mode';

        function setLight(light) {
            if (light) {
                document.documentElement.setAttribute('data-theme', 'light');
            } else {
                document.documentElement.removeAttribute('data-theme');
            }

            if (themeToggle) {
                themeToggle.classList.toggle('is-light', light);
                themeToggle.setAttribute('aria-pressed', String(light));
                themeToggle.setAttribute('aria-label', light ? 'Switch to dark mode' : 'Switch to light mode');
                themeToggle.setAttribute('title', light ? 'Switch to dark mode' : 'Switch to light mode');
            }

            if (themeToggleIcon) {
                themeToggleIcon.classList.toggle('fa-sun', light);
                themeToggleIcon.classList.toggle('fa-moon', !light);
            }

            localStorage.setItem(STYLE_STORAGE_KEY, light ? 'light' : 'dark');
        }

        if (themeToggle) {
            themeToggle.addEventListener('click', () => {
                const isLight = document.documentElement.getAttribute('data-theme') === 'light';
                setLight(!isLight);
            });
        }

        // Init theme
        const savedTheme = localStorage.getItem(STYLE_STORAGE_KEY);
        const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

        if (savedTheme === 'light') {
            setLight(true);
        } else if (savedTheme === 'dark') {
            setLight(false);
        } else {
            setLight(!prefersDark); // Default to system preference if no save
        }

        // Header Search Toggle (simple inline collapse)
        const searchToggle = document.getElementById('search-toggle');
        const headerSearch = document.getElementById('header-search');
        if (searchToggle && headerSearch) {
            const searchField = headerSearch.querySelector('.search-field');
            const setSearchState = (open) => {
                headerSearch.classList.toggle('is-open', open);
                searchToggle.setAttribute('aria-expanded', open ? 'true' : 'false');
                if (open && searchField) {
                    searchField.focus();
                }
            };

            // Start closed
            setSearchState(false);

            searchToggle.addEventListener('click', (e) => {
                e.preventDefault();
                const isOpen = headerSearch.classList.contains('is-open');
                setSearchState(!isOpen);
            });

            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') {
                    setSearchState(false);
                }
            });
        }

        // Mobile Menu Toggle
        const menuToggle = document.getElementById('menu-toggle');
        const mobileNavOverlay = document.getElementById('mobile-nav-overlay');
        const mobileNavClose = document.getElementById('mobile-nav-close');

        const setMenuState = (open) => {
            if (menuToggle) {
                menuToggle.classList.toggle('is-active', open);
            }
            if (mobileNavOverlay) {
                mobileNavOverlay.classList.toggle('active', open);
            }
            if (menuToggle) {
                menuToggle.setAttribute('aria-expanded', open ? 'true' : 'false');
            }
            document.body.classList.toggle('nav-open', open);
        };

        if (menuToggle && mobileNavOverlay) {
            setMenuState(false);
            menuToggle.addEventListener('click', function () {
                const nextState = !menuToggle.classList.contains('is-active');
                setMenuState(nextState);
            });
        }

        if (mobileNavClose && mobileNavOverlay) {
            mobileNavClose.addEventListener('click', function () {
                setMenuState(false);
            });
        }

        // Footer Dates
        const now = new Date();
        const monthName = now.toLocaleString('default', { month: 'long' });
        const footerYear = document.getElementById('footer-year');
        const footerMonth = document.getElementById('footer-month');

        if (footerYear) footerYear.textContent = now.getFullYear();
        if (footerMonth) footerMonth.textContent = monthName;

        // Carousel Logic
        const track = document.querySelector('.carousel-track');
        if (track) {
            const slides = Array.from(track.children);
            const nextButton = document.querySelector('.carousel-button--right');
            const prevButton = document.querySelector('.carousel-button--left');
            const dotsNav = document.querySelector('.carousel-nav');
            const dots = Array.from(dotsNav.children);

            const slideWidth = slides[0].getBoundingClientRect().width;

            // Arrange slides next to one another
            const setSlidePosition = (slide, index) => {
                slide.style.left = slideWidth * index + 'px';
            };
            slides.forEach(setSlidePosition);

            const moveToSlide = (track, currentSlide, targetSlide) => {
                track.style.transform = 'translateX(-' + targetSlide.style.left + ')';
                currentSlide.classList.remove('current-slide');
                targetSlide.classList.add('current-slide');
            };

            const updateDots = (currentDot, targetDot) => {
                currentDot.classList.remove('current-slide');
                targetDot.classList.add('current-slide');
            };

            const hideShowArrows = (slides, prevButton, nextButton, targetIndex) => {
                if (targetIndex === 0) {
                    prevButton.classList.add('is-hidden');
                    nextButton.classList.remove('is-hidden');
                } else if (targetIndex === slides.length - 1) {
                    prevButton.classList.remove('is-hidden');
                    nextButton.classList.add('is-hidden');
                } else {
                    prevButton.classList.remove('is-hidden');
                    nextButton.classList.remove('is-hidden');
                }
            };

            // Next Button
            nextButton.addEventListener('click', e => {
                const currentSlide = track.querySelector('.current-slide');
                const nextSlide = currentSlide.nextElementSibling;
                const currentDot = dotsNav.querySelector('.current-slide');
                const nextDot = currentDot.nextElementSibling;
                const nextIndex = slides.findIndex(slide => slide === nextSlide);

                moveToSlide(track, currentSlide, nextSlide);
                updateDots(currentDot, nextDot);
                hideShowArrows(slides, prevButton, nextButton, nextIndex);
            });

            // Prev Button
            prevButton.addEventListener('click', e => {
                const currentSlide = track.querySelector('.current-slide');
                const prevSlide = currentSlide.previousElementSibling;
                const currentDot = dotsNav.querySelector('.current-slide');
                const prevDot = currentDot.previousElementSibling;
                const prevIndex = slides.findIndex(slide => slide === prevSlide);

                moveToSlide(track, currentSlide, prevSlide);
                updateDots(currentDot, prevDot);
                hideShowArrows(slides, prevButton, nextButton, prevIndex);
            });

            // Dots
            dotsNav.addEventListener('click', e => {
                const targetDot = e.target.closest('button');
                if (!targetDot) return;

                const currentSlide = track.querySelector('.current-slide');
                const currentDot = dotsNav.querySelector('.current-slide');
                const targetIndex = dots.findIndex(dot => dot === targetDot);
                const targetSlide = slides[targetIndex];

                moveToSlide(track, currentSlide, targetSlide);
                updateDots(currentDot, targetDot);
                hideShowArrows(slides, prevButton, nextButton, targetIndex);
            });
        }

        // Scrollspy
        const headers = document.querySelectorAll('h2[id], h3[id]');
        const navLinks = document.querySelectorAll('.docs-nav a');

        if (headers.length > 0 && navLinks.length > 0) {
            window.addEventListener('scroll', () => {
                let current = '';
                headers.forEach(header => {
                    const sectionTop = header.offsetTop;
                    if (window.scrollY >= (sectionTop - 150)) {
                        current = header.getAttribute('id');
                    }
                });

                if (current) {
                    navLinks.forEach(link => {
                        link.classList.remove('active');
                        if (link.getAttribute('href') === '#' + current) {
                            link.classList.add('active');
                        }
                    });
                }
            });
        }

        // Copy to Clipboard
        document.querySelectorAll('pre').forEach(pre => {
            const button = document.createElement('button');
            button.className = 'copy-button';
            button.innerHTML = '<i class="fas fa-copy"></i> Copy';

            button.addEventListener('click', () => {
                const code = pre.querySelector('code');
                const text = code ? code.innerText : pre.innerText;

                navigator.clipboard.writeText(text).then(() => {
                    button.innerHTML = '<i class="fas fa-check"></i> Copied!';
                    setTimeout(() => {
                        button.innerHTML = '<i class="fas fa-copy"></i> Copy';
                    }, 2000);
                });
            });

            pre.appendChild(button);
        });

    });

})();
