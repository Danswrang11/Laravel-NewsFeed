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
        // Validate the request
        $request->validate([
            'topic' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'author' => 'required|string|max:255',
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
            // Store the file and retrieve its path
            $imagePath = $request->file('images')->store('images', 'public'); // Saves in storage/app/public/images
            $post->images = $imagePath; // Save the path to the database
        }

        $post->save();

        return redirect()->back()->with('success', 'Post created successfully!');
    }
}




