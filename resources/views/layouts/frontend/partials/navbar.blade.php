<div class="w-full bg-slate-800 p-5">
    <div class="container mx-auto">
        <div class="flex items-center justify-between">
            <a href="/" class="flex items-center gap-2">
                <img src="{{ asset('course.png') }}" class="w-10 h-10 object-center object-cover" />
                <h1 class="text-white text-2xl font-semibold">LaraDev</h1>
            </a>
            <div class="hidden md:flex gap-8 text-white">
                <a href="">Course</a>
                <a href="">Artikel</a>
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            </div>
            <div class="flex md:hidden">
                <div class="text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-layout-list"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <rect x="4" y="4" width="16" height="6" rx="2"></rect>
                        <rect x="4" y="14" width="16" height="6" rx="2"></rect>
                    </svg>
                </div>

            </div>
        </div>
    </div>
</div>
