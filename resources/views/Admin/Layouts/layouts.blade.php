<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - DNews</title>
    @vite('resources/css/app.css') <!-- Add Tailwind CSS -->

    <script defer>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('w-20');
            document.getElementById('sidebar').classList.toggle('w-64');
            document.querySelector('.sidebar-logo').classList.toggle('hidden'); // Hide the DNews logo
            document.querySelectorAll('.sidebar-text').forEach(el => el.classList.toggle('hidden'));
        }
        function toggleDropdown(id) {
            document.getElementById(id).classList.toggle('hidden');
        }

    </script>
</head>
<body class="bg-gray-100">

    <!-- Main Layout -->
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div id="sidebar" class="w-64 bg-white shadow-md flex flex-col justify-between transition-width duration-300">
            <!-- Logo and Admin -->
            <div class="p-4 flex items-center justify-between border-b">
                <!-- Adjust logo visibility -->
                <span class="font-bold text-4xl text-emerald-500 transition-all duration-300 sidebar-logo">TheNewsPit</span>
                <button onclick="toggleSidebar()" class="text-gray-600 hover:text-gray-800">
                <x-lucide-menu class="w-6 h-6 text-emerald-500"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
            
            <!-- Navigation -->
            <nav class="flex-1 p-4">
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('Admin.dashboard') }}" class="flex items-center space-x-2 p-2 rounded hover:bg-emerald-300">
                        <x-lucide-layout-dashboard class="w-6 h-6 text-emerald-500 hover:text-emerald-600"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11M9 21V3"/>
                            </svg>
                            <span class="sidebar-text text-gray-950">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <button onclick="toggleDropdown('postDropdown')" class="w-full flex items-center justify-between p-2 rounded hover:bg-gray-100">
                            <div class="flex items-center space-x-2">
                            <x-lucide-badge-plus class="w-6 h-6 text-emerald-500 hover:text-emerald-600"/>
                                <span class="sidebar-text text-gray-800">Posts</span>
                            </div>
                            <x-lucide-arrow-down-from-line class="w-3 h-3 text-emerald-500 hover:text-emerald-600"/>
                        </button>
                        <ul id="postDropdown" class="hidden pl-8 space-y-2">
                            <li><a href="{{ route('Post.form') }}" class="block p-2 rounded hover:bg-gray-100">Create</a></li>
                            <li><a href="{{ route('Post.list') }}" class="block p-2 rounded hover:bg-gray-100">List</a></li>
                        </ul>
                    </li>
                    <li>
                        <button onclick="toggleDropdown('categoryDropdown')" class="w-full flex items-center justify-between p-2 rounded hover:bg-gray-100">
                            <div class="flex items-center space-x-2">
                            <x-lucide-combine class="w-6 h-6 text-emerald-500 hover:text-emerald-600"/>
                                <span class="sidebar-text text-gray-800">Categories</span>
                            </div>
                            <x-lucide-arrow-down-from-line class="w-3 h-3 text-emerald-500 hover:text-emerald-600"/>
                        </button>
                        <ul id="categoryDropdown" class="hidden pl-8 space-y-2">
                            <li><a href="{{ route('Category.form') }}" class="block p-2 rounded hover:bg-gray-100">Create</a></li>
                            <li><a href="{{ route('Category.list') }}" class="block p-2 rounded hover:bg-gray-100">List</a></li>
                        </ul>
                    </li>
                    <li>
                        <button onclick="toggleDropdown('tagDropdown')" class="w-full flex items-center justify-between p-2 rounded hover:bg-gray-100">
                            <div class="flex items-center space-x-2">
                            <x-lucide-tags class="w-6 h-6 text-emerald-500 hover:text-emerald-600"/>
                                <span class="sidebar-text text-gray-800">Tags</span>
                            </div>
                            <x-lucide-arrow-down-from-line class="w-3 h-3 text-emerald-500 hover:text-emerald-600"/>
                        </button>
                        <ul id="tagDropdown" class="hidden pl-8 space-y-2">
                            <li class="flex"><a href="{{ route('Tag.form') }}" class="block p-2 rounded hover:bg-gray-100">Create</a></li>
                            <li><a href="{{ route('Tag.list') }}" class="block p-2 rounded hover:bg-gray-100">List</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Top Navigation Bar -->
            <header class="flex items-center justify-between p-4 shadow-md bg-white">
                <div class="flex items-center space-x-2">
                    <span class="font-bold text-xl text-gray-800">Admin</span>
                    <input type="text" placeholder="Search here..." class="p-2 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="flex items-center space-x-4">
                    <a href="#" class="text-gray-800">
                        <x-lucide-log-out class="w-6 h-6 text-red-500 hover:text-red-700"/>
                    </a>
                </div>
            </header>


            <!-- Breadcrumb Bar -->
            <nav class="flex mb-6 text-gray-700" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <!-- Home Link -->
                    <li class="inline-flex items-center">
                        <a href="{{ route('Admin.dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-emerald-500">
                            <x-lucide-home class="w-5 h-5 mr-1 text-emerald-500" />
                            Dashboard
                        </a>
                    </li>
                    <!-- Dynamic Breadcrumb Levels -->
                    @yield('breadcrumb')
                </ol>
            </nav>

            <!-- Page Content -->
            <main class="p-6 overflow-auto">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
