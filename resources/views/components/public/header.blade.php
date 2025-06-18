<header class="glass fixed top-0 w-full z-50 border-b border-white/10">
    <nav class="container mx-auto px-6 py-4">
        <div class="flex items-center justify-between">
            {{-- Logo Bölümü --}}
            <div class="flex items-center space-x-4">
                <div class="flex items-center space-x-3">
                    <div
                        class="w-14 h-14 morphing-gradient rounded-2xl flex items-center justify-center text-2xl pulse-glow">
                        🎮
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold neon-text">{{$setting['site_name']}}</h1>
                        <p class="text-xs text-cyan-400 font-mono">{{$setting["site_subtitle"]}}</p>
                    </div>
                </div>
            </div>

            {{-- Desktop Menü --}}
            <div class="hidden md:flex items-center space-x-8">
                @foreach($menuItems as $menuItem)
                    @if(!$menuItem['has_children'])
                        {{-- Tek seviye menü öğesi --}}
                        <a href="{{ $menuItem['link'] }}"
                           target="{{ $menuItem['target'] }}"
                           class="text-gray-300 hover:text-cyan-400 transition-all duration-300 relative group {{ request()->is(ltrim($menuItem['link'], '/')) ? 'text-cyan-400' : '' }}">
                            {{ $menuItem['title'] }}
                            <span
                                class="absolute -bottom-1 left-0 w-0 h-0.5 bg-cyan-400 transition-all duration-300 group-hover:w-full {{ request()->is(ltrim($menuItem['link'], '/')) ? 'w-full' : '' }}"></span>
                        </a>
                    @else
                        {{-- Dropdown menü --}}
                        <div class="relative group">
                            <a href="{{ $menuItem['link'] !== '#' ? $menuItem['link'] : 'javascript:void(0)' }}"
                               @if($menuItem['link'] !== '#') target="{{ $menuItem['target'] }}" @endif
                               class="text-gray-300 hover:text-pink-400 transition-all duration-300 flex items-center cursor-pointer">
                                {{ $menuItem['title'] }}
                                <svg class="w-4 h-4 ml-1 transition-transform group-hover:rotate-180" fill="none"
                                     stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </a>

                            {{-- Dropdown İçeriği --}}
                            <div
                                class="absolute top-full left-0 mt-2 w-64 bg-gray-900/95 backdrop-blur-xl rounded-xl border border-white/20 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0 shadow-2xl z-50">
                                <div class="p-4 space-y-2 max-h-96 overflow-y-auto">
                                    @foreach($menuItem['children'] as $subItem)
                                        <a href="{{ $subItem['link'] }}"
                                           target="{{ $subItem['target'] }}"
                                           class="block px-4 py-3 text-gray-100 hover:text-pink-300 hover:bg-white/10 rounded-lg transition-all duration-200 border-l-2 border-transparent hover:border-pink-400 {{ request()->is(ltrim($subItem['link'], '/')) ? 'border-pink-400 text-pink-300 bg-white/10' : '' }}">
                                            <div class="flex items-center">
                                                <span class="text-pink-400 mr-2 transition-all duration-200">▸</span>
                                                {{ $subItem['title'] }}
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            {{-- Sağ Taraf Butonları --}}
            <div class="flex items-end justify-end space-x-4 w-32">
                {{-- Arama Butonu --}}
                <button class="glass p-3 rounded-xl  hover:neon-glow transition-all duration-300" title="Arama">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </button>

                {{-- Mobile menü butonu --}}
                <button class="md:hidden glass p-3 rounded-xl hover:neon-glow transition-all duration-300"
                        id="mobile-menu-btn" title="Menü">
                    <svg class="w-5 h-5 transition-transform" id="mobile-menu-icon" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        {{-- Mobile Menü --}}
        <div
            class="md:hidden mt-4 bg-gray-900/95 backdrop-blur-xl rounded-xl border border-white/20 hidden transition-all duration-300 max-h-screen overflow-y-auto"
            id="mobile-menu">
            <div class="p-4 space-y-2">
                @foreach($menuItems as $menuItem)
                    @if(!$menuItem['has_children'])
                        {{-- Tek seviye mobile menü --}}
                        <a href="{{ $menuItem['link'] }}"
                           target="{{ $menuItem['target'] }}"
                           class="block px-4 py-3 text-gray-300 hover:text-cyan-400 hover:bg-white/5 rounded-lg transition-all duration-200 {{ request()->is(ltrim($menuItem['link'], '/')) ? 'text-cyan-400 bg-white/5' : '' }}">
                            {{ $menuItem['title'] }}
                        </a>
                    @else
                        {{-- Mobile dropdown --}}
                        <div class="mobile-dropdown">
                            <button
                                class="w-full flex items-center justify-between px-4 py-3 text-gray-300 hover:text-pink-400 hover:bg-white/5 rounded-lg transition-all duration-200 mobile-dropdown-btn"
                                type="button">
                                {{ $menuItem['title'] }}
                                <svg class="w-4 h-4 transition-transform mobile-dropdown-icon" fill="none"
                                     stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div class="mobile-dropdown-content hidden pl-6 pt-2 space-y-1 transition-all duration-300">
                                @foreach($menuItem['children'] as $subItem)
                                    <a href="{{ $subItem['link'] }}"
                                       target="{{ $subItem['target'] }}"
                                       class="block px-4 py-2 text-gray-400 hover:text-pink-400 hover:bg-white/5 rounded-lg transition-all duration-200 text-sm {{ request()->is(ltrim($subItem['link'], '/')) ? 'text-pink-400 bg-white/5' : '' }}">
                                        <span class="text-pink-400 mr-2">▸</span>
                                        {{ $subItem['title'] }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </nav>
</header>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Mobile menu toggle
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');
            const mobileMenuIcon = document.getElementById('mobile-menu-icon');

            if (mobileMenuBtn && mobileMenu) {
                mobileMenuBtn.addEventListener('click', function (e) {
                    e.preventDefault();
                    e.stopPropagation();

                    const isHidden = mobileMenu.classList.contains('hidden');
                    mobileMenu.classList.toggle('hidden');

                    // Icon animation
                    if (mobileMenuIcon) {
                        if (isHidden) {
                            mobileMenuIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>';
                        } else {
                            mobileMenuIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>';
                        }
                    }
                });
            }

            // Mobile dropdown functionality - Geliştirilmiş
            const mobileDropdownBtns = document.querySelectorAll('.mobile-dropdown-btn');

            mobileDropdownBtns.forEach((btn, index) => {
                btn.addEventListener('click', function (e) {
                    e.preventDefault();
                    e.stopPropagation();

                    const content = this.nextElementSibling;
                    const icon = this.querySelector('.mobile-dropdown-icon');

                    // Tüm diğer dropdown'ları kapat
                    mobileDropdownBtns.forEach((otherBtn, otherIndex) => {
                        if (otherIndex !== index) {
                            const otherContent = otherBtn.nextElementSibling;
                            const otherIcon = otherBtn.querySelector('.mobile-dropdown-icon');

                            if (otherContent && !otherContent.classList.contains('hidden')) {
                                otherContent.classList.add('hidden');
                                if (otherIcon) {
                                    otherIcon.classList.remove('rotate-180');
                                }
                            }
                        }
                    });

                    // Mevcut dropdown'ı aç/kapat
                    if (content) {
                        content.classList.toggle('hidden');

                        if (icon) {
                            icon.classList.toggle('rotate-180');
                        }
                    }
                });
            });

            // Close mobile menu when clicking outside
            document.addEventListener('click', function (event) {
                if (mobileMenu && !mobileMenu.contains(event.target) && !mobileMenuBtn.contains(event.target)) {
                    mobileMenu.classList.add('hidden');
                    if (mobileMenuIcon) {
                        mobileMenuIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>';
                    }

                    // Tüm dropdown'ları kapat
                    const openDropdowns = document.querySelectorAll('.mobile-dropdown-content:not(.hidden)');
                    openDropdowns.forEach(dropdown => {
                        dropdown.classList.add('hidden');
                        const btn = dropdown.previousElementSibling;
                        const icon = btn?.querySelector('.mobile-dropdown-icon');
                        if (icon) {
                            icon.classList.remove('rotate-180');
                        }
                    });
                }
            });

            // Prevent dropdown links from closing the menu immediately
            const dropdownLinks = document.querySelectorAll('.mobile-dropdown-content a');
            dropdownLinks.forEach(link => {
                link.addEventListener('click', function (e) {
                    // Link'e tıklandığında dropdown'ı kapat ama menüyü açık bırak
                    const dropdown = this.closest('.mobile-dropdown-content');
                    const btn = dropdown?.previousElementSibling;
                    const icon = btn?.querySelector('.mobile-dropdown-icon');

                    if (dropdown) {
                        dropdown.classList.add('hidden');
                    }
                    if (icon) {
                        icon.classList.remove('rotate-180');
                    }
                });
            });
        });
    </script>
