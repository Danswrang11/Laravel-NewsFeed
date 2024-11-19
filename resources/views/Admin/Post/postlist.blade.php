@extends('Admin.Layouts.layouts')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold text-center mb-8">List of Posts</h1>
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">ID</th>
                    <th class="px-4 py-2 border">Topic</th>
                    <th class="px-4 py-2 border">Category</th>
                    <th class="px-4 py-2 border">Author</th>
                    <th class="px-4 py-2 border">Description</th>
                    <th class="px-4 py-2 border">Image</th>
                    <th class="px-4 py-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($posts as $post)
                    <tr>
                        <td class="px-4 py-2 border text-center">{{ $post->post_id }}</td>
                        <td class="px-4 py-2 border">{{ $post->topic }}</td>
                        <td class="px-4 py-2 border">{{ $post->categories->topic}}</td>
                        <td class="px-4 py-2 border">{{ $post->author }}</td>
                        <td class="px-4 py-2 border">{{ Str::limit($post->description, 50) }}</td>
                        <td class="px-4 py-2 border item-center">
                            @if($post->images)
                                <img src="{{ asset('storage/images' , $post->images) }}" class="h-12 w-12 rounded">
                            @else
                                No Image
                            @endif
                        </td>
                        <td class="px-4 py-2 border text-center">
                            <a href="{{route('Post.edit', $post->post_id)}}" class="text-blue-500 hover:underline">Edit</a> |
                            <form action="{{ route('Post.delete', $post->post_id) }}" method="POST" class="inline-block">
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
