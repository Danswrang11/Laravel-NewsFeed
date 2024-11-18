<!-- resources/views/layouts/admin.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - DNews</title>
    @vite('resources/css/app.css') <!-- Add Tailwind CSS -->

    <script defer>
        function toggleDropdown() {
            document.getElementById('categoryDropdown').classList.toggle('hidden');
        }
        function toggleDropdown2() {
            document.getElementById('TagDropdown').classList.toggle('hidden');
        }
        function toggleDropdown3() {
            document.getElementById('PostDropdown').classList.toggle('hidden');
        }
    </script>
    
</head>
<body class="bg-gray-100">

    <!-- Side Navigation -->
    <div class="flex h-screen">
        <div class="w-64 bg-blue-200 text-white p-5">
            <h2 class="text-2xl font-bold mb-6">DNews</h2>
            <ul>
                <li><a href="{{route('Admin.dashboard')}}" class="block py-2 px-4 hover:bg-blue-300 rounded">Dashboard</a></li>
                <li class="relative">
                    <button onclick="toggleDropdown3()" class="block w-full text-left py-2 px-4 hover:bg-blue-300 rounded flex justify-between items-center">
                        Post
                        <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <ul id="PostDropdown" class="hidden ml-4 mt-2 space-y-2">
                        <li><a href="{{route('Post.form')}}" class="block py-2 px-4 hover:bg-blue-300 rounded">Create</a></li>
                        <li><a href="{{route('Category.list')}}" class="block py-2 px-4 hover:bg-blue-300 rounded">List</a></li>
                    </ul>
                </li>


                <!-- categoryDropdown -->
                <li class="relative">
                    <button onclick="toggleDropdown()" class="block w-full text-left py-2 px-4 hover:bg-blue-300 rounded flex justify-between items-center">
                        Categories
                        <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <ul id="categoryDropdown" class="hidden ml-4 mt-2 space-y-2">
                        <li><a href="{{route('Category.form')}}" class="block py-2 px-4 hover:bg-blue-300 rounded">Create</a></li>
                        <li><a href="{{route('Category.list')}}" class="block py-2 px-4 hover:bg-blue-300 rounded">List</a></li>
                    </ul>
                </li>

                <!-- TagDropdown -->
                <li class="relative">
                    <button onclick="toggleDropdown2()" class="block w-full text-left py-2 px-4 hover:bg-blue-300 rounded flex justify-between items-center">
                        Tags
                        <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <ul id="TagDropdown" class="hidden ml-4 mt-2 space-y-2">
                        <li><a href="{{route('Tag.form')}}" class="block py-2 px-4 hover:bg-blue-300 rounded">Create</a></li>
                        <li><a href="{{route('Tag.list')}}" class="block py-2 px-4 hover:bg-blue-300 rounded">List</a></li>
                    </ul>
                </li>

                <li><a href="#" class="block py-2 px-4 hover:bg-blue-300 rounded">Users</a></li>
                <li><a href="#" class="block py-2 px-4 hover:bg-blue-300 rounded">Settings</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-1 h-screen md:h-full bg-cover bg-center bg-no-repeat" style="background-image: url('/Images/background.jpg');">
            <!-- Top Navigation Bar -->
            <div class="bg-green-100 shadow-md px-4 py-2 flex justify-between items-center">
                <div>
                    <img src="{{ asset('images/logo2.png') }}" alt="DNews Logo" class="h-20">
                </div>

                <div class="flex items-center space-x-4">

                    <a href="" class="text-red-500 hover:text-red-700 text-xl">Logout</a>

                    <div class="flex items-center space-x-3">
                        <span class="text-xl font-medium">Administrator</span>
                        <div>
                            <!-- <img src="{{ asset('images/logo.png') }}" alt="DNews Logo" class="h-20"> -->
                            <img src="{{ asset('images/profile.png') }}" alt="Profile Photo" class="w-10 h-10 rounded-full">
                        </div>
                        
                    </div>

                </div>
            </div>

            <!-- Page Content ----Can Edit or add without chaning the layout of Navigation bar -->
            <div class="p-6">
                @yield('content')
            </div>

        </div>
    </div>

</body>
</html>
