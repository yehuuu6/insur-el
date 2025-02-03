<nav class="bg-opacity-85 sticky top-0 z-30 border-b border-gray-200 bg-white py-4 shadow-sm backdrop-blur md:py-5">
    <div class="relative">
        <div class="flex items-center justify-between mx-[3%] md:mx-[6%]">
            <a href="/" class="group flex items-center gap-1.5 hover:no-underline hover:opacity-90 md:gap-2.5">
                <h1 class="text-lg md:text-2xl text-blue-900 font-bold">INSUrel</h1>
            </a>
            <div class="flex items-center gap-2 md:gap-3">
                <a href="{{ route('dashboard') }}" class="text-sm md:text-base text-gray-700 font-bold hover:underline">
                    Panel
                </a>
                <a href="{{ route('customer.create') }}"
                    class="text-sm md:text-base text-gray-700 font-bold hover:underline">
                    Yeni Kayıt
                </a>
            </div>
        </div>
    </div>
</nav>
