<div class="w-full py-10 text-white bg-slate-700">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-center">
            <div class="md:col-span-7 flex flex-col gap-8">
                <h1 class="text-center md:text-start text-2xl font-bold md:text-6xl text-gray-50">
                    IDN COURSE
                </h1>
                <p class="text-sm md:text-lg text-center md:text-start text-gray-100">
                    Website Belajar Coding bahasa Indonesia terlengkap dan mudah dipahami, seperti
                    <span class="underline text-[#F55246]">Laravel</span>,
                    <span class="text-[#41B883] underline">Vue</span>,
                    <span class="text-[#00D8FF] underline">React</span>,
                    <span class="text-[#0BA5E9] underline">Tailwind CSS</span> dan
                    <span class="underline text-blue-500">banyak lagi</span>.
                </p>
                <form method="GET">
                    <div class="relative text-gray-600 focus-within:text-gray-400">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                            <button type="submit" class="p-1 focus:outline-none focus:shadow-outline">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6">
                                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </button>
                        </span>
                        <input type="text" name="q"
                            class="py-2 text-sm text-gray-700 rounded-md pl-10 focus:outline-none focus:text-gray-700 w-3/4 focus:ring-2 focus:ring-sky-700 font-semibold"
                            placeholder="Belajar apa hari ini ?" autocomplete="off">
                    </div>
                </form>
            </div>
            <div class="col-span-5">
                <img src="{{ asset('learn.svg') }}" class="object-cover">
            </div>
        </div>
    </div>
</div>
