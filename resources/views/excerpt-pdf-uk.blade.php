<x-layouts.main>
@push('styles')    
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
@endpush
    <div class="bg-gradient-to-r from-indigo-500/20 from-10% via-50% to-emerald-500/20 to-90% min-h-screen h-full pb-8 pt-20 px-4">

        <div class="container max-w-5xl mx-auto px-8 bg-white rounded-2xl py-6 gap-6">
            <div class="mb-6">
                <h1 class="text-4xl font-black uppercase text-center text-[#4BAE37] mb-4">Уривок з книги</h1>
                <p class="text-lg text-gray-700 text-center">Попередній перегляд книги "Шкіра на все життя"</p>
            </div>

            <!-- Контейнер для PDF -->
            <div class="w-full border border-gray-300 rounded-lg overflow-hidden shadow-lg" style="min-height: 600px;">
                <iframe 
                    id="pdfViewer" 
                    src="{{ asset('storage/files/excerpt-book.pdf') }}#toolbar=1&navpanes=0&scrollbar=1" 
                    class="w-full border-0" 
                    style="width: 100%; min-height: 80vh; height: 800px;">
                </iframe>
            </div>

            <div class="mt-6 text-center">
                <a href="{{ route_locale('book') }}" class="inline-block bg-[#4BAE37] hover:bg-[#3c952a] text-white px-8 py-3 rounded-full uppercase font-bold transition-all shadow-lg hover:shadow-xl">
                    Повернутися до книги
                </a>
            </div>
        </div>
    </div>
   
</x-layouts.main>




