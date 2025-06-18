<section class="py-20 px-6">
    <div class="container mx-auto">
        <h2 class="text-center text-4xl md:text-5xl font-bold mb-16">
            <span class="hero-text">EN POPÜLER OYUNLAR</span>
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6 mb-12">
            <!-- Dynamic Game Cards from Database -->
            @if(isset($games) && count($games) > 0)
                @foreach($games as $game)
                    <div class="game-card glass-dark rounded-3xl overflow-hidden border border-white/10">
                        <div class="relative">
                            <img
                                src="{{ $game['image'] ?? 'https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=400&h=500&fit=crop' }}"
                                alt="{{ $game['title'] }}" class="w-full h-64 object-cover">
                            @if(isset($game['badge']))
                                <div
                                    class="absolute top-4 left-4 bg-gradient-to-r {{ $game['badge_color'] ?? 'from-yellow-400 to-orange-500' }} text-white text-xs px-3 py-1 rounded-full font-bold">
                                    {{ $game['badge'] }}
                                </div>
                            @endif
                            <div class="absolute bottom-4 right-4 glass px-3 py-1 rounded-full text-xs">
                                ⭐ {{ $game['rating'] ?? '4.5' }}
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="font-bold text-lg mb-2">{{ $game['title'] }}</h3>
                            <p class="text-gray-400 text-sm mb-4">{{ $game['description'] ?? 'Harika bir oyun deneyimi' }}</p>
                            <div class="flex items-center justify-between">
                                <span class="text-cyan-400 font-mono text-sm">{{ $game['size'] ?? 'N/A' }}</span>
                                <button
                                    class="bg-gradient-to-r from-cyan-500 to-blue-500 px-4 py-2 rounded-xl text-xs font-semibold hover:scale-105 transition-all">
                                    İNDİR
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <!-- Fallback static games if no database data -->
                <div class="game-card glass-dark rounded-3xl overflow-hidden border border-white/10">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=400&h=500&fit=crop"
                             alt="Cyberpunk 2077" class="w-full h-64 object-cover">
                        <div
                            class="absolute top-4 left-4 bg-gradient-to-r from-yellow-400 to-orange-500 text-black text-xs px-3 py-1 rounded-full font-bold">
                            🆕 YENİ
                        </div>
                        <div class="absolute bottom-4 right-4 glass px-3 py-1 rounded-full text-xs">
                            ⭐ 4.9
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-lg mb-2">Cyberpunk 2077</h3>
                        <p class="text-gray-400 text-sm mb-4">Gelecek dünyasında aksiyon</p>
                        <div class="flex items-center justify-between">
                            <span class="text-cyan-400 font-mono text-sm">70GB</span>
                            <button
                                class="bg-gradient-to-r from-cyan-500 to-blue-500 px-4 py-2 rounded-xl text-xs font-semibold hover:scale-105 transition-all">
                                İNDİR
                            </button>
                        </div>
                    </div>
                </div>

                <div class="game-card glass-dark rounded-3xl overflow-hidden border border-white/10">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1511512578047-dfb367046420?w=400&h=500&fit=crop"
                             alt="Call of Duty" class="w-full h-64 object-cover">
                        <div
                            class="absolute top-4 left-4 bg-gradient-to-r from-red-500 to-pink-500 text-white text-xs px-3 py-1 rounded-full font-bold">
                            🔥 POPÜLER
                        </div>
                        <div class="absolute bottom-4 right-4 glass px-3 py-1 rounded-full text-xs">
                            ⭐ 4.8
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-lg mb-2">Call of Duty MW2</h3>
                        <p class="text-gray-400 text-sm mb-4">FPS aksiyon oyunu</p>
                        <div class="flex items-center justify-between">
                            <span class="text-purple-400 font-mono text-sm">128GB</span>
                            <button
                                class="bg-gradient-to-r from-purple-500 to-pink-500 px-4 py-2 rounded-xl text-xs font-semibold hover:scale-105 transition-all">
                                İNDİR
                            </button>
                        </div>
                    </div>
                </div>

                <div class="game-card glass-dark rounded-3xl overflow-hidden border border-white/10">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1542751371-adc38448a05e?w=400&h=500&fit=crop"
                             alt="Black Ops" class="w-full h-64 object-cover">
                        <div
                            class="absolute top-4 left-4 bg-gradient-to-r from-green-500 to-emerald-500 text-white text-xs px-3 py-1 rounded-full font-bold">
                            👑 KLASİK
                        </div>
                        <div class="absolute bottom-4 right-4 glass px-3 py-1 rounded-full text-xs">
                            ⭐ 4.7
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-lg mb-2">Black Ops 2</h3>
                        <p class="text-gray-400 text-sm mb-4">Klasik FPS deneyimi</p>
                        <div class="flex items-center justify-between">
                            <span class="text-green-400 font-mono text-sm">16GB</span>
                            <button
                                class="bg-gradient-to-r from-green-500 to-emerald-500 px-4 py-2 rounded-xl text-xs font-semibold hover:scale-105 transition-all">
                                İNDİR
                            </button>
                        </div>
                    </div>
                </div>

                <div class="game-card glass-dark rounded-3xl overflow-hidden border border-white/10">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1558618047-3c8c76ca7d13?w=400&h=500&fit=crop"
                             alt="CarX Drift" class="w-full h-64 object-cover">
                        <div
                            class="absolute top-4 left-4 bg-gradient-to-r from-blue-500 to-cyan-500 text-white text-xs px-3 py-1 rounded-full font-bold">
                            🏎️ YARIŞ
                        </div>
                        <div class="absolute bottom-4 right-4 glass px-3 py-1 rounded-full text-xs">
                            ⭐ 4.6
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-lg mb-2">CarX Drift Racing</h3>
                        <p class="text-gray-400 text-sm mb-4">Drift yarış oyunu</p>
                        <div class="flex items-center justify-between">
                            <span class="text-blue-400 font-mono text-sm">8GB</span>
                            <button
                                class="bg-gradient-to-r from-blue-500 to-cyan-500 px-4 py-2 rounded-xl text-xs font-semibold hover:scale-105 transition-all">
                                İNDİR
                            </button>
                        </div>
                    </div>
                </div>

                <div class="game-card glass-dark rounded-3xl overflow-hidden border border-white/10">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1493711662062-fa541adb3fc8?w=400&h=500&fit=crop"
                             alt="Far Cry 3" class="w-full h-64 object-cover">
                        <div
                            class="absolute top-4 left-4 bg-gradient-to-r from-orange-500 to-red-500 text-white text-xs px-3 py-1 rounded-full font-bold">
                            🌴 AÇIK DÜNYA
                        </div>
                        <div class="absolute bottom-4 right-4 glass px-3 py-1 rounded-full text-xs">
                            ⭐ 4.8
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-lg mb-2">Far Cry 3</h3>
                        <p class="text-gray-400 text-sm mb-4">Tropikal ada macerası</p>
                        <div class="flex items-center justify-between">
                            <span class="text-orange-400 font-mono text-sm">15GB</span>
                            <button
                                class="bg-gradient-to-r from-orange-500 to-red-500 px-4 py-2 rounded-xl text-xs font-semibold hover:scale-105 transition-all">
                                İNDİR
                            </button>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <!-- Load More Button -->
        <div class="text-center">
            <button
                class="glass-dark px-10 py-4 rounded-2xl font-semibold text-lg hover:neon-glow hover:scale-105 transition-all duration-300">
                ✨ Daha Fazla Oyun Yükle
            </button>
        </div>
    </div>
</section>
