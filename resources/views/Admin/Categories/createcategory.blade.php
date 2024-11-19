<!-- resources/views/admin/dashboard.blade.php -->
@extends('Admin.Layouts.layouts')

@section('content')
    <div class="flex justify-center">
        <div class="w-full max-w-md bg-white bg-opacity-40 p-6 rounded-lg shadow-md">
            @if(session('success'))
                <div class="bg-green-300 text-white p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{route('categories.store')}}" method="POST">
                @csrf
                <h2 class="text-2xl font-bold mb-4 text-center">Create Category</h2>

                <div class="mb-4">
                    <label for="topic" class="block text-gray-700 font-semibold">Topic</label>
                    <input type="text" name="topic" id="topic" required
                        class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:border-indigo-500">
                    @error('topic')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-700 font-semibold">Description</label>
                    <textarea name="description" id="description" rows="4"
                        class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:border-indigo-500"></textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="bg-indigo-500 text-white font-semibold py-2 px-4 rounded hover:bg-indigo-600">
                    Submit
                </button>
            </form>
        </div>
    </div>
@endsection
