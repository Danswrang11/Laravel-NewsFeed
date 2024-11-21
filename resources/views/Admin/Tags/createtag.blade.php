@extends('Admin.Layouts.layouts')

@section('content')
    <div class="w-full max-w-md mx-auto">
        @if(session('success'))
            <div class="bg-green-400 text-white p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('tags.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            <h2 class="text-2xl font-bold mb-4">Create Tag</h2>

            <div class="mb-4">
                <label for="tag_name" class="block text-gray-700 font-semibold">Tag Name</label>
                <input type="text" name="tag_name" id="name" required
                    class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:border-indigo-500">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-indigo-500 text-white font-semibold py-2 px-4 rounded hover:bg-indigo-600">
                Submit
            </button>
        </form>
    </div>
@endsection
