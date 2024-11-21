 <!-- resources/views/admin/dashboard.blade.php -->
 @extends('Admin.Layouts.layouts')

@section('content')
    <div class="w-full max-w-5xl mx-auto bg-white rounded-lg">
        <h2 class="text-xl font-bold mb-4">Categories</h2>
        @if($categories->isEmpty())
            <p class="text-gray-500">No categories available.</p>
        @else
            <table class="w-full text-left border border-gray-200">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b text-center">Category ID</th>
                    <th class="py-2 px-4 border-b text-center">Category Name</th>
                    <th class="py-2 px-4 border-b text-center">Description</th>
                    <th class="py-2 px-4 border-b text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $category->category_id }}</td>
                        <td class="py-2 px-4 border-b">{{ $category->topic }}</td>
                        <td class="py-2 px-4 border-b">{{ $category->description }}</td>
                        <td class="py-2 px-4 border-b text-center">
                            <a href="{{route('Category.edit', $category->category_id)}}" class="text-indigo-500 hover:underline">Edit</a> |
                            <form action="{{route('Category.delete', $category->category_id)}}" method="POST" class="inline-block ml-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Are you sure you want to delete this category?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="py-4 px-4 text-gray-500 text-center">
                            No categories available.
                        </td>
                    </tr>
                @endforelse
                <tr>
                    <td colspan="4" class="py-4 px-4 text-right border-t">
                        <a href="{{ route('Category.form') }}" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                            Add New Category
                        </a>
                    </td>
                </tr>
            </tbody>
            </table>
        @endif
    </div>
@endsection
