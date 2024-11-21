@extends('Admin.Layouts.layouts')

@section('content')
    <div class="container mx-auto py-8">
        <div class="card-header bg-white">
            <h1 class="text-2xl text-black font-bold text-center">List of Posts</h1>
        </div>
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">ID</th>
                    <th class="px-4 py-2 border">Topic</th>
                    <th class="px-4 py-2 border">Category</th>
                    <th class="px-4 py-2 border">Author</th>
                    <th class="px-4 py-2 border">Description</th>
                    <th class="px-4 py-2 border"></th>
                    <th class="px-4 py-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($posts as $posts)
                    <tr>
                        <td class="px-4 py-2 border text-center">{{ $posts->post_id }}</td>
                        <td class="px-4 py-2 border item-center">
                            @if ($posts->images)
                                <img src="{{ asset('storage/' . $posts->images) }}" alt="Post Image" class="mt-3" width="150">
                            @endif
                        </td>
                        <td class="px-4 py-2 border">{{ $posts->topic }}</td>
                        <td class="px-4 py-2 border">{{ $posts->categories->topic}}</td>
                        <td class="px-4 py-2 border">{{ $posts->author }}</td>
                        <td class="px-4 py-2 border">{{ Str::limit($posts->description, 50) }}</td>
                        <td class="px-4 py-2 border text-center">
                            <a href="{{route('Post.edit', $posts->post_id)}}" class="text-blue-500 hover:underline">Edit</a> |
                            <form action="{{ route('Post.delete', $posts->post_id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-2 border text-center">No posts found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
