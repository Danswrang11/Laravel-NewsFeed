<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function loginform()
    {
        return view('Admin/adminlogin');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->isAdmin()) { // Check if the user is an admin
                return redirect()->route('Admin.dashboard');
            }

            Auth::logout(); // Logout if not admin
            return back()->withErrors(['email' => 'Unauthorized access.']);
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    // Show Admin Dashboard
    public function dashboard()
    {
        $categoryCount = Category::count();
        $tagCount = Tag::count();
        $posts = Post::orderBy('created_at', 'DESC')->get();
        return view('Admin/dashboard', compact('posts', 'categoryCount', 'tagCount')); // Admin dashboard view
    }
}
