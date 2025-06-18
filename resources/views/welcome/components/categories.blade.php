<section class="py-20 px-6">
    <div class="container mx-auto">
        <h2 class="text-center text-4xl md:text-5xl font-bold mb-16 neon-text">
            KATEGORİLER
        </h2>

        <div class="flex flex-wrap justify-center gap-4 mb-12">
            <!-- Dynamic Categories from Database -->
            @foreach($categories as $category)
                <button class="category-pill {{$category['view_option']}} px-8 py-4 rounded-full font-semibold text-white hover:scale-110 transition-all duration-300">
                    {{$category["name"]}}
                </button>
            @endforeach
        </div>
    </div>
</section>
