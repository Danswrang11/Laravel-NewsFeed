@extends('Admin.Layouts.layouts')

@section('content')
    <div class="flex justify-center">
        <div class="item-center w-full max-w-4xl bg-white bg-opacity-40 p-6 rounded-lg shadow-md">
            <h1 class="text-2xl font-bold text-center mb-8">Create New Post</h1>
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="topic_name" class="block text-sm font-medium text-gray-700">Topic Name</label>
                            <input type="text" name="topic_name" id="topic_name" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                        </div>
                        <!-- Category Dropdown -->
                        <div>
                            <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label> 
                            <select name="category_id" id="category_id" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" placeholder="Select Category" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->topic }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-3 gap-4">
                        <!-- Image Upload -->
                        <div>
                            <label for="image" class="block text-sm font-medium text-gray-700">Upload Image</label>
                            <input type="file" name="image" id="image" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" accept="image/*" required>
                        </div>

                        <!-- Author -->
                        <div>
                            <label for="author" class="block text-sm font-medium text-gray-700">Author</label>
                            <input type="text" name="author" id="author" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                        </div>
                        <!-- Published Date -->
                        <div>
                            <label for="published_date" class="block text-sm font-medium text-gray-700">Published Date</label>
                            <input type="date" name="published_date" id="published_date" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                        </div>
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" id="description" rows="4" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required></textarea>
                    </div>

                    <!-- Tags -->
                    <div>
                        <label for="tags" class="block text-sm font-medium text-gray-700">Tags</label>
                        <div class="grid grid-cols-4 mt-2 space-y-2">
                            @foreach($tags as $tag)
                                <div>
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}" 
                                            class="form-checkbox h-4 w-4 text-blue-600 border-gray-300 rounded">
                                        <span class="ml-2 text-gray-700">{{ $tag->tag_name }}</span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Submit Button -->
                    <div>
                        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
