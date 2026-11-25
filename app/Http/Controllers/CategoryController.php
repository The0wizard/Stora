<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

public function index()
{
    $categories = Category::with('books')->get();
    return view('admin.categories.index', compact('categories'));
}

    public function create()
{
    return view('admin.categories.form');
}
 public function index_user()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function show_user($id)
    {
        $category = Category::with('books.promotions')->findOrFail($id);
        return view('categories.show', compact('category'));
    }
    public function show(Category $category)
{
    $category->load('books.promotions'); // Eager load the books relationship
    return view('categories.show', compact('category'));
}

public function edit(Category $category)
{
    return view('admin.categories.form', compact('category'));
}


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable|max:500',
        ]);

        Category::create($request->all());

        return redirect()->route('admin.categories.index');
    }



    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable|max:500',
        ]);

        $category->update($request->all());

        return redirect()->route('admin.categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index');
    }
}
