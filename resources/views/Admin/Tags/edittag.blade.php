@extends('Admin.Layouts.layouts')

@section('content')
    <div class="w-full max-w-3xl mx-auto bg-white rounded-lg bg-opacity-40">
        <h2 class="text-2xl font-bold mb-4">Edit Tag</h2>

        @if(session('success'))
            <div class="bg-green-500 text-white p-4 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('tags.update', $tag->tag_id) }}" method="POST" class="bg-opacity-40 border border-gray-300 shadow-md p-4">
            @csrf
            @method('PUT')

            <!-- Tag Name Field -->
            <div class="mb-4">
                <label for="tag_name" class="block text-sm font-semibold text-gray-700">Tag Name</label>
                <input 
                    type="text" 
                    name="tag_name" 
                    id="tag_name" 
                    class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:border-indigo-500" 
                    value="{{ old('tag_name', $tag->tag_name) }}" 
                    required
                >
                @error('tag_name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Update Tag</button>
                <a href="{{ route('Tag.list') }}" class="ml-2 text-red-600 hover:underline">Cancel</a>
            </div>
        </form>
    </div>
@endsection
