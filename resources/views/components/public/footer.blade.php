<footer class="glass-dark dark:border-white/10 border-gray-300 py-16 px-6 mt-20">
    <div class="container mx-auto">
        <div class="grid md:grid-cols-4 gap-8">
            <div>
                <div class="flex items-center space-x-3 mb-6">
                    <div class="w-12 h-12 morphing-gradient rounded-2xl flex items-center justify-center text-xl">
                        🎮
                    </div>
                    <div>
                        <h3 class="text-xl font-bold neon-text">TORRENT</h3>
                        <p class="text-xs text-cyan-400 font-mono">OYUN İNDİR</p>
                    </div>
                </div>
                <p class="dark:text-gray-400 text-gray-600">Güvenli ve hızlı torrent oyun indirme deneyimi için #1
                    platform.</p>
            </div>

            <div>
                <h4 class="font-semibold mb-6 text-lg text-purple-400">🎯 Kategoriler</h4>
                <ul class="space-y-3 dark:text-gray-400 text-gray-600">
                    <li><a href="#" class="hover:text-purple-400 transition-colors">Aksiyon Oyunları</a></li>
                    <li><a href="#" class="hover:text-purple-400 transition-colors">Strateji Oyunları</a></li>
                    <li><a href="#" class="hover:text-purple-400 transition-colors">Yarış Oyunları</a></li>
                    <li><a href="#" class="hover:text-purple-400 transition-colors">Spor Oyunları</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-semibold mb-6 text-lg text-cyan-400">🚀 Destek</h4>
                <ul class="space-y-3 dark:text-gray-400 text-gray-600">
                    <li><a href="#" class="hover:text-cyan-400 transition-colors">Torrent Kurulum Rehberi</a></li>
                    <li><a href="#" class="hover:text-cyan-400 transition-colors">Sık Sorulan Sorular</a></li>
                    <li><a href="#" class="hover:text-cyan-400 transition-colors">Canlı Destek</a></li>
                    <li><a href="#" class="hover:text-cyan-400 transition-colors">Gizlilik Politikası</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-semibold mb-6 text-lg text-green-400">✨ Özellikler</h4>
                <ul class="space-y-3 dark:text-gray-400 text-gray-600 text-sm">
                    <li>• %100 Virüssüz İçerik</li>
                    <li>• Ultra Hızlı İndirme</li>
                    <li>• Günlük Oyun Güncellemeleri</li>
                    <li>• 24/7 Premium Destek</li>
                </ul>
            </div>
        </div>

        <div class="dark:border-white/10 border-gray-300 mt-12 pt-8 text-center">
            <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                <p class="dark:text-gray-400 text-gray-600 text-sm">
                    &copy; 2025 Torrent Oyun İndir. Tüm hakları saklıdır. <br> Bu sitede yer alan dosyalar sunucularımızda
                    barındırılmamaktadır. Tüm içerikler, yalnızca internet üzerinde halihazırda <br> bulunan bağlantılara
                    yönlendirme amacı taşır. Telif hakkı içeren bir içeriğin kaldırılmasını talep ediyorsanız, bizimle
                    iletişime geçiniz.
                </p>
                <div class="flex space-x-6">
                    <button
                        class="glass px-4 py-2 rounded-xl text-sm hover:neon-glow transition-all dark:text-white text-gray-800">
                        🔔 Bildirimleri Aç
                    </button>
                    <button
                        id="darkModeToggle"
                        class="glass px-4 py-2 rounded-xl text-sm hover:neon-glow transition-all dark:text-white text-gray-800"
                    >
                        <span class="dark:hidden">🌙 Karanlık Mod</span>
                        <span class="hidden dark:inline">☀️ Aydınlık Mod</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</footer>

<script>
    // Karanlık mod toggle fonksiyonu
    const darkModeToggle = document.getElementById('darkModeToggle');
    const htmlElement = document.documentElement;

    // Sayfa yüklendiğinde localStorage'dan tema tercihini al
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme) {
        htmlElement.className = savedTheme;
    }

    darkModeToggle.addEventListener('click', () => {
        if (htmlElement.classList.contains('dark')) {
            htmlElement.classList.remove('dark');
            htmlElement.classList.add('light');
            localStorage.setItem('theme', 'light');
        } else {
            htmlElement.classList.remove('light');
            htmlElement.classList.add('dark');
            localStorage.setItem('theme', 'dark');
        }
    });
</script>
