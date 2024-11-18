<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Login</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    <div class="flex flex-col items-center justify-center h-screen space-y-52">
        <!-- Welcome Text -->
        <div class="text-4xl font-bold space-y-5 font-mono">
            Welcome to DNews
        </div>

        <!-- Login Options -->
        <div class="flex space-x-10">
            <!-- Admin Login Button -->
            <a href="{{url('/Admin/Login')}}" class="bg-stone-100 hover:bg-stone-200 text-black font-semibold py-10 px-10 rounded shadow-xl text-2xl font-mono">
                Admin Login
            </a>

            <!-- User Login Button -->
            <a href="{{url('/User/userlogin')}}" class="bg-stone-100 hover:bg-stone-200 text-black font-semibold py-10 px-10 rounded shadow-xl text-2xl font-mono">
                User Login
            </a>
        </div>
    </div>
</body>
</html>