<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    @vite('resources/css/app.css')
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">

    <div class="w-full max-w-md bg-white rounded-lg shadow-md p-6">
        <div class="flex justify-center h-24 rounded-full">
            <img src="{{ asset('images/profile.png') }}" alt="Profile Photo">
        </div>
        <h2 class="text-4xl font-semibold text-center text-gray-800">Admin Login</h2>

        @if ($errors->any())
            <div class="bg-red-400 text-white px-4 py-3 rounded mt-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('login.submit')}}" method="POST" class="mt-6">
            <!-- @csrf is used to generate token -->
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email Address</label>
                <input type="email" id="email" name="email" class="w-full px-3 py-2 mt-1 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400" required/>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password</label>
                <input type="password" id="password" name="password" class="w-full px-3 py-2 mt-1 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400" required/>
            </div>

            <button type="submit" class="w-full py-2 mt-4 font-semibold text-white bg-blue-500 rounded hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
                Login
            </button>
        </form>
    </div>

</body>
</html>
