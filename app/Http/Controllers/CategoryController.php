<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function form(){
        return view('Admin.Categories.createcategory');
    }

    // Store the form data
    public function store(Request $request)
    {
        $validated = $request->validate([
            'topic' => 'required|string|max:200',
            'description' => 'nullable|string',
        ]);

        Category::create($validated);

        return redirect()->back()->with('success', 'Category added successfully!');
        // Category::create([
        //     'topic' => $request->topic,
        //     'description' => $request->description,
        // ]);

        // return redirect()->back()->with('success', 'Category created successfully!');
    }

    public function list()
    {
        $categories = Category::all(); // Fetch all categories
        return view('Admin.Categories.listcategory', compact('categories'));
    }

    //Fetch and Update the Category
    public function edit($id)
    {
        $category = Category::findOrFail($id); // Fetch category by ID
        return view('Admin.Categories.editcategory', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required|string|max:200',
            'description' => 'nullable|string',
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'category_name' => $request->category_name,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Category updated successfully!');
    }

    // Delete Function
    public function delete($id)
    {
        $category = Category::where('category_id', $id)->firstOrFail();
        $category->delete();

        return redirect()->back()->with('success', 'Category deleted successfully!');
    }
}
