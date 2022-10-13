<div class="w-full bg-slate-800 p-5">
    <div class="container mx-auto">
        <div class="flex items-center justify-between">
            <a href="/" class="flex items-center gap-2">
                <img src="{{ asset('course.png') }}" class="w-10 h-10 object-center object-cover" />
                <h1 class="text-white text-2xl font-semibold">LaraDev</h1>
            </a>
            <div class="hidden md:flex items-center gap-8 text-white">
                <a href="">Course</a>
                <a href="">Artikel</a>
                @guest
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                @endguest
                @auth
                    <div class="relative" x-data="{ isOpen: false }">
                        <button @click="isOpen = !isOpen" @keydown.escape="isOpen = false" class="flex items-center gap-2">
                            <img src="http://www.gravatar.com/avatar?d=mm" alt="avatar" class="w-8 h-8 rounded-full">
                            {{ Auth::user()->name }}
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-chevron-down w-5 h-5" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </button>
                        <ul x-cloak x-show="isOpen" @click.away="isOpen = false"
                            class="absolute font-normal bg-slate-800 shadow overflow-hidden rounded-lg w-48 border border-slate-700 mt-2 py-1 right-0 z-20">
                            <li>
                                <a href="#" class="flex items-center p-3 hover:text-red-500 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-brand-tabler w-6 h-6" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M8 9l3 3l-3 3"></path>
                                        <line x1="13" y1="15" x2="16" y2="15"></line>
                                        <rect x="4" y="4" width="16" height="16" rx="4">
                                        </rect>
                                    </svg>
                                    <span class="ml-2">Dashboard</span>
                                </a>
                            </li>
                            <li class="border-b border-gray-400">
                                <a href="#" class="flex items-center p-3 hover:text-red-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-circle"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25"
                                        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="12" cy="12" r="9"></circle>
                                        <circle cx="12" cy="10" r="3"></circle>
                                        <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855"></path>
                                    </svg>
                                    <span class="ml-2">Account</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center p-3 hover:text-red-500">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-logout w-6 h-6" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path
                                            d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2">
                                        </path>
                                        <path d="M7 12h14l-3 -3m0 6l3 -3"></path>
                                    </svg>
                                    <span class="ml-2">Logout</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                @endauth
            </div>
            <div class="flex md:hidden">
                <div class="text-white relative" x-data="{ isOpen: false }">
                    <button @click="isOpen = !isOpen" @keydown.escape="isOpen = false"
                        class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-layout-list"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <rect x="4" y="4" width="16" height="6" rx="2">
                            </rect>
                            <rect x="4" y="14" width="16" height="6" rx="2">
                            </rect>
                        </svg>
                    </button>
                    {{-- <ul x-cloak x-show="isOpen" @click.away="isOpen = false"
                        class="fixed w-60 h-40 bg-white right-0 top-0 transition-all duration-200">
                        <li>
                            <a href="#" class="flex items-center p-3 hover:text-red-500 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-brand-tabler w-6 h-6" width="24"
                                    height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M8 9l3 3l-3 3"></path>
                                    <line x1="13" y1="15" x2="16" y2="15"></line>
                                    <rect x="4" y="4" width="16" height="16"
                                        rx="4">
                                    </rect>
                                </svg>
                                <span class="ml-2">Dashboard</span>
                            </a>
                        </li>
                        <li class="border-b border-gray-400">
                            <a href="#" class="flex items-center p-3 hover:text-red-500">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-user-circle" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="12" cy="12" r="9"></circle>
                                    <circle cx="12" cy="10" r="3"></circle>
                                    <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855"></path>
                                </svg>
                                <span class="ml-2">Account</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center p-3 hover:text-red-500">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-logout w-6 h-6" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path
                                        d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2">
                                    </path>
                                    <path d="M7 12h14l-3 -3m0 6l3 -3"></path>
                                </svg>
                                <span class="ml-2">Logout</span>
                            </a>
                        </li>
                    </ul> --}}
                    <ul x-cloak x-show="isOpen" @click.away="isOpen = false"
                        class="absolute font-normal bg-slate-800 shadow overflow-hidden rounded-lg w-48 border border-slate-700 mt-2 py-1 right-0 z-20">
                        <li>
                            <a href="#" class="flex items-center p-3 hover:text-red-500 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-device-laptop w-6 h-6" width="24"
                                    height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <line x1="3" y1="19" x2="21" y2="19"></line>
                                    <rect x="5" y="6" width="14" height="10"
                                        rx="1"></rect>
                                </svg>
                                <span class="ml-2">Course</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center p-3 hover:text-red-500">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-notebook w-6 h-6" width="24"
                                    height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path
                                        d="M6 4h11a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-11a1 1 0 0 1 -1 -1v-14a1 1 0 0 1 1 -1m3 0v18">
                                    </path>
                                    <line x1="13" y1="8" x2="15" y2="8"></line>
                                    <line x1="13" y1="12" x2="15" y2="12"></line>
                                </svg>
                                <span class="ml-2">Artikel</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('login') }}" class="flex items-center p-3 hover:text-red-500">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-user-check w-6 h-6" width="24"
                                    height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                    <path d="M16 11l2 2l4 -4"></path>
                                </svg>
                                <span class="ml-2">Login</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}" class="flex items-center p-3 hover:text-red-500">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-user-plus w-6 h-6" width="24"
                                    height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                    <path d="M16 11h6m-3 -3v6"></path>
                                </svg>
                                <span class="ml-2">Register</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
