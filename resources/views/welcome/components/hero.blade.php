<section class="pt-32 pb-20 px-6 relative overflow-hidden">
    <div class="container mx-auto text-center max-w-6xl">
        <div class="floating-animation">
            <h1 class="text-6xl md:text-8xl font-bold mb-8 leading-tight">
                {{$settings["hero_text_area1"]}}
                <span class="hero-text block">{{$settings["hero_text_area2"]}}</span>
                {{$settings["hero_text_area3"]}}
            </h1>
        </div>

        <div class="floating-delay">
            <p class="text-xl md:text-2xl text-gray-300 mb-12 max-w-4xl mx-auto leading-relaxed">
                {{$settings["hero_description"]}}
            </p>
        </div>

        <div class="flex flex-wrap justify-center gap-6 mb-16">
            <div class="glass-dark px-8 py-4 rounded-2xl hover-lift">
                <div class="stats-counter text-3xl font-bold text-cyan-400">200+</div>
                <div class="text-sm text-gray-400">Oyun Arşivi</div>
            </div>
            <div class="glass-dark px-8 py-4 rounded-2xl hover-lift">
                <div class="stats-counter text-3xl font-bold text-purple-400">1M+</div>
                <div class="text-sm text-gray-400">Kullanıcı</div>
            </div>
            <div class="glass-dark px-8 py-4 rounded-2xl hover-lift">
                <div class="stats-counter text-3xl font-bold text-pink-400">7/24</div>
                <div class="text-sm text-gray-400">Destek</div>
            </div>
        </div>

        <button class="morphing-gradient px-12 py-4 rounded-2xl font-semibold text-xl text-white hover:scale-110 transition-all duration-300 neon-glow">
            🎮 Oyunları Keşfet
        </button>
    </div>
</section>
