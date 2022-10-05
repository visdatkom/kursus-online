<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="/" class="brand-link">
        <div class="text-center">
            <span class="brand-text font-weight-bold">IDN Course</span>
        </div>
    </a>

    <div class="sidebar">
        {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div> --}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">DASHBOARD</li>
                <li class="nav-item">
                    <a href="../widgets.html" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-brand-tabler nav-icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M8 9l3 3l-3 3"></path>
                            <line x1="13" y1="15" x2="16" y2="15"></line>
                            <rect x="4" y="4" width="16" height="16" rx="4"></rect>
                        </svg>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header">MASTER DATA</li>
                <li class="nav-item">
                    <a href="/tags" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-tags nav-icon"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path
                                d="M7.859 6h-2.834a2.025 2.025 0 0 0 -2.025 2.025v2.834c0 .537 .213 1.052 .593 1.432l6.116 6.116a2.025 2.025 0 0 0 2.864 0l2.834 -2.834a2.025 2.025 0 0 0 0 -2.864l-6.117 -6.116a2.025 2.025 0 0 0 -1.431 -.593z">
                            </path>
                            <path d="M17.573 18.407l2.834 -2.834a2.025 2.025 0 0 0 0 -2.864l-7.117 -7.116"></path>
                            <path d="M6 9h-.01"></path>
                        </svg>
                        <p>
                            Tags
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/category" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-category-2 nav-icon"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M14 4h6v6h-6z"></path>
                            <path d="M4 14h6v6h-6z"></path>
                            <circle cx="17" cy="17" r="3"></circle>
                            <circle cx="7" cy="7" r="3"></circle>
                        </svg>
                        <p>
                            Category
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/course" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-device-laptop nav-icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <line x1="3" y1="19" x2="21" y2="19"></line>
                            <rect x="5" y="6" width="14" height="10" rx="1">
                            </rect>
                        </svg>
                        <p>
                            Course
                        </p>
                    </a>
                </li>
                <li class="nav-header">Transaction</li>
                <li class="nav-item">
                    <a href="/course" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-receipt nav-icon"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path
                                d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16l-3 -2l-2 2l-2 -2l-2 2l-2 -2l-3 2m4 -14h6m-6 4h6m-2 4h2">
                            </path>
                        </svg>
                        <p>
                            Transaction
                        </p>
                    </a>
                </li>
                <li class="nav-header">User Management</li>
                <li class="nav-item">
                    <a href="/course" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-user-search nav-icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                            <path d="M6 21v-2a4 4 0 0 1 4 -4h1"></path>
                            <circle cx="16.5" cy="17.5" r="2.5"></circle>
                            <path d="M18.5 19.5l2.5 2.5"></path>
                        </svg>
                        <p>
                            Permissions
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/course" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-user-check nav-icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                            <path d="M16 11l2 2l4 -4"></path>
                        </svg>
                        <p>
                            Roles
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/course" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users nav-icon"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                        </svg>
                        <p>
                            Users
                        </p>
                    </a>
                </li>
                <li class="nav-header">Configuration</li>
                <li class="nav-item">
                    <a href="/course" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-user-circle nav-icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <circle cx="12" cy="12" r="9"></circle>
                            <circle cx="12" cy="10" r="3"></circle>
                            <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855"></path>
                        </svg>
                        <p>
                            Profile
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
