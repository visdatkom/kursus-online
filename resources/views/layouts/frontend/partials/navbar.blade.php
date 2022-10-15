<div class="w-full bg-slate-800 p-3 border-b border-slate-700 border-dashed">
    <div class="container mx-auto">
        <div class="flex items-center justify-between">
            <ul class="flex items-center justify-center gap-5">
                <li>
                    <a href="/" class="flex items-center text-lg text-white font-semibold">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-tabler"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M8 9l3 3l-3 3"></path>
                            <line x1="13" y1="15" x2="16" y2="15"></line>
                            <rect x="4" y="4" width="16" height="16" rx="4"></rect>
                        </svg>
                        LaraDev
                    </a>
                </li>
                <li>
                    <a href="" class="text-sm font-semibold text-white flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home w-5 h-5"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                            <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                            <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                        </svg>
                        Home
                    </a>
                </li>
                <li>
                    <a href="" class="text-sm font-semibold text-white flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-device-laptop w-5 h-5" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <line x1="3" y1="19" x2="21" y2="19"></line>
                            <rect x="5" y="6" width="14" height="10" rx="1"></rect>
                        </svg>
                        Course
                    </a>
                </li>
                <li>
                    <div class="relative" x-data="{ isOpen: false }">
                        <button @click="isOpen = !isOpen" @keydown.escape="isOpen = false"
                            class="flex items-center gap-2 text-sm text-white">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-category-2 w-5 h-5" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M14 4h6v6h-6z"></path>
                                <path d="M4 14h6v6h-6z"></path>
                                <circle cx="17" cy="17" r="3"></circle>
                                <circle cx="7" cy="7" r="3"></circle>
                            </svg>
                            Category
                        </button>
                        <ul x-cloak x-show="isOpen" @click.away="isOpen = false"
                            class="absolute font-normal bg-slate-800 shadow overflow-hidden rounded-lg w-48 border border-slate-700 mt-2 py-1 left-0 z-20">
                            @foreach ($categories as $category)
                                <li>
                                    <a href="#"
                                        class="flex items-center p-3 hover:text-blue-500 rounded-lg text-sm text-white">
                                        <img src="{{ $category->image }}" class="w-5 h-5 object-cover" />
                                        <span class="ml-2">{{ $category->name }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="" class="text-sm font-semibold text-white flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-message-2 w-5 h-5"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path
                                d="M12 20l-3 -3h-2a3 3 0 0 1 -3 -3v-6a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-2l-3 3">
                            </path>
                            <line x1="8" y1="9" x2="16" y2="9"></line>
                            <line x1="8" y1="13" x2="14" y2="13"></line>
                        </svg>
                        Review
                    </a>
                </li>
                <li>
                    <a href="" class="text-sm font-semibold text-white flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-source-code w-5 h-5" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M14.5 4h2.5a3 3 0 0 1 3 3v10a3 3 0 0 1 -3 3h-10a3 3 0 0 1 -3 -3v-5"></path>
                            <path d="M6 5l-2 2l2 2"></path>
                            <path d="M10 9l2 -2l-2 -2"></path>
                        </svg>
                        Showcase
                    </a>
                </li>
            </ul>
            <div class="hidden md:flex items-center gap-2 text-white">
                @guest
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                @endguest
                @auth
                    <div class="rounded-lg border px-4 py-2">
                        <a href="">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-basket w-5 h-5"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <polyline points="7 10 12 4 17 10"></polyline>
                                <path d="M21 10l-2 8a2 2.5 0 0 1 -2 2h-10a2 2.5 0 0 1 -2 -2l-2 -8z"></path>
                                <circle cx="12" cy="15" r="2"></circle>
                            </svg>
                        </a>
                    </div>
                    <div class="relative" x-data="{ isOpen: false }">
                        <button @click="isOpen = !isOpen" @keydown.escape="isOpen = false"
                            class="flex items-center gap-2 border px-4 py-2 rounded-lg text-sm bg-slate-800 bg-opacity-80">
                            <img src="http://www.gravatar.com/avatar?d=mm" alt="avatar" class="w-5 h-5 rounded-full">
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
                                <a href="#" class="flex items-center p-3 hover:text-red-500 rounded-lg text-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-brand-tabler w-5 h-5" width="24"
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
                                <a href="#" class="flex items-center p-3 hover:text-red-500 text-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-user-circle w-5 h-5" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="12" cy="12" r="9"></circle>
                                        <circle cx="12" cy="10" r="3"></circle>
                                        <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855"></path>
                                    </svg>
                                    <span class="ml-2">Account</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center p-3 hover:text-red-500 text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-logout w-5 h-5" width="24" height="24"
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
