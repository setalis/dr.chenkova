<x-layouts.main>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <div class="bg-gradient-to-r from-indigo-500/20 from-10% via-50% to-emerald-500/20 to-90% min-h-screen flex flex-col">
        
        
        <div class="container max-w-7xl mx-auto px-4 flex-grow pt-20 mb-10">
            <div class="flex flex-col md:flex-row gap-8 bg-white md:bg-transparent rounded-2xl md:rounded-none p-6">
                <div class="md:w-2/5 w-full">
                    <img src="{{ asset('storage/images/doctor.png') }}" class="w-auto md:h-full h-[200px] object-cover rounded-lg mb-6 mx-auto" alt="ჩემ შესახებ">
                </div>
                <div class="md:w-3/5 w-full flex flex-col justify-center">
                    <h2 class="text-xl font-bold uppercase text-center text-[#575757] mb-6">ჩემ შესახებ</h2>
                    <p class="text-base text-gray-700 mb-6">მე ვარ ალინა ჩენკოვა, ექიმი-დერმატოლოგი, კოსმეტოლოგი, ექსპერტი კანის დიაგნოსტიკისა და ესთეტიკური მედიცინის სფეროში.</p>
                    <p class="text-base text-gray-700 mb-6">ჩემი სპეციალიზაციაა კანის სისტემური მიდგომა: აკნეს თერაპიიდან კომპლექსურ ანტი-ასაკობრივ პროგრამებამდე. ვფიქრობ, რომ წარმატებული მკურნალობა და ესთეტიკა შეუძლებელია დერმატოლოგიის გაგების გარეშე. ამიტომ ჩემი გზა არის კლინიკური აზროვნება, თანამედროვე პროტოკოლები და მუდმივი პროფესიონალური განვითარება.</p>

                    <p class="text-base text-gray-700 mb-6">ვასწავლი ექიმებს, ვატარებ ავტორულ კურსებს და პრაქტიკაში ვაჩვენებ, თუ როგორ შეიძლება მედიცინა იყოს ლამაზი.
                    ვმუშაობ პაციენტებთან სხვადასხვა ქვეყნებიდან. ვეხმარები არა მხოლოდ "სახის გაუმჯობესებაში", არამედ მიზეზების გაგებაში, პროგრესის დანახვაში და თავდაჯერებულობის გრძნობაში.</p>

                    <p class="text-base text-gray-700 mb-6">  თუ თქვენ გიზიარებთ მეცნიერებისა და ესთეტიკის კომბინაციას — კეთილი იყოს თქვენი მობრძანება.</p>
                    <a href="{{ route_locale('webinar') }}" class="bg-[#4BAE37] hover:bg-[#3c952a] md:w-96 w-full py-3 text-white rounded-xl mx-auto block uppercase font-bold text-base cursor-pointer mb-6 text-center">
                            ჩემი ვებინარების ნახვა
                    </a>
                </div>
            </div>
        </div>    
    </div>
</x-layouts.main>