@endpush

@push('styles')
    <style>
        .mobile-dropdown-icon {
            transition: transform 0.3s ease;
        }

        .mobile-dropdown-content {
            transition: all 0.3s ease;
            max-height: 0;
            overflow: hidden;
        }

        .mobile-dropdown-content:not(.hidden) {
            max-height: 500px;
            overflow-y: auto;
        }

        /* Desktop dropdown hover effects */
        .group:hover .group-hover\:opacity-100 {
            opacity: 1;
        }

        .group:hover .group-hover\:visible {
            visibility: visible;
        }

        .group:hover .group-hover\:translate-y-0 {
            transform: translateY(0);
        }

        .group:hover .group-hover\:rotate-180 {
            transform: rotate(180deg);
        }

        /* Active link styling */
        .text-cyan-400 {
            text-shadow: 0 0 10px rgba(34, 211, 238, 0.5);
        }

        .text-pink-400 {
            text-shadow: 0 0 10px rgba(244, 114, 182, 0.5);
        }

        .text-pink-300 {
            text-shadow: 0 0 8px rgba(249, 168, 212, 0.4);
        }

        /* Enhanced dropdown shadow and backdrop */
        .shadow-2xl {
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.4),
            0 0 0 1px rgba(255, 255, 255, 0.1),
            inset 0 1px 0 rgba(255, 255, 255, 0.1);
        }

        /* Improved backdrop blur for better readability */
        .backdrop-blur-xl {
            backdrop-filter: blur(16px) saturate(180%);
            -webkit-backdrop-filter: blur(16px) saturate(180%);
        }

        /* Additional styling for dropdown readability */
        .bg-gray-900\/95 {
            background-color: rgba(17, 24, 39, 0.95);
        }

        /* Ensure text is always readable */
        .dropdown-text {
            color: #f3f4f6;
            font-weight: 500;
        }

        .dropdown-text:hover {
            color: #fce7f3;
        }

        /* Mobile menu scroll */
        #mobile-menu {
            max-height: calc(100vh - 120px);
        }

        /* Dropdown z-index fix */
        .group > div {
            z-index: 1000;
        }

        /* Mobile dropdown animation */
        .mobile-dropdown-content {
            transform-origin: top;
        }

        .mobile-dropdown-content.hidden {
            max-height: 0;
            padding-top: 0;
            margin-top: 0;
        }

        .mobile-dropdown-content:not(.hidden) {
            animation: slideDown 0.3s ease-out;
        }

        @keyframes slideDown {
            from {
                max-height: 0;
                opacity: 0;
            }
            to {
                max-height: 500px;
                opacity: 1;
            }
        }
    </style>
@endpush
