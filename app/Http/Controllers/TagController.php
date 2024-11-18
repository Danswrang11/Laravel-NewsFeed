<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function form()
    {
        return view('Admin.Tags.createtag');
    }

    public function store(Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'tag_name' => 'required|string|max:100',
        ]);
        Tag::create($validated);

        return redirect()->back()->with('success', 'Tag added successfully!');
    }

    // Fetch all categories
    public function list()
    {
        $tags = Tag::all(); 
        return view('Admin.Tags.listtag', compact('tags'));
    }

    //Edit for loading form and Update to update the data
    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        return view('Admin.Tags.edittag', compact('tag'));
    }

    public function update(Request $request, $id)
    {
        // Validate the input
        $request->validate([
            'tag_name' => 'required|string|max:100',
        ]);

        // Fetch and update the tag
        $tag = Tag::findOrFail($id);
        $tag->update([
            'tag_name' => $request->tag_name,
        ]);
        return redirect()->back()->with('success', 'Tag updated successfully!');
    }

    //Delete Function
    public function delete($id){
        $tag = Tag::findOrFail($id);
        $tag->delete();

        return redirect()->back()->with('success', 'Tag deleted successfully.');
    }
}
