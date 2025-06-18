@extends("welcome.layouts.app")
@section("content")
    <body class="min-h-screen text-white relative">

    <!-- Animated Background Particles -->
    <div class="parallax-bg">
        <div class="particle" style="left: 10%; animation-delay: 0s;"></div>
        <div class="particle" style="left: 20%; animation-delay: 2s;"></div>
        <div class="particle" style="left: 30%; animation-delay: 4s;"></div>
        <div class="particle" style="left: 40%; animation-delay: 6s;"></div>
        <div class="particle" style="left: 50%; animation-delay: 8s;"></div>
        <div class="particle" style="left: 60%; animation-delay: 10s;"></div>
        <div class="particle" style="left: 70%; animation-delay: 12s;"></div>
        <div class="particle" style="left: 80%; animation-delay: 14s;"></div>
        <div class="particle" style="left: 90%; animation-delay: 16s;"></div>
    </div>

    <!-- Header -->
    @include("components.public.header")
    <!-- Hero Section -->
    @include("welcome.components.hero")

    <!-- Categories Section -->
    @include("welcome.components.categories")
    <!-- Featured Games Grid -->
    @include("welcome.components.featured-games")
    <!-- Feature Cards Section -->
    @include("welcome.components.feature-cards")
    <!-- Footer -->
    @include("components.public.footer")

    @section("script")
        <script>
            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });

            // Add parallax effect to particles
            window.addEventListener('scroll', () => {
                const scrolled = window.pageYOffset;
                const parallax = document.querySelectorAll('.particle');
                parallax.forEach(element => {
                    const speed = 0.5;
                    element.style.transform = `translateY(${scrolled * speed}px)`;
                });
            });

            // Animate counters when in view
            const observerOptions = {
                threshold: 0.7
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const counter = entry.target;
                        const target = parseInt(counter.textContent.replace(/\D/g, ''));
                        const increment = target / 100;
                        let current = 0;

                        const timer = setInterval(() => {
                            current += increment;
                            if (current >= target) {
                                current = target;
                                clearInterval(timer);
                            }

                            if (counter.textContent.includes('M')) {
                                counter.textContent = Math.floor(current / 1000000) + 'M+';
                            } else if (counter.textContent.includes('K')) {
                                counter.textContent = Math.floor(current / 1000) + 'K+';
                            } else if (counter.textContent.includes('/')) {
                                counter.textContent = '24/7';
                            } else {
                                counter.textContent = Math.floor(current) + '+';
                            }
                        }, 20);
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.stats-counter').forEach(counter => {
                observer.observe(counter);
            });

            // Add hover effects to game cards
            document.querySelectorAll('.game-card').forEach(card => {
                card.addEventListener('mouseenter', function () {
                    this.style.transform = 'translateY(-20px) rotateY(5deg) scale(1.02)';
                });

                card.addEventListener('mouseleave', function () {
                    this.style.transform = 'translateY(0) rotateY(0) scale(1)';
                });
            });

            // Dynamic gradient animation speed
            let gradientSpeed = 8;
            const morphingElements = document.querySelectorAll('.morphing-gradient');

            morphingElements.forEach(element => {
                element.addEventListener('mouseenter', () => {
                    element.style.animationDuration = '2s';
                });

                element.addEventListener('mouseleave', () => {
                    element.style.animationDuration = '8s';
                });
            });

            // Add loading animation to buttons
            document.querySelectorAll('button').forEach(button => {
                button.addEventListener('click', function (e) {
                    if (!this.classList.contains('loading')) {
                        this.classList.add('loading');

                        const ripple = document.createElement('span');
                        const rect = this.getBoundingClientRect();
                        const size = Math.max(rect.width, rect.height);
                        const x = e.clientX - rect.left - size / 2;
                        const y = e.clientY - rect.top - size / 2;

                        ripple.style.width = ripple.style.height = size + 'px';
                        ripple.style.left = x + 'px';
                        ripple.style.top = y + 'px';
                        ripple.classList.add('ripple');

                        this.appendChild(ripple);

                        setTimeout(() => {
                            ripple.remove();
                            this.classList.remove('loading');
                        }, 600);
                    }
                });
            });

            // Add search functionality
            const searchButton = document.querySelector('button svg').parentElement;
            searchButton.addEventListener('click', function () {
                const searchOverlay = document.createElement('div');
                searchOverlay.className = 'fixed inset-0 bg-black/80 backdrop-blur-sm z-50 flex items-center justify-center';
                searchOverlay.innerHTML = `
            <div class="glass-dark p-8 rounded-3xl max-w-2xl w-full mx-4">
                <div class="flex items-center space-x-4 mb-6">
                    <svg class="w-6 h-6 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <input type="text" placeholder="Oyun ara..." class="bg-transparent text-xl flex-1 outline-none text-white placeholder-gray-400">
                    <button onclick="this.closest('.fixed').remove()" class="text-gray-400 hover:text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="text-gray-400 text-sm">
                    Popüler aramalar: Cyberpunk 2077, Call of Duty, GTA V, FIFA 2024
                </div>
            </div>
        `;
                document.body.appendChild(searchOverlay);

                searchOverlay.querySelector('input').focus();

                searchOverlay.addEventListener('click', function (e) {
                    if (e.target === searchOverlay) {
                        searchOverlay.remove();
                    }
                });
            });
        </script>

        <style>
            .ripple {
                position: absolute;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.3);
                transform: scale(0);
                animation: rippleEffect 0.6s linear;
                pointer-events: none;
            }

            @keyframes rippleEffect {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }

            .loading {
                position: relative;
                overflow: hidden;
            }

            /* Custom scrollbar */
            ::-webkit-scrollbar {
                width: 8px;
            }

            ::-webkit-scrollbar-track {
                background: rgba(0, 0, 0, 0.1);
            }

            ::-webkit-scrollbar-thumb {
                background: linear-gradient(135deg, #667eea, #764ba2);
                border-radius: 4px;
            }

            ::-webkit-scrollbar-thumb:hover {
                background: linear-gradient(135deg, #764ba2, #667eea);
            }

            /* Selection color */
            ::selection {
                background: rgba(102, 126, 234, 0.3);
                color: white;
            }

            /* Focus styles */
            button:focus, a:focus {
                outline: 2px solid rgba(102, 126, 234, 0.5);
                outline-offset: 2px;
            }
        </style>
@endsection
@endsection
