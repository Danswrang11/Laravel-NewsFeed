@extends('Admin.Layouts.layouts')

@section('content')
    <div class="w-full max-w-3xl mx-auto bg-white rounded-lg bg-opacity-40">
        <h2 class="text-2xl font-bold mb-4">Tag List</h2>
        
        @if($tags->isEmpty())
            <p class="text-gray-500">No tags available.</p>
        @else
            <table class="min-w-full border border-gray-300 rounded-lg shadow-md">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">Tag ID</th>
                        <th class="py-2 px-4 border-b">Tag Name</th>
                        <th class="py-2 px-4 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $tag->tag_id }}</td>
                            <td class="py-2 px-4 border-b">{{ $tag->tag_name }}</td>
                            <td class="py-2 px-4 border-b text-center">
                                <a href="{{route('tags.edit', $tag->tag_id)}}" class="text-indigo-500 hover:underline">Edit</a>
                                <form action="{{ route('tags.delete', $tag->tag_id) }}" method="POST" class="inline-block ml-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Are you sure you want to delete this tag?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="4" class="py-4 px-4 text-right border-t">
                            <a href="{{ route('Tag.form') }}" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                                Add New Tag
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        @endif
    </div>
@endsection
