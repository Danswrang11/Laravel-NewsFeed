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

    public function list(){
        $categories = Category::all();
        $tags = Tag::all();
        $posts = Post::orderBy('created_at', 'DESC')->get();
        return view('Admin.Post.postlist', compact('posts', 'categories', 'tags'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'topic' => 'required|string|max:200',
            'category_id' => 'required|integer',
            'author' => 'required|string|max:100',
            'description' => 'required|string',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate the image file
        ]);

        $post = new Post;

        // Assign form inputs to the Post model
        $post->topic = $request['topic'];
        $post->category_id = $request['category_id'];
        $post->author = $request['author'];
        $post->description = $request['description'];

        // Handle the image upload
        if ($request->hasFile('images')) {
            // Store the file and retrieve its path (storage/app/public/images)
            $imagePath = $request->file('images')->store('images', 'public');
            $post->images = $imagePath; // Save the path to the database
        }

        $post->save();
        $post->tags()->sync($request->tags);

        return redirect()->back()->with('success', 'Post created successfully!');
    }

    // Pass the post to the edit view
    public function edit($id)
    {
        $categories = Category::all();
        $tags = Tag::all(); 
        $post = Post::findOrFail($id); // Fetch category by ID
        return view('Admin.Post.postedit', compact('post','categories', 'tags'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'topic' => 'required|string|max:200',
            'category_id' => 'required|exists:categories,category_id',
            'author' => 'required|string|max:100',
            'description' => 'required|string',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $post = Post::findOrFail($id);
        // Update post details
        $post->update([
            'topic' => $request->topic,
            'category_id' => $request->category_id,
            'author' => $request->author,
            'description' => $request->description
        ]);

        // Handle image upload if new image is provided
        if ($request->hasFile('images')) {
            // Delete old image if exists
            if ($post->images && Storage::disk('public')->exists($post->images)) {
                Storage::disk('public')->delete($post->images);
            }
            // Store the new image
            $imagePath = $request->file('images')->store('images', 'public');
            $post->images = $imagePath;
        }

        // Update tags relationship & Sync tag
        $post->tags()->sync($request->input('tags', []));

        $post->save();

        return redirect()->route('Post.list')->with('success', 'Post updated successfully!');
    }


    //Delete Function
    public function delete($id)
    {
        $post = Post::where('post_id', $id)->firstOrFail();
        // Check if the post has an image and the file exists before deleting
        if ($post->images && Storage::disk('public')->exists($post->images)) {
            // Delete the image
            Storage::disk('public')->delete($post->images);
        }

        // Delete the post
        $post->delete();

        // Return success message
        return redirect()->back()->with('success', 'Post deleted successfully!');
    }
}




