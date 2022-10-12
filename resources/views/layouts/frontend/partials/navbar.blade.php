<div class="w-full bg-slate-800 p-5">
    <div class="container mx-auto">
        <div class="flex items-center justify-between">
            <a href="/" class="flex items-center gap-2">
                <img src="{{ asset('course.png') }}" class="w-10 h-10 object-center object-cover" />
                <h1 class="text-white text-2xl">IDN COURSE</h1>
            </a>
            <div class="hidden md:flex gap-8 text-white">
                <a href="">All Boundle Courses</a>
                <a href="">Article</a>
                <a href="{{ route('login') }}">Sign In</a>
                <a href="{{ route('register') }}">Get Started</a>
            </div>
        </div>
    </div>
</div>
