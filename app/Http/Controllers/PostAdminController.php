<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostAdminController extends Controller
{
    public function index()
    {
        return Inertia::render('Post/Index', ['posts' => Post::with(['user', 'category'])->latest()->paginate(10)]);
    }

    public function create()
    {
        return Inertia::render('Post/Create');
    }
    public function edit()
    {
        return Inertia::render('Post/Edit');
    }
    public function store(Request $request)
    {
        // 
    }
    public function destroy($id)
    {
        // 
    }
}
