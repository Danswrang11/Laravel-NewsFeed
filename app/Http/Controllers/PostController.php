<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;


class PostController extends Controller
{
    public function form(){
        $categories = Category::all();
        $tags = Tag::all();
        return view('Admin.Post.createpost',compact('categories', 'tags'));
    }
}
