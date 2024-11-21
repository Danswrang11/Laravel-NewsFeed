<!-- resources/views/admin/dashboard.blade.php -->
@extends('Admin.Layouts.layouts')

@section('content')
<div class="flex flex-wrap gap-6 mb-6">
    <!-- Category Count -->
    <div class="bg-white shadow-md rounded-lg p-6 flex items-center space-x-4 w-full sm:w-auto">
        <x-lucide-combine class="w-6 h-6 text-emerald-500 hover:text-emerald-600"/>
        <div>
            <p class="text-gray-700 text-sm font-semibold uppercase">Categories</p>
            <p class="text-3xl font-bold text-gray-900">{{ $categoryCount }}</p>
        </div>
    </div>

    <!-- Tag Count -->
    <div class="bg-white shadow-md rounded-lg p-6 flex items-center space-x-4 w-full sm:w-auto">
        <x-lucide-tags class="w-6 h-6 text-emerald-500 hover:text-emerald-600"/>
        <div>
            <p class="text-gray-700 text-sm font-semibold uppercase">Tags</p>
            <p class="text-3xl font-bold text-gray-900">{{ $tagCount }}</p>
        </div>
    </div>
</div>

<!-- Recent Upload -->
<div class="container mx-auto bg-white shadow-md rounded-lg overflow-hidden">
    <div class="card-header bg-gray-100 p-4">
        <h1 class="text-2xl text-gray-800 font-bold text-left">Recent</h1>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full table-auto border-collapse bg-opacity-50">
            <thead>
                <tr class="bg-gray-200 text-gray-700 text-sm uppercase">
                    <th class="px-4 py-3 border">ID</th>
                    <th class="px-4 py-3 border">Image</th>
                    <th class="px-4 py-3 border">Topic</th>
                    <th class="px-4 py-3 border">Category</th>
                    <th class="px-4 py-3 border">Author</th>
                    <th class="px-4 py-3 border">Description</th>
                    <th class="px-4 py-3 border text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($posts as $posts)
                    <tr class="hover:bg-gray-100 transition">
                        <td class="px-4 py-3 border text-center text-sm text-gray-600">{{ $posts->post_id }}</td>
                        <td class="px-4 py-3 border text-center">
                            @if ($posts->images)
                                <img src="{{ asset('storage/' . $posts->images) }}" alt="Post Image" class="rounded shadow-md w-24 h-24 object-cover mx-auto">
                            @endif
                        </td>
                        <td class="px-4 py-3 border text-sm text-gray-800">{{ $posts->topic }}</td>
                        <td class="px-4 py-3 border text-sm text-gray-800">{{ $posts->categories->topic }}</td>
                        <td class="px-4 py-3 border text-sm text-gray-800">{{ $posts->author }}</td>
                        <td class="px-4 py-3 border text-sm text-gray-600">{{ Str::limit($posts->description, 50) }}</td>
                        <td class="px-4 py-3 border text-center">
                            <a href="{{ route('Post.edit', $posts->post_id) }}" class="inline-block text-blue-500 hover:text-blue-600">
                                <x-lucide-pencil class="w-6 h-6" />
                            </a>
                            |
                            <form action="{{ route('Post.delete', $posts->post_id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-block text-red-500 hover:text-red-600">
                                    <x-lucide-trash-2 class="w-6 h-6" />
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-3 border text-center text-gray-600">No posts found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
