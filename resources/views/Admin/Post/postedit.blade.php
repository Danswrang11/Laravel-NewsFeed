@extends('Admin.Layouts.layouts')

@section('content')
    <div class="flex justify-center">
        <div class="item-center w-full max-w-4xl bg-white p-6 rounded-lg shadow-md">
            <h1 class="text-2xl font-bold text-center mb-8">Edit Post</h1>
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif
            <form action="{{ route('Post.update',['id' => $post->post_id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="topic" class="block text-sm font-medium text-gray-700">Topic Name</label>
                            <input type="text" name="topic" id="topic_name" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" value="{{ old('topic', $post->topic) }}" required>
                        </div>

                        <!-- Category Dropdown -->
                        <div>
                            <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label> 
                            <select name="category_id" id="category_id" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                                <option>Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->category_id }}" {{ $category->category_id == $post->category_id ? 'selected' : '' }}>{{ $category->topic }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <!-- Image Upload -->
                        <div>
                            <label for="images" class="block text-sm font-medium text-gray-700">Upload Image</label>
                            <input type="file" name="images" id="images" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" accept="image/*">
                            
                            @if ($post->images)
                                <img src="{{ asset('storage/' . $post->images) }}" alt="Post Image" class="mt-3" width="150">
                            @endif
                        </div>

                        <!-- Author -->
                        <div>
                            <label for="author" class="block text-sm font-medium text-gray-700">Author</label>
                            <input type="text" name="author" id="author" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" value="{{ old('author', $post->author) }}" required>
                        </div>
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" id="description" rows="4" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>{{ old('description', $post->description) }}</textarea>
                    </div>

                    <!-- Tags -->
                    <div>
                        <label for="tags" class="block text-sm font-medium text-gray-700">Tags</label>
                        <div class="grid grid-cols-4 mt-2 space-y-2">
                            @foreach($tags as $tag)
                                <div>
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="tags[]" value="{{ $tag->tag_id }}" 
                                            class="form-checkbox h-4 w-4 text-blue-600 border-gray-300 rounded"
                                            {{ in_array($tag->tag_id, $post->tags->pluck('tag_id')->toArray()) ? 'checked' : '' }}>
                                        <span class="ml-2 text-gray-700">{{ $tag->tag_name }}</span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md">Update Post</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
