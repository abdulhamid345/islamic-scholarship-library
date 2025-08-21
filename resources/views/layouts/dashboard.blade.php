<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
        }

        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .glass-effect {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.9);
        }

        .sidebar-gradient {
            background: linear-gradient(135deg, #065f46 0%, #047857 50%, #059669 100%);
        }

        .nav-item-active {
            background: linear-gradient(90deg, rgba(16, 185, 129, 0.1) 0%, rgba(5, 150, 105, 0.15) 100%);
            border-left: 3px solid #10b981;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">
    <!-- Sidebar -->
    <div id="sidebar"
        class="fixed inset-y-0 left-0 z-50 w-72 sidebar-gradient text-white transform -translate-x-full transition-all duration-300 ease-in-out lg:translate-x-0 shadow-2xl">
        <!-- Logo Section -->
        <div
            class="flex items-center justify-center h-20 bg-black bg-opacity-20 backdrop-blur-sm border-b border-green-600 border-opacity-30">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center shadow-lg">
                    <i class="fas fa-leaf text-green-600 text-xl"></i>
                </div>
                <div>
                    <h1 class="text-xl font-bold tracking-tight">Yahaya Bawa Islamic Library</h1>
                    <p class="text-xs text-green-200 opacity-80">Admin Dashboard</p>
                </div>
            </div>
        </div>

        <!-- User Profile Section -->
        <div class="p-6 border-b border-green-600 border-opacity-30">
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <div
                        class="w-12 h-12 bg-gradient-to-r from-green-400 to-emerald-500 rounded-full flex items-center justify-center shadow-lg">
                        <i class="fas fa-user text-white"></i>
                    </div>
                    <div
                        class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-400 rounded-full border-2 border-green-800">
                    </div>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-semibold text-white truncate">Admin</p>
                    <p class="text-xs text-green-200 truncate">Administrator</p>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto scrollbar-hide">
            <div class="space-y-1">
                <p class="px-4 text-xs font-semibold text-green-200 uppercase tracking-wider opacity-75 mb-3">Main Menu
                </p>
                <a href="{{ route('dashboard') }}"
                    class="nav-item-active flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 group">
                    <div
                        class="w-8 h-8 bg-green-500 bg-opacity-20 rounded-lg flex items-center justify-center mr-3 group-hover:bg-opacity-30 transition-colors">
                        <i class="fas fa-tachometer-alt text-green-300"></i>
                    </div>
                    <span class="flex-1">Dashboard</span>
                    <div class="w-2 h-2 bg-green-400 rounded-full opacity-0 group-hover:opacity-100 transition-opacity">
                    </div>
                </a>
                {{-- <a href="#"
                    class="flex items-center px-4 py-3 text-sm font-medium rounded-xl text-green-100 hover:bg-white hover:bg-opacity-10 transition-all duration-200 group">
                    <div
                        class="w-8 h-8 bg-green-500 bg-opacity-20 rounded-lg flex items-center justify-center mr-3 group-hover:bg-opacity-30 transition-colors">
                        <i class="fas fa-users text-green-300"></i>
                    </div>
                    <span class="flex-1">Users</span>
                    <span class="bg-green-500 text-white text-xs px-2 py-1 rounded-full">24</span>
                </a> --}}
                <a href="{{ route('dashboard.scholars.index') }}"
                    class="flex items-center px-4 py-3 text-sm font-medium rounded-xl text-green-100 hover:bg-white hover:bg-opacity-10 transition-all duration-200 group">
                    <div
                        class="w-8 h-8 bg-green-500 bg-opacity-20 rounded-lg flex items-center justify-center mr-3 group-hover:bg-opacity-30 transition-colors">
                        <i class="fas fa-chart-line text-green-300"></i>
                    </div>
                    <span class="flex-1">Scholars</span>
                </a>
                <a href="{{ route('dashboard.category.index') }}"
                    class="flex items-center px-4 py-3 text-sm font-medium rounded-xl text-green-100 hover:bg-white hover:bg-opacity-10 transition-all duration-200 group">
                    <div
                        class="w-8 h-8 bg-green-500 bg-opacity-20 rounded-lg flex items-center justify-center mr-3 group-hover:bg-opacity-30 transition-colors">
                        <i class="fas fa-shopping-bag text-green-300"></i>
                    </div>
                    <span class="flex-1">Category</span>
                </a>
                <a href="{{ route('dashboard.books.index') }}"
                    class="flex items-center px-4 py-3 text-sm font-medium rounded-xl text-green-100 hover:bg-white hover:bg-opacity-10 transition-all duration-200 group">
                    <div
                        class="w-8 h-8 bg-green-500 bg-opacity-20 rounded-lg flex items-center justify-center mr-3 group-hover:bg-opacity-30 transition-colors">
                        <i class="fas fa-box-open text-green-300"></i>
                    </div>
                    <span class="flex-1">Books</span>
                </a>
            </div>
        </nav>

        <!-- Bottom Section -->
        <div class="p-4 border-t border-green-600 border-opacity-30">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="flex items-center px-4 py-3 text-sm font-medium rounded-xl text-green-100 hover:bg-red-500 hover:bg-opacity-20 transition-all duration-200 group w-full text-left">
                    <div
                        class="w-8 h-8 bg-red-500 bg-opacity-20 rounded-lg flex items-center justify-center mr-3 group-hover:bg-opacity-30 transition-colors">
                        <i class="fas fa-sign-out-alt text-red-300"></i>
                    </div>
                    <span class="flex-1">Logout</span>
                </button>
            </form>
        </div>
    </div>

    <!-- Main Content -->
    <div class="lg:ml-72 transition-all duration-300">
        <!-- Header -->
        <header
            class="glass-effect border-b border-white border-opacity-20 backdrop-blur-xl shadow-sm sticky top-0 z-40">
            <div class="flex items-center justify-between px-6 py-4">
                <!-- Mobile menu button -->
                <button id="mobile-menu-button"
                    class="lg:hidden p-2 rounded-xl text-gray-600 hover:text-gray-900 hover:bg-gray-100 transition-colors">
                    <i class="fas fa-bars text-xl"></i>
                </button>

                <!-- Breadcrumb -->
                <div class="hidden lg:flex items-center space-x-2 text-sm">
                    <span class="text-gray-500">Admin</span>
                    <i class="fas fa-chevron-right text-xs text-gray-400"></i>
                    <span class="text-gray-700 font-medium">Dashboard</span>
                </div>

                <!-- Header Actions -->
                <div class="flex items-center space-x-3">

                    <!-- Profile Dropdown -->
                    <div class="relative ml-3">
                        <button id="profile-button"
                            class="flex items-center space-x-3 p-2 rounded-xl hover:bg-gray-50 transition-all duration-200 group">
                            <div
                                class="w-10 h-10 bg-gradient-to-r from-green-500 to-emerald-600 rounded-full flex items-center justify-center shadow-lg ring-2 ring-white">
                                <i class="fas fa-user text-white text-sm"></i>
                            </div>
                            <div class="hidden md:block text-left">
                                <p class="text-sm font-semibold text-gray-800">Admin</p>
                                <p class="text-xs text-gray-500">Administrator</p>
                            </div>
                            <i
                                class="fas fa-chevron-down text-gray-400 text-sm group-hover:text-gray-600 transition-colors"></i>
                        </button>

                        <!-- Dropdown Menu -->
                        <div id="profile-dropdown"
                            class="hidden absolute right-0 mt-2 w-56 bg-white rounded-2xl shadow-xl py-2 z-50 border border-gray-100 backdrop-blur-xl">
                            <div class="px-4 py-3 border-b border-gray-100">
                                <p class="text-sm font-medium text-gray-900">Admin</p>
                                <p class="text-xs text-gray-500">john.doe@company.com</p>
                            </div>
                            <a href="#"
                                class="flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                                <i class="fas fa-user mr-3 text-gray-400"></i>
                                <span>Your Profile</span>
                            </a>
                            <a href="#"
                                class="flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                                <i class="fas fa-cog mr-3 text-gray-400"></i>
                                <span>Account Settings</span>
                            </a>
                            <a href="#"
                                class="flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                                <i class="fas fa-moon mr-3 text-gray-400"></i>
                                <span>Dark Mode</span>
                                <div class="ml-auto">
                                    <div class="w-8 h-4 bg-gray-200 rounded-full relative">
                                        <div
                                            class="w-4 h-4 bg-white rounded-full shadow absolute transition-transform">
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="border-t border-gray-100 my-1"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="flex items-center px-4 py-3 text-sm text-red-600 hover:bg-red-50 transition-colors w-full text-left">
                                    <i class="fas fa-sign-out-alt mr-3"></i>
                                    <span>Sign out</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        @yield('content')
    </div>

    <!-- Overlay for mobile -->
    <div id="sidebar-overlay" class="hidden fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden backdrop-blur-sm">
    </div>

    <script>
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebar-overlay');

        mobileMenuButton.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
            sidebarOverlay.classList.toggle('hidden');
        });

        sidebarOverlay.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            sidebarOverlay.classList.add('hidden');
        });

        // Profile dropdown toggle
        const profileButton = document.getElementById('profile-button');
        const profileDropdown = document.getElementById('profile-dropdown');

        profileButton.addEventListener('click', () => {
            profileDropdown.classList.toggle('hidden');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', (event) => {
            if (!profileButton.contains(event.target)) {
                profileDropdown.classList.add('hidden');
            }
        });

        // Close mobile menu on window resize
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 1024) {
                sidebar.classList.remove('-translate-x-full');
                sidebarOverlay.classList.add('hidden');
            }
        });

        // Add smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</body>

</html>
