<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;


class PostController extends Controller
{
    public function form(){
        $categories = Category::all();
        $tags = Tag::all();
        return view('Admin.Post.createpost',compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'topic' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'author' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,category_id',
            'tags' => 'nullable|array', // Tags are optional and can be an array
            'tags.*' => 'exists:tags,tag_id', // Ensure each tag is valid
        ]);

        // Handle image upload
        $imagePath = $request->file('image')->store('public/Post_images');
        $imageUrl = Storage::url($imagePath);

        // Create post
        $post = Post::create([
            'topic' => $validated['topic'],
            'description' => $validated['description'],
            'image' => $imageUrl,
            'author' => $validated['author'],
            'category_id' => $validated['category_id'],
        ]);

        // Attach selected tags to the post (if any)
        if ($request->has('tags')) {
            $post->tags()->sync($validated['tags']);
        }

        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

}




